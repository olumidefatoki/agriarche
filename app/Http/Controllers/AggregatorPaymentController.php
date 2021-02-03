<?php

namespace App\Http\Controllers;

use App\AggregatorPayment;
use App\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AggregatorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('influencer_payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deliveries =  DB::select('SELECT d.id, l.code, l.truck_number , ag.name from delivery d 
                                    INNER JOIN logistics l on l.id = d.logistics_id 
                                    INNER JOIN aggregator ag on ag.id = d.aggregator_id 
                                    WHERE d.approval_status_id = 7');
        return view('influencer_payment.create', ['deliveries' => $deliveries]);
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
     * @param  \App\AggregatorPayment  $aggregatorPayment
     * @return \Illuminate\Http\Response
     */
    public function show(AggregatorPayment $aggregatorPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AggregatorPayment  $aggregatorPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(AggregatorPayment $aggregatorPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AggregatorPayment  $aggregatorPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AggregatorPayment $aggregatorPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AggregatorPayment  $aggregatorPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AggregatorPayment $aggregatorPayment)
    {
        //
    }
}
