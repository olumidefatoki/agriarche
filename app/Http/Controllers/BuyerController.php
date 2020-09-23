<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\State;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers= Buyer::orderBy('created_at', 'desc')->paginate(20);
        return view('buyer.index', ['buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states= State::all();
        return view('buyer.create', ['states' => $states]);
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
            'contact_person_email' => 'required|email|unique:buyer|max:255',
            'contact_person_phone_number' => 'required|digits:11|unique:buyer',
            'state_id' => 'required',
        ]);

        Buyer::create($request->all());
        return redirect(route('buyer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        return view('buyer.show', ['buyer'=> $buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
      
        $states= State::all();
        return view('buyer.edit', ['states' => $states],['buyer'=> $buyer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_person_first_name' => 'required|max:255',
            'contact_person_last_name' => 'required|max:255',
            'contact_person_email' => 'required|email|max:255',
            'contact_person_phone_number' => 'required|digits:11',
            'state_id' => 'required|numeric',
        ]);
        $buyer->name = $request->name;
        $buyer->address = $request->address;
        $buyer->contact_person_first_name = $request->contact_person_first_name;
        $buyer->contact_person_last_name = $request->contact_person_last_name;
        $buyer->contact_person_email = $request->contact_person_email;
        $buyer->contact_person_phone_number = $request->contact_person_phone_number;
        $buyer->state_id = $request->state_id;
        $buyer->save();   
        return redirect(route('buyer.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        //
    }
}
