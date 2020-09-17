<?php

namespace App\Http\Controllers;

use App\OrderMapping;
use App\BuyerOrder;
use App\Aggregator;
use Illuminate\Http\Request;

class OrderMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderMappings= OrderMapping::orderBy('created_at', 'desc')->paginate(20);
        return view('mapping.index', ['orderMappings' => $orderMappings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders= BuyerOrder::all();
       $aggregators= Aggregator::all();
        return view('mapping.create',['aggregators'=>$aggregators,'orders'=>$orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OrderMapping::create($request->all());
        return redirect(route('mapping.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function show(OrderMapping $orderMapping)
    {
        return view('mapping.show');//,['orderMapping'=>$orderMapping]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderMapping $orderMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderMapping  $orderMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderMapping $orderMapping)
    {
        //
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
}
