<?php

namespace App\Http\Controllers;

use App\ProcessorOrder;
use App\State;
use App\Commodity;
use App\Processor;
use App\CodeGeneration;
use App\PaymentTerm;
use App\Http\Requests\ProcessorOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProcessorOrderController extends Controller
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
        $processorOrders = ProcessorOrder::orderBy('created_at', 'desc')->paginate(20);
        return view('order.index', ['processorOrders' => $processorOrders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $processors = Processor::all();
        $commodities = Commodity::all();
        $paymentTerms = PaymentTerm::all();
        return view('order.create', ['states' => $states, 'processors' => $processors,'paymentTerms'=>$paymentTerms, 'commodities' => $commodities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessorOrderRequest $request)
    {
        if (!$this->isValidEndDate($request))
            return redirect()->back()->withInput()->withErrors(array('end_date' => 'End date must be greater than Start date'));
        try {
            $processorOrder = $this->populateBuyerOrderObject($request, new ProcessorOrder());
            $codeGeneration = new CodeGeneration();
            $processorOrder->code = $codeGeneration->genCode(1);
            $processorOrder->save();
            return redirect(route('order.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProcessorOrder  $processorOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessorOrder $processorOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProcessorOrder  $processorOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($processorOrderId)
    { 
        $processorOrder = $this->getProcessorOrderById($processorOrderId);
        $states = State::all();
        $commodities = Commodity::all();
        $processors=Processor::all();
        return view('order.edit', ['states' => $states, 
                    'processorOrder'=>$processorOrder,
                    'processors' => $processors, 
                    'commodities' => $commodities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProcessorOrder  $processorOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $processorOrder)
    {
        try{  
            $processorOrder = $this->getProcessorOrderById($processorOrder);
            ProcessorOrder::updateOrCreate(
               ['id' => $processorOrder->id],
               array(
                   'processor_id' => $request->processor,
                   'delivery_location' => $request->delivery_location,
                   'quantity' => $request->quantity,
                   'price' => $request->price,
                   'commodity_id' => $request->commodity,
                   'state_id' => $request->state,
                   'start_date' => $request->start_date,
                   'end_date' => $request->end_date,
                   'updated_by' => Auth::id()
               )
           );
           return redirect(route('order.index'));
   } 
   catch (Exception $e) {
       Log::error($e->getMessage());
       return redirect()->back()->withInput()->withErrors($e->getMessage());
   }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProcessorOrder  $processorOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessorOrder $processorOrder)
    {
        //
    }

    public function isValidEndDate(Request $request)
    {
        $startDate = strtotime($request->start_date);
        $endDate = strtotime($request->end_date);
        if ($endDate > $startDate)
            return true;
        return false;
    }

    public function populateBuyerOrderObject(Request $request, ProcessorOrder $processorOrder)
    {
        $processorOrder->processor_id = $request->processor;
        $processorOrder->delivery_location = $request->delivery_location;
        $processorOrder->quantity = $request->quantity;
        $processorOrder->price = $request->price;
        $processorOrder->commodity_id = $request->commodity;
        $processorOrder->state_id = $request->state;
        $processorOrder->start_date = $request->start_date;
        $processorOrder->end_date = $request->end_date;
        $processorOrder->created_by  =  Auth::id();
        $processorOrder->updated_by = Auth::id();
        return $processorOrder;
    }
    public function getProcessorOrderById($id)
    {
        $processorOrder = ProcessorOrder::find($id);
        if (!$processorOrder) {
            abort(404);
        }
        return $processorOrder;
    }
}
