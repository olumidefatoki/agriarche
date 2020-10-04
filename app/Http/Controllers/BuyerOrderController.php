<?php

namespace App\Http\Controllers;

use App\BuyerOrder;
use App\Buyer;
use App\Commodity;
use App\CodeGeneration;
use Illuminate\Support\Facades\Log;
use  App\Http\Requests\CreateBuyerOrderRequest;
use \Illuminate\Database\QueryException;

use App\State;

use Illuminate\Http\Request;

class BuyerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyerOrders = BuyerOrder::orderBy('created_at', 'desc')->paginate(20);
        return view('order.index', ['buyerOrders' => $buyerOrders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $buyers = Buyer::all();
        $commodities = Commodity::all();
        return view('order.create', ['states' => $states, 'buyers' => $buyers, 'commodities' => $commodities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBuyerOrderRequest $request)
    {
        if (!$this->isValidEndDate($request))
            return redirect()->back()->withInput()->withErrors(array('end_date' => 'End date must be greater than start date'));
        try {
            $buyerOrder = $this->populateBuyerOrderObject($request, new BuyerOrder());
            $codeGeneration = new CodeGeneration();
            $buyerOrder->code = $codeGeneration->genCode(1);
            $buyerOrder->save();
            return redirect(route('order.index'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyerOrder  $BuyerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerOrder $buyerOrder)
    {
        return view('order.show', ['buyerOrder' => $buyerOrder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerOrder $order)
    {

        $buyerOrder = BuyerOrder::find($order->id);
        if (!$buyerOrder) {
            abort(404);
        }

        $states = State::all();
        $buyers = Buyer::all();
        $commodities = Commodity::all();
        return view('order.edit', [
            'states' => $states, 'buyers' => $buyers,
            'commodities' => $commodities, 'buyerOrder' => $buyerOrder
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyerOrder $order)
    {
        $buyerOrder = BuyerOrder::find($order->id);
        if (!$buyerOrder) {
            abort(404);
        }
        $validatedData = $request->validate([
            'buyer_id' => 'required|numeric',
            'delivery_location' => 'required|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required',
            'commodity_id' => 'required',
            'state_id' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        $buyerOrder->buyer_id = $request->buyer_id;
        $buyerOrder->delivery_location = $request->delivery_location;
        $buyerOrder->quantity = $request->quantity;
        $buyerOrder->coupon_price = $request->coupon_price;
        $buyerOrder->commodity_id = $request->commodity_id;
        $buyerOrder->state_id = $request->state_id;
        $buyerOrder->start_date = $request->start_date;
        $buyerOrder->end_date = $request->end_date;
        $buyerOrder->save();
        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerOrder $buyerOrder)
    {
        //
    }
    public function isValidEndDate(Request $request)
    {
        $startDate = strtotime($request->start_date);
        $endDate = strtotime($request->end_date);
        if ($endDate > $startDate)
            return true;
        return false;
    }

    public function populateBuyerOrderObject(Request $request, BuyerOrder $buyerOrder)
    {
        $buyerOrder->buyer_id = $request->buyer_id;
        $buyerOrder->delivery_location = $request->delivery_location;
        $buyerOrder->quantity = $request->quantity;
        $buyerOrder->coupon_price = $request->coupon_price;
        $buyerOrder->commodity_id = $request->commodity_id;
        $buyerOrder->state_id = $request->state_id;
        $buyerOrder->start_date = $request->start_date;
        $buyerOrder->end_date = $request->end_date;
        return $buyerOrder;
    }
    
}
