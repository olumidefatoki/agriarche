<?php

namespace App\Http\Controllers;

use App\Aggregator;
use App\State;
use App\Bank;
use Illuminate\Http\Request;

class AggregatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aggregators= Aggregator::orderBy('created_at', 'desc')->paginate(20);
        return view('aggregator.index', ['aggregators' => $aggregators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states= State::all();
        $banks= Bank::all();
        return view('aggregator.create', ['states' => $states,
        'banks' => $banks,]);
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_person_first_name' => 'required|max:255',
            'contact_person_last_name' => 'required|max:255',
            'contact_person_email' => 'required|email|unique:aggregator|max:255',
            'contact_person_phone_number' => 'required|digits:11|unique:aggregator',
            'state_id' => 'required|max:255',
            'bank_id' => 'required|max:255',
            'account_name' => 'required|max:255',
            'account_number' =>  'required|digits:11|unique:aggregator',
        ]);
        Aggregator::create($request->all());
        return redirect(route('aggregator.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aggregator  $aggregator
     * @return \Illuminate\Http\Response
     */
    public function show(Aggregator $aggregator)
    {
        return view('aggregator.show',['aggregator'=>$aggregator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aggregator  $aggregator
     * @return \Illuminate\Http\Response
     */
    public function edit(Aggregator $aggregator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aggregator  $aggregator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aggregator $aggregator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aggregator  $aggregator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aggregator $aggregator)
    {
        //
    }
}
