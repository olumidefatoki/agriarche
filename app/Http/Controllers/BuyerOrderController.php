<?php

namespace App\Http\Controllers;

use App\BuyerOrder;
use App\Buyer;
use App\Commodity;


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
        $buyerOrders= BuyerOrder::orderBy('created_at', 'desc')->paginate(20);
        return view('order.index', ['buyerOrders' => $buyerOrders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states= State::all();
        $buyers= Buyer::all();
        $commodities= Commodity::all();
        return view('order.create',['states'=>$states,'buyers'=>$buyers,'commodities'=>$commodities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'buyer_id' => 'required',
            'delivery_location' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'commodity_id' => 'required',
            'state_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        BuyerOrder::create($request->all());
        return redirect(route('order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyerOrder  $BuyerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerOrder $buyerOrder)
    {
        return view('order.show',['buyerOrder'=>$buyerOrder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerOrder $buyerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyerOrder $buyerOrder)
    {
        //
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
}
