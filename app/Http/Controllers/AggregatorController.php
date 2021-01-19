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

class AggregatorController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aggregators = Aggregator::orderBy('created_at', 'desc')->paginate(20);
        $states = State::all();

        return view('aggregator.index', ['aggregators' => $aggregators, 'states' => $states]);
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
    public function edit(Aggregator $aggregator)
    {
        $states = State::all();
        $banks = Bank::all();

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
    public function update(UpdateAggregatorRequest $request, Aggregator $aggregator)
    {
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
}
