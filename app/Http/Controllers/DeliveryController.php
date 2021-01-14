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
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::orderBy('created_at', 'desc')->paginate(20);
        return view('delivery.index', ['deliveries' => $deliveries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logistics = Logistics::where('status_id', 3)->get();
        $status = Status::find([8, 9]);
        return view('delivery.create', ['logistics' => $logistics, 'status' => $status]);
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
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
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
        return view('delivery.edit', ['logistics' => $logistics, 'delivery' => $delivery,
                    'status' => $status]);
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
       
        try{
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

    public function uploadImage(Request $request)
    {

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

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }
    public function populateDeliveryRequest(Request $request, Delivery $delivery)
    {
        $delivery->number_of_bags_rejected = $request->number_of_bags_rejected;
        $delivery->quantity_of_bags_accepted = $request->quantity_of_bags_accepted;
        $delivery->logistics_id  = $request->logistics;
        $delivery->discounted_price = $request->discounted_price;
        $delivery->waybill = $this->uploadImage($request);
        $delivery->status_id   = $request->status;
        $logistics = Logistics::find($delivery->logistics_id);
        $delivery->order_price = $logistics->processorOrder->price;
        $pricing = Pricing::where('processor_order_id', $logistics->processorOrder->id)
                        ->where('aggregator_id', $logistics->aggregator_id)->first();
        $delivery->aggregator_price =  $pricing->price;
        $delivery->order_commission =  $pricing->commission;
        $delivery->updated_by =  Auth::id();
        return $delivery;
    }
}
