<?php

namespace App\Http\Controllers;

use App\commodity;
use App\Http\Requests\CommodityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Exception;


class CommodityController extends Controller
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
        $commodities = Commodity::all();
        return view('commodity.index', array('commodities' => $commodities));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commodity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommodityRequest $request)
    {
        try {
            $commodity = new Commodity();
            $commodity->name = $request->name;
            $commodity->save();
            return redirect(route('commodity.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(commodity $commodity)
    {
        return view('commodity.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(commodity $commodity)
    {
        return view('commodity.edit', array('commodity' => $commodity));
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
        return redirect(route('commodity.index'));
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
