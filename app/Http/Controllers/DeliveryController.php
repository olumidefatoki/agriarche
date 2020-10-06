<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\OrderMapping;
use Illuminate\Http\Request;
use App\Logistics;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\CreateDeliveryRequest;
use App\Status;

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
        $logistics = Logistics::all();
        $status = Status::find([8, 9]);
        return view('delivery.create', ['logistics' => $logistics, 'status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDeliveryRequest $request)
    {

        $delivery = new Delivery();
        $delivery = $this->populateDeliveryRequest($request,  $delivery);
        $logistics = Logistics::find($delivery->logistics_id);
        $delivery->coupon_price = $logistics->buyerOrder->coupon_price;
        $orderMapping = OrderMapping::where('buyer_order_id', $logistics->buyerOrder->id)
            ->where('aggregator_id', $logistics->aggregator_id)->first();
        $delivery->strike_price =  $orderMapping->strike_price;
        $delivery->save();
        return redirect(route('delivery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //dd($delivery);
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
        return view('delivery.edit', ['logistics' => $logistics, 'delivery' => $delivery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
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
            // Get image file
            $image = $request->file('waybill');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
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
        $delivery->quantity_of_bags_rejected = $request->quantity_of_bags_rejected;
        $delivery->number_of_bags_rejected = $request->number_of_bags_rejected;
        $delivery->quantity_of_bags_accepted = $request->quantity_of_bags_accepted;
        $delivery->number_of_bags_accepted = $request->number_of_bags_accepted;
        $delivery->logistics_id  = $request->logistics;
        $delivery->discounted_price = $request->discounted_price;
        $delivery->waybill = $this->uploadImage($request);
        $delivery->status_id   = $request->status;
        return $delivery;
    }
}
