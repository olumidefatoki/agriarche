<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{CreateBuyerRequest, UpdateBuyerRequest};
use Illuminate\Support\Facades\Log;

use Exception;


class BuyerController extends Controller
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
        $buyers = Buyer::orderBy('created_at', 'desc')->paginate(20);
        return view('buyer.index', ['buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('buyer.create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBuyerRequest $request)
    {

        try {
            Buyer::create(array(
                'name' => $request->name, 'address' => $request->address,
                'contact_person_first_name' => $request->contact_person_first_name,
                'contact_person_last_name' => $request->contact_person_last_name,
                'state_id' => $request->state,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ));
            return redirect(route('buyer.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        return view('buyer.show', ['buyer' => $buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {

        $states = State::all();
        return view('buyer.edit', ['states' => $states], ['buyer' => $buyer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuyerRequest $request, Buyer $buyer)
    {
        try {
            Buyer::updateOrCreate([ 'id' => $buyer->id],array(
                'created_by' => $buyer->created_by,
                'name' => $request->name, 'address' => $request->address,
                'contact_person_first_name' => $request->contact_person_first_name,
                'contact_person_last_name' => $request->contact_person_last_name,
                'state_id' => $request->state,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'updated_by' => Auth::id()
            ));

            return redirect(route('buyer.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
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
