<?php

namespace App\Http\Controllers;

use App\Aggregator;
use App\Http\Requests\PricingRequest;
use App\Pricing;
use App\ProcessorOrder;
use App\Processor;
use App\Commodity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processors = Processor::all();
        $commodities = Commodity::all();
        $aggregators = Aggregator::all();
        $pricing = Pricing::orderBy('created_at', 'desc')->paginate(20);
        return view(
            'pricing.index',
            [
                'pricingList' => $pricing,
                'processors' => $processors,
                'commodities' => $commodities,
                'aggregators' => $aggregators
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
        $orders = ProcessorOrder::all();
        $aggregators = Aggregator::all();
        return view('pricing.create', ['aggregators' => $aggregators, 'orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PricingRequest $request)
    {
        try {
            if ($this->isAggregatorOrderExist($request)) {
                return redirect()->back()->withInput()->withErrors(['aggregator' => 'Farmer Influencer has already be mapped to this Order for this commodity.']);
            }
            if (!$this->isPriceValid($request)) {
                return redirect()->back()->withInput()->withErrors(['strike_price' => 'Strike price can not be greater than Order price.']);
            }
            Pricing::create([
                'processor_order_id' => $request->order,
                'price' => $request->price,
                'aggregator_id' => $request->aggregator,
                'commission' => $request->commission,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            return redirect(route('pricing.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return redirect()->back()->withInput()->withErrors(['An error occured!. Kindly contact IT team']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        return view('pricing.show', ['pricing' => $pricing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing)
    {
        return view('pricing.edit', ['pricing' => $pricing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PricingRequest $request, Pricing $pricing)
    {
        try {
            if (!$this->isPriceValid($request)) {
                return redirect()->back()->withInput()->withErrors(['price' => 'Price can not be greater than Order price.']);
            }

            pricing::updateOrCreate(
                ['id' => $pricing->id],
                [
                    'processor_order_id' => $request->order,
                    'price' => $request->price,
                    'aggregator_id' => $request->aggregator,
                    'commission' => $request->commission,
                ]
            );

            return redirect(route('pricing.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return redirect()->back()->withInput()->withErrors(['An error occured!. Kindly contact IT team']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing)
    {
    }

    public function isAggregatorOrderExist(Request $request)
    {
        $count = Pricing::where('processor_order_id', $request->order)
            ->where('aggregator_id', $request->aggregator)
            ->count();
        if ($count == 1) {
            return true;
        }

        return false;
    }

    public function isPriceValid(Request $request)
    {
        $processorOrder = ProcessorOrder::find($request->order);
        if ($request->strike_price > $processorOrder->price) {
            return false;
        }

        return true;
    }

    public function getAggregatorByOrder($id)
    {
        $aggregators = DB::select('SELECT agg.id, agg.name FROM aggregator agg INNER JOIN pricing p ON agg.id = p.aggregator_id WHERE p.processor_order_id=?', [$id]);

        return json_encode($aggregators);
    }
}
