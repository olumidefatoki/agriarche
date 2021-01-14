<?php

namespace App\Http\Controllers;

use App\BuyerOrder;
use App\Buyer;
use App\Commodity;
use App\CodeGeneration;
use Illuminate\Support\Facades\Log;
use  App\Http\Requests\BuyerOrderRequest;
use Exception;
use App\State;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BuyerOrderController extends Controller
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
        $buyerOrders = BuyerOrder::orderBy('created_at', 'desc')->paginate(20);
        return view('order.index', ['buyerOrders' => $buyerOrders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $buyers = Buyer::all();
        $commodities = Commodity::all();
        return view('order.create', ['states' => $states, 'buyers' => $buyers, 'commodities' => $commodities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyerOrderRequest $request)
    {
        if (!$this->isValidEndDate($request))
            return redirect()->back()->withInput()->withErrors(array('end_date' => 'End date must be greater than Start date'));
        try {
            $buyerOrder = $this->populateBuyerOrderObject($request, new BuyerOrder());
            $codeGeneration = new CodeGeneration();
            $buyerOrder->code = $codeGeneration->genCode(1);
            $buyerOrder->save();
            return redirect(route('order.index'));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyerOrder  $BuyerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerOrder $buyerOrder)
    {
        return view('order.show', ['buyerOrder' => $buyerOrder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $buyerOrder = $this->getBuyerOrderById($id);
        $states = State::all();
        $commodities = Commodity::all();
        $buyers=Buyer::all();
        return view('order.edit', ['states' => $states, 
                    'buyerOrder'=>$buyerOrder,
                    'buyers' => $buyers, 
                    'commodities' => $commodities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(BuyerOrderRequest $request, BuyerOrder $order)
    {
        try{  
             $buyerOrder = $this->getBuyerOrderById($order->id);
            BuyerOrder::updateOrCreate(
                ['id' => $buyerOrder->id],
                array(
                    'buyer_id' => $request->buyer,
                    'delivery_location' => $request->delivery_location,
                    'quantity' => $request->quantity,
                    'coupon_price' => $request->coupon_price,
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
     * @param  \App\BuyerOrder  $buyerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerOrder $buyerOrder)
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

    public function populateBuyerOrderObject(Request $request, BuyerOrder $buyerOrder)
    {
        $buyerOrder->buyer_id = $request->buyer;
        $buyerOrder->delivery_location = $request->delivery_location;
        $buyerOrder->quantity = $request->quantity;
        $buyerOrder->coupon_price = $request->coupon_price;
        $buyerOrder->commodity_id = $request->commodity;
        $buyerOrder->state_id = $request->state;
        $buyerOrder->start_date = $request->start_date;
        $buyerOrder->end_date = $request->end_date;
        $buyerOrder->created_by  =  Auth::id();
        $buyerOrder->updated_by = Auth::id();
        return $buyerOrder;
    }

    public function getBuyerOrderById($id)
    {
        $buyerOrder = BuyerOrder::find($id);
        if (!$buyerOrder) {
            abort(404);
        }
        return $buyerOrder;
    }
}
