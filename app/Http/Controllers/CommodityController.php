<?php

namespace App\Http\Controllers;

use App\commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
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
        //
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
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commodity $commodity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(commodity $commodity)
    {
        //
    }
}
