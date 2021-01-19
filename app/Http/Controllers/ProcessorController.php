<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProcessorRequest;
use App\Processor;
use App\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProcessorController extends Controller
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
        $processors = Processor::orderBy('created_at', 'desc')->paginate(20);
        if ($request->has('name') && !empty($request->name)) {
            $processors = Processor::where('name', $request->name)->orderBy('created_at', 'desc')->paginate(20);
        }
        $states = State::all();
        return view('processor.index', [
            'states' => $states,
            'processors' => $processors,
            'data' => $data,
            'name' => $request->name,
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

        return view('processor.create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProcessorRequest $request)
    {
        try {
            Processor::create([
                'name' => $request->name, 'address' => $request->address,
                'contact_person_first_name' => $request->contact_person_first_name,
                'contact_person_last_name' => $request->contact_person_last_name,
                'state_id' => $request->state,
                'category' => $request->category,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            return redirect(route('processor.index'));
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
    public function show(Processor $processor)
    {
        return view('processor.show', ['processor' => $processor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Processor $processor)
    {
        $states = State::all();

        return view('processor.edit', ['states' => $states], ['processor' => $processor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Processor $processor)
    {
        try {
            Processor::updateOrCreate(['id' => $processor->id], [
                'created_by' => $processor->created_by,
                'name' => $request->name, 'address' => $request->address,
                'contact_person_first_name' => $request->contact_person_first_name,
                'contact_person_last_name' => $request->contact_person_last_name,
                'state_id' => $request->state,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'contact_person_email' => $request->contact_person_email,
                'updated_by' => Auth::id(),
            ]);

            return redirect(route('processor.index'));
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
    public function destroy(Processor $processor)
    {
    }
}
