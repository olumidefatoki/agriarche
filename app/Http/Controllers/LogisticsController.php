<?php

namespace App\Http\Controllers;

use App\Logistics;
use App\Aggregator;
use App\LogisticsCompany;
use App\BuyerOrder;
use Illuminate\Http\Request;

class LogisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Logistics = Logistics::orderBy('created_at', 'desc')->paginate(20);
        return view('logistics.index', ['Logistics' => $Logistics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aggregators= Aggregator::all();
        $logisticsCompanies =LogisticsCompany::all();
        $buyerOrders = BuyerOrder::all();

        return view('logistics.create',['aggregators'=>$aggregators,
                                        'logisticsCompanies' => $logisticsCompanies,
                                        'buyerOrders' => $buyerOrders]);
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
            'driver_phone_number' => 'required|digits:11',
            'driver_name' => 'required|max:255',
            'truck_number' => 'required|max:8',
            'quantity' => 'required',
            'number_of_bags' => 'required',
            'order_id' => 'required',
            'aggregator_id' => 'required',
            'logistics_id' => 'required',
            
        ]);
        $logistics = new Logistics();
        $logistics->driver_phone_number = $request->driver_phone_number;
        $logistics->status_id =3;
        $logistics->driver_name = $request->driver_name;
        $logistics->truck_number = $request->truck_number;
        $logistics->quantity = $request->quantity;
        $logistics->no_of_bags = $request->number_of_bags;
        $logistics->buyer_order_id = $request->order_id;
        $logistics->aggregator_id = $request->aggregator_id;
        $logistics->logistics_company_id = $request->logistics_company_id;
        $logistics->save();
        return redirect(route('logistics.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function show(Logistics $logistics)
    {
        return view('logistics.show', ['logistics'=> $logistics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistics $logistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logistics $logistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistics $logistics)
    {
        //
    }
}
