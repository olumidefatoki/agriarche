<?php

namespace App\Http\Controllers;

use App\Aggregator;
use App\Bank;
use App\Http\Requests\CreateAggregatorRequest;
use App\Http\Requests\UpdateAggregatorRequest;
use App\State;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class AggregatorController extends Controller
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
    public function index(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $states = State::all();
        if (($request->has('name') && !empty($request->name)) && ($request->has('state') && !empty($request->name)))
            $aggregators = Aggregator::where('name', $request->name)->where('state_id', $request->state)->orderBy('created_at', 'desc')->paginate(20);
        else if ($request->has('name') && !empty($request->name))
            $aggregators = Aggregator::where('name', $request->name)->orderBy('created_at', 'desc')->paginate(20);
        else if ($request->has('state') && !empty($request->state))
            $aggregators = Aggregator::where('state_id', $request->state)->orderBy('created_at', 'desc')->paginate(20);
        else
            $aggregators = Aggregator::orderBy('created_at', 'desc')->paginate(20);
        return view('aggregator.index', [
            'aggregators' => $aggregators,
            'states' => $states,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $banks = Bank::all();

        return view('aggregator.create', [
            'states' => $states,
            'banks' => $banks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAggregatorRequest $request)
    {
        try {
            Aggregator::create([
                'name' => $request->name, 'address' => $request->address,
                'contact_person_name' => $request->contact_person_name,
                'state_id' => $request->state,
                'bank_id' => $request->bank,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            return redirect(route('aggregator.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Aggregator $aggregator)
    {
        return view('aggregator.show', ['aggregator' => $aggregator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::all();
        $banks = Bank::all();
        $aggregator = $this->findAggregatorById($id);
        return view('aggregator.edit', [
            'states' => $states,
            'banks' => $banks,
            'aggregator' => $aggregator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAggregatorRequest $request, $id)
    {
        $aggregator = $this->findAggregatorById($id);
        if ($this->isAccountNumberExist($aggregator->id, $request->account_number))
            return redirect()->back()->withInput()->withErrors('Account Number already exist');

        if ($this->isPhoneNumberExist($aggregator->id, $request->contact_person_phone_number))
            return redirect()->back()->withInput()->withErrors('Phone Number already exist');

        try {
            Aggregator::updateOrCreate(['id' => $aggregator->id], [
                'name' => $request->name, 'address' => $request->address,
                'contact_person_name' => $request->contact_person_name,
                'state_id' => $request->state,
                'bank_id' => $request->bank,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'created_by' => $aggregator->created_by,
                'updated_by' => Auth::id(),
            ]);

            return redirect(route('aggregator.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aggregator $aggregator)
    {
    }

    public function findAggregatorById($id)
    {
        return  Aggregator::findOrFail($id);
    }

    public function isAccountNumberExist($id, $accountNumber)
    {
        $aggregator =  Aggregator::where('account_number', $accountNumber)->first();
        if (!$aggregator) {
            return false;
        }
        if ($aggregator->id == $id) {
            return  false;
        }

        return true;
    }
    public function isPhoneNumberExist($id, $phoneNumber)
    {
        $aggregator =  Aggregator::where('contact_person_phone_number', $phoneNumber)->first();
        if (!$aggregator) {
            return false;
        }
        if ($aggregator->id == $id) {
            return  false;
        }

        return true;
    }
}
