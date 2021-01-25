<?php

namespace App\Http\Controllers;

use App\Logistics;
use App\Aggregator;
use App\LogisticsCompany;
use App\ProcessorOrder;
use Illuminate\Http\Request;
use App\Http\Requests\LogisticsRequest;
use App\CodeGeneration;
use App\State;
use App\Status;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class LogisticsController extends Controller
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
        $aggregators = Aggregator::all();
        $status = Status::find([3, 5]);
        $logisticsQuery = Logistics::query();
        $logisticsQuery->orderBy('created_at', 'desc');

        if (!is_null($request['status'])) {
            $logisticsQuery->where('status_id', '=', $request['status']);
        }

        if (!is_null($request['truck_no'])) {
            $logisticsQuery->where('truck_number', '=', $request['truck_no']);
        }
        if (!is_null($request['aggregator'])) {
            $logisticsQuery->where('aggregator_id', '=', $request['aggregator']);
        }

        $logistics = $logisticsQuery->paginate(20);
        return view('logistics.index', [
            'Logistics' => $logistics,
            'aggregators' => $aggregators,
            'status' => $status,
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
        $aggregators = Aggregator::all();
        $logisticsCompanies = LogisticsCompany::all();
        $processorOrders = ProcessorOrder::all();
        $states = State::all();
        return view('logistics.create', [
            'aggregators' => $aggregators,
            'logisticsCompanies' => $logisticsCompanies,
            'processorOrders' => $processorOrders,
            'states' => $states
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogisticsRequest $request)
    {
        try {
            $logistics  = $this->populateLogisitics($request);
            $logistics->save();
            return redirect(route('logistics.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logistics = Logistics::FindOrFail($id);
        return view('logistics.show', ['logistics' => $logistics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $logistics = $this->getLogisticsById($id);
        $aggregators = Aggregator::all();
        $logisticsCompanies = LogisticsCompany::all();
        $processorOrders = ProcessorOrder::all();

        return view('logistics.edit', [
            'aggregators' => $aggregators,
            'logisticsCompanies' => $logisticsCompanies, 'logistics' => $logistics,
            'processorOrders' => $processorOrders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function update(LogisticsRequest $request,  $id)
    {

        try {
            $logistics = $this->getLogisticsById($id);
            $logistics->driver_phone_number = $request->driver_phone_number;
            $logistics->processor_order_id = $request->order;
            $logistics->aggregator_id = $request->aggregator;
            $logistics->logistics_company_id = $request->logistics_company;
            $logistics->no_of_bags = $request->number_of_bags;
            $logistics->truck_number = $request->truck_number;
            $logistics->driver_name = $request->driver_name;
            $logistics->updated_by = Auth::id();
            $logistics->save();
            return redirect(route('logistics.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistics $logistics)
    {
        //
    }

    public function getLogisticsById($id)
    {
        $logistics = Logistics::find($id);
        if (!$logistics)
            abort(404);
        return $logistics;
    }
    public function populateLogisitics(Request $request)
    {
        $logistics = new Logistics();
        $logistics->driver_phone_number = $request->driver_phone_number;
        $logistics->status_id = 3;
        $logistics->driver_name = $request->driver_name;
        $logistics->truck_number = $request->truck_number;
        $logistics->no_of_bags = $request->number_of_bags;
        $logistics->processor_order_id = $request->order;
        $logistics->aggregator_id = $request->aggregator;
        $logistics->logistics_company_id = $request->logistics_company;
        $logistics->created_by = Auth::id();
        $logistics->updated_by = Auth::id();
        $codeGeneration = new CodeGeneration();
        $logistics->code = $codeGeneration->genCode(2);
        return $logistics;
    }
    public function getLogisticsDetail($id)
    {
        $logisticDetails = DB::select('SELECT log.id, p.name processor,agg.name aggregator, log.truck_number, c.name commodity,
                                 st.name state,lc.name logistics_company
                                FROM logistics  log inner join processor_order po on  log.processor_order_id=po.id 
                                inner join processor p on p.id = po.processor_id 
                                inner join aggregator agg on agg.id = log.aggregator_id 
                                inner join commodity c on c.id = po.commodity_id
                                inner join state  st on st.id=po.state_id
                                inner join logistics_company lc on lc.id = log.logistics_company_id
                                WHERE log.id=?', [$id]);
        return json_encode($logisticDetails[0]);
    }
}
