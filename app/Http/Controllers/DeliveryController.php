<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Pricing;
use Illuminate\Http\Request;
use App\Logistics;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\DeliveryRequest;
use App\Status;
use App\Processor;
use App\Commodity;
use App\Aggregator;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
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
        $processors = Processor::select('id', 'name')->orderBy('name', 'asc')->get();
        $commodities = Commodity::select('id', 'name')->orderBy('name', 'asc')->get();
        $aggregators = Aggregator::select('id', 'name')->orderBy('name', 'asc')->get();

        $deliveryQuery = Delivery::query();
        $deliveryQuery->orderBy('created_at', 'desc');
        if (!is_null($request['commodity'])) {
            $deliveryQuery->where('commodity_id', '=', $request['commodity']);
        }

        if (!is_null($request['processor'])) {
            $deliveryQuery->where('processor_id', '=', $request['processor_id']);
        }
        if (!is_null($request['aggregator'])) {
            $deliveryQuery->where('aggregator_id', '=', $request['aggregator']);
        }
        if (!is_null($request['start_date']) && !is_null($request['end_date'])) {
            $startDate = $request['start_date'] . ' 00:00:00';
            $endDate   = $request['end_date'] . ' 23:59:59';
            $deliveryQuery->whereBetween('created_at', array($startDate, $endDate));
        }

        $deliveries = $deliveryQuery->paginate(20);

        return view('delivery.index', [
            'deliveries' => $deliveries,
            'processors' => $processors,
            'commodities' => $commodities,
            'aggregators' => $aggregators,
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
        $processors = Processor::select('id', 'name')->orderBy('name', 'asc')->get();
        $logistics = Logistics::where('status_id', 3)->get();
        $status = Status::find([8, 9, 10, 11]);
        return view('delivery.create', [
            'logistics' => $logistics,
            'status' => $status,
            'processors' => $processors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryRequest $request)
    {
        try {
            $delivery = new Delivery();
            $delivery->created_by =  Auth::id();

            $delivery = $this->populateDeliveryRequest($request,  $delivery);
            if ($delivery->save()) {
                $logistics = Logistics::find($request->logistics);
                $logistics->status_id = 5;
                $logistics->save();
                return redirect(route('delivery.index'));
            }

            return redirect()->back()->withInput()->withErrors('unable to submit record. kindly contact IT.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        return view('delivery.show', ['delivery' => $delivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {

        $logistics = Logistics::all();
        $status = Status::find([8, 9]);
        return view('delivery.edit', [
            'logistics' => $logistics, 'delivery' => $delivery,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {

        try {
            $this->populateDeliveryRequest($request,  $delivery);
            $delivery->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    private function uploadImage(Request $request)
    {
        if ($request->status == 9) {
            return "";
        }
        $request->validate([
            'waybill' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);

        if ($request->has('waybill')) {
            $filePath = base64_encode(file_get_contents($request->file('waybill')));
            //dd($filePath);
            // Get image file
            // $image = $request->file('waybill');
            // // Make a image name based on user name and current timestamp
            // $name =date("Ymdhis");
            // // Define folder path
            // $folder = '/uploads/images/';
            // // Make a file path where image will be stored [ folder path + file name + file extension]
            // $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // // Upload image
            // $this->uploadOne($image, $folder, 'public', $name);
        }

        return $filePath;
    }

    private function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }

    private function populateDeliveryRequest(Request $request, Delivery $delivery)
    {
        //$this->validateWaybillImage($request);
        $delivery->number_of_bags_rejected = $request->number_of_bags_rejected;
        $delivery->quantity_of_bags_accepted = $request->quantity_of_bags_accepted;
        $delivery->logistics_id  = $request->logistics;
        $delivery->discounted_price = $request->discounted_price;
        $delivery->waybill = $this->uploadImage($request);
        $delivery->status_id   = $request->status;
        $logistics = Logistics::find($delivery->logistics_id);
        $delivery->aggregator_id = $logistics->aggregator_id;
        $delivery->order_price = $logistics->processorOrder->price;
        $delivery->processor_id = $logistics->processorOrder->processor_id;
        $delivery->commodity_id = $logistics->processorOrder->commodity_id;
        $pricing = Pricing::where(
            'processor_order_id',
            $logistics->processorOrder->id
        )
            ->where('aggregator_id', $logistics->aggregator_id)->first();
        $delivery->aggregator_price =  $pricing->price;
        $delivery->order_commission =  $pricing->commission;
        $delivery->updated_by =  Auth::id();
        return $delivery;
    }

    public function approve($id)
    {
        $delivery = Delivery::find($id);
        $delivery->approval_status_id = 7;
        $delivery->save();
        return json_encode(array('id' => $id));
    }
}
