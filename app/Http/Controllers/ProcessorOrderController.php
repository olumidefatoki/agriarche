<?php

namespace App\Http\Controllers;

use App\CodeGeneration;
use App\Commodity;
use App\Http\Requests\ProcessorOrderRequest;
use App\PaymentTerm;
use App\Processor;
use App\ProcessorOrder;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\ProcessorOrderHistory;

use Exception;


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
    public function index(Request $request)
    {
        $data = $request->all();
        $states = State::all();
        $processors = Processor::all();
        $commodities = Commodity::all();
        $processorOrdersQuery = ProcessorOrder::query();
        $processorOrdersQuery->orderBy('created_at', 'desc');
        if (!is_null($request['processor'])) {
            $processorOrdersQuery->where('processor_id', '=', $request['processor']);
        }
        if (!is_null($request['commodity'])) {
            $processorOrdersQuery->where('commodity_id', '=', $request['commodity']);
        }
        if (!is_null($request['state'])) {
            $processorOrdersQuery->where('state_id', '=', $request['state']);
        }
        $processorOrders = $processorOrdersQuery->paginate(20);

        return view(
            'order.index',
            [
                'processorOrders' => $processorOrders,
                'states' => $states,
                'commodities' => $commodities,
                'processors' => $processors,
                'data' => $data
            ]
        );
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

        return view('order.create', ['states' => $states, 'processors' => $processors, 'paymentTerms' => $paymentTerms, 'commodities' => $commodities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessorOrderRequest $request)
    {
        if (!$this->isValidEndDate($request)) {
            return redirect()->back()->withInput()->withErrors(['end_date' => 'End date must be greater than Start date']);
        }
        try {
            $processorOrder = $this->populateBuyerOrderObject($request);
            $codeGeneration = new CodeGeneration();
            $processorOrder->code = $codeGeneration->genCode(1);
            $processorOrder->save();
            $this->saveProcessorOrderHistory($processorOrder);
            return redirect(route('order.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($processorOrderId)
    {
        $processorOrder = $this->getProcessorOrderById($processorOrderId);
        $processorOrderHistories = ProcessorOrderHistory::where('processor_order_id', $processorOrderId)->get();
        return view('order.show', [
            'processorOrder' => $processorOrder,
            'processorOrderHistories' => $processorOrderHistories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($processorOrderId)
    {
        $processorOrder = $this->getProcessorOrderById($processorOrderId);
        $states = State::all();
        $commodities = Commodity::all();
        $processors = Processor::all();

        return view('order.edit', [
            'states' => $states,
            'processorOrder' => $processorOrder,
            'processors' => $processors,
            'commodities' => $commodities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\ProcessorOrder $processorOrder
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $processorOrderId)
    {
        try {
            $processorOrder = $this->getProcessorOrderById($processorOrderId);
            ProcessorOrder::updateOrCreate(
                ['id' => $processorOrder->id],
                [
                    'processor_id' => $request->processor,
                    'delivery_location' => $request->delivery_location,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'commodity_id' => $request->commodity,
                    'state_id' => $request->state,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'updated_by' => Auth::id(),
                ]
            );
            $this->saveProcessorOrderHistoryRequest($request, $processorOrder->id);
            return redirect(route('order.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessorOrder $processorOrder)
    {
    }

    public function isValidEndDate(Request $request)
    {
        $startDate = strtotime($request->start_date);
        $endDate = strtotime($request->end_date);
        if ($endDate > $startDate) {
            return true;
        }

        return false;
    }

    public function populateBuyerOrderObject(Request $request)
    {
        $processorOrder = new ProcessorOrder();
        $processorOrder->processor_id = $request->processor;
        $processorOrder->delivery_location = $request->delivery_location;
        $processorOrder->quantity = $request->quantity;
        $processorOrder->price = $request->price;
        $processorOrder->commodity_id = $request->commodity;
        $processorOrder->state_id = $request->state;
        $processorOrder->start_date = $request->start_date;
        $processorOrder->end_date = $request->end_date;
        $processorOrder->created_by = Auth::id();
        $processorOrder->updated_by = Auth::id();

        return $processorOrder;
    }

    public function getProcessorOrderById($id)
    {
        $processorOrder = ProcessorOrder::findOrFail($id);
        return $processorOrder;
    }
    private function saveProcessorOrderHistory(ProcessorOrder $processorOrder)
    {
        ProcessorOrderHistory::create([
            'processor_order_id' => $processorOrder->id,
            'processor_id' => $processorOrder->processor_id,
            'quantity' => $processorOrder->quantity,
            'price' => $processorOrder->price,
            'commodity_id' => $processorOrder->commodity_id,
            'state_id' => $processorOrder->state_id,
            'updated_by' => Auth::id()
        ]);
    }
    private function saveProcessorOrderHistoryRequest(Request $request, $processorOrderId)
    {
        ProcessorOrderHistory::create([
            'processor_order_id' => $processorOrderId,
            'processor_id' => $request->processor,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'commodity_id' => $request->commodity,
            'state_id' => $request->state,
            'updated_by' => Auth::id()
        ]);
    }
}
