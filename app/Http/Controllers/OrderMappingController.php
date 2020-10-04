<?php

namespace App\Http\Controllers;

use App\OrderMapping;
use App\BuyerOrder;
use App\Aggregator;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Http\Requests\CreateOrderMappingRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class OrderMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderMappings = OrderMapping::orderBy('created_at', 'desc')->paginate(20);
        return view('mapping.index', ['orderMappings' => $orderMappings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = BuyerOrder::all();
        $aggregators = Aggregator::all();
        return view('mapping.create', ['aggregators' => $aggregators, 'orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderMappingRequest $request)
    {
        try {
            if ($this->isAggregatorOrderExist($request))
                return redirect()->back()->withInput()->withErrors(array('aggregator_id' => 'Aggregator has already be mapped to this Order.'));
            if (!$this->isPriceValid($request))
                return redirect()->back()->withInput()->withErrors(array('strike_price' => 'Strike price can not be greater than coupon price.'));
            OrderMapping::create($request->all());
            return redirect(route('mapping.index'));
        } catch (QueryException $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors(['An error occured!. Kindly contact IT team']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function show(OrderMapping $orderMapping)
    {
        return view('mapping.show'); //,['orderMapping'=>$orderMapping]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderMapping $mapping)
    {

        $orderMapping = OrderMapping::find($mapping->id);
        if (!$orderMapping) {
            abort(404);
        }
        return view('mapping.edit', ['orderMapping' => $orderMapping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderMapping $mapping)
    {
        $orderMapping = OrderMapping::find($mapping->id);
        if (!$orderMapping) {
            abort(404);
        }
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'aggregator_id' => 'required|numeric',
            'buyer_order_id' => 'required|numeric',
        ]);
        $orderMapping->price = $request->price;
        $orderMapping->aggregator_id = $request->aggregator_id;
        $orderMapping->buyer_order_id = $request->buyer_order_id;
        $orderMapping->save();
        return redirect(route('mapping.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderMapping $orderMapping)
    {
        //
    }
    public function isAggregatorOrderExist(Request $request)
    {
        $count = OrderMapping::where('buyer_order_id', $request->buyer_order_id)
            ->where('aggregator_id', $request->aggregator_id)
            ->count();
        if ($count == 1) return true;
        return false;
    }
    public function isPriceValid(Request $request)
    {
        $buyerOrder = BuyerOrder::find($request->buyer_order_id);
        if ($request->strike_price > $buyerOrder->coupon_price) return false;
        return true;
    }
    public function getAggregatorByOrder($id){
      $aggregators = DB::select('SELECT agg.id, agg.name FROM aggregator agg INNER JOIN order_mapping om ON agg.id = om.aggregator_id WHERE om.buyer_order_id=?',[$id]);
        return json_encode($aggregators);
    }
    
}
