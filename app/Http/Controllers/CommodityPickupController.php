<?php

namespace App\Http\Controllers;

use App\CommodityPickup;
use Illuminate\Http\Request;

class CommodityPickupController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $CommodityPickups = CommodityPickup::orderBy('created_at', 'desc')->paginate(20);
        return view('commodity_pickup.index', ['CommodityPickups' => $CommodityPickups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommodityPickup  $commodityPickup
     * @return \Illuminate\Http\Response
     */
    public function show(CommodityPickup $commodityPickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommodityPickup  $commodityPickup
     * @return \Illuminate\Http\Response
     */
    public function edit(CommodityPickup $commodityPickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommodityPickup  $commodityPickup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommodityPickup $commodityPickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommodityPickup  $commodityPickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommodityPickup $commodityPickup)
    {
        //
    }
}
