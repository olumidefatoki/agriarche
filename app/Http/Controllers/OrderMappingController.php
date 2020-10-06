<?php

namespace App\Http\Controllers;

use App\OrderMapping;
use App\BuyerOrder;
use App\Aggregator;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\OrderMappingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderMappingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(OrderMappingRequest $request)
    {
        try {
            if ($this->isAggregatorOrderExist($request))
                return redirect()->back()->withInput()->withErrors(array('aggregator' => 'Aggregator has already be mapped to this Order.'));
            if (!$this->isPriceValid($request))
                return redirect()->back()->withInput()->withErrors(array('strike_price' => 'Strike price can not be greater than coupon price.'));
            OrderMapping::create(array(
                '' => '',
                'buyer_order_id' => $request->order,
                'strike_price' => $request->strike_price,
                'aggregator_id' => $request->aggregator,
                'logistics_price'=>$request->logistics_price,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ));
            return redirect(route('mapping.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
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
    public function edit($id)
    {
        $orderMapping = $this->getOrderMappingById($id);
        return view('mapping.edit', ['orderMapping' => $orderMapping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function update(OrderMappingRequest $request,  $id)
    {
        try {
            $orderMapping = $this->getOrderMappingById($id);
          
            if (!$this->isPriceValid($request))
                return redirect()->back()->withInput()->withErrors(array('strike_price' => 'Strike price can not be greater than coupon price.'));

            OrderMapping::updateOrCreate(
                ['id' => $orderMapping->id],
                array(
                    '' => '',
                    'buyer_order_id' => $request->order,
                    'strike_price' => $request->strike_price,
                    'aggregator_id' => $request->aggregator,
                    'logistics_price'=>$request->logistics_price,
                    'updated_by' => Auth::id()
                )
            );

            return redirect(route('mapping.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->withInput()->withErrors(['An error occured!. Kindly contact IT team']);
        }
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
        $count = OrderMapping::where('buyer_order_id', $request->order)
            ->where('aggregator_id', $request->aggregator)
            ->count();
        if ($count == 1) return true;
        return false;
    }
    public function isPriceValid(Request $request)
    {
        $buyerOrder = BuyerOrder::find($request->order);
        if ($request->strike_price > $buyerOrder->coupon_price) return false;
        return true;
    }
    public function getAggregatorByOrder($id)
    {
        $aggregators = DB::select('SELECT agg.id, agg.name FROM aggregator agg INNER JOIN order_mapping om ON agg.id = om.aggregator_id WHERE om.buyer_order_id=?', [$id]);
        return json_encode($aggregators);
    }
    public function getOrderMappingById($id)
    {
        $orderMapping = OrderMapping::find($id);
        if (!$orderMapping) {
            abort(404);
        }
        return $orderMapping;
    }
}
