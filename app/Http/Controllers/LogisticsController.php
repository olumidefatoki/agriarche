<?php

namespace App\Http\Controllers;

use App\Logistics;
use App\Aggregator;
use App\LogisticsCompany;
use App\BuyerOrder;
use Illuminate\Http\Request;
use App\Http\Requests\LogisticsRequest;
use App\CodeGeneration;
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
    public function index()
    {
        $Logistics = Logistics::orderBy('created_at', 'desc')->paginate(20);
        return view('logistics.index', ['Logistics' => $Logistics]);
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
        $buyerOrders = BuyerOrder::all();

        return view('logistics.create', [
            'aggregators' => $aggregators,
            'logisticsCompanies' => $logisticsCompanies,
            'buyerOrders' => $buyerOrders
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
    public function show(Logistics $logistics)
    {
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
        $buyerOrders = BuyerOrder::all();

        return view('logistics.edit', [
            'aggregators' => $aggregators,
            'logisticsCompanies' => $logisticsCompanies, 'logistics' => $logistics,
            'buyerOrders' => $buyerOrders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'aggregator_id' => 'required',
            'logistics_company_id' => 'required',
            'number_of_bags' => 'required',
            'quantity' => 'required',
            'truck_number' => 'required|max:8',
            'driver_name' => 'required|max:255',
            'driver_phone_number' => 'required|digits:11',

        ]);

        $logistics = $this->getLogisticsById($id);
        $logistics->driver_phone_number = $request->driver_phone_number;
        $logistics->buyer_order_id = $request->order_id;
        $logistics->aggregator_id = $request->aggregator_id;
        $logistics->logistics_company_id = $request->logistics_company_id;
        $logistics->no_of_bags = $request->number_of_bags;
        $logistics->quantity = $request->quantity;
        $logistics->truck_number = $request->truck_number;
        $logistics->driver_name = $request->driver_name;
        $logistics->save();
        return redirect(route('logistics.index'));
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
        $logistics->quantity = $request->quantity;
        $logistics->no_of_bags = $request->number_of_bags;
        $logistics->buyer_order_id = $request->order;
        $logistics->aggregator_id = $request->aggregator;
        $logistics->logistics_company_id = $request->logistics_company;
        $logistics->created_by= Auth::id();
        $logistics->updated_by = Auth::id();
        $codeGeneration = new CodeGeneration();
        $logistics->code = $codeGeneration->genCode(2);
        return $logistics;
    }
    public function getLogisticsDetail($id)
    {
        $logisticDetails = DB::select('SELECT log.id, b.name buyer,agg.name aggregator, log.truck_number, c.name commodity,
                                 log.quantity truck_quantity, st.name state,lc.name logistics_company
                                FROM logistics  log inner join buyer_order byo on  log.buyer_order_id=byo.id 
                                inner join buyer b on b.id = byo.buyer_id 
                                inner join aggregator agg on agg.id = log.aggregator_id 
                                inner join commodity c on c.id = byo.commodity_id
                                inner join state  st on st.id=byo.state_id
                                inner join logistics_company lc on lc.id = log.logistics_company_id
                                WHERE log.id=?', [$id]);
        return json_encode($logisticDetails[0]);
    }
}
