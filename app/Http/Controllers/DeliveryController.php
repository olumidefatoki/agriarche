<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\OrderMapping;
use Illuminate\Http\Request;
use App\Logistics;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;



class DeliveryController extends Controller
{
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
        return view('delivery.create', ['logistics' => $logistics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'discounted_price' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'discounted_price' => 'required',
            'number_of_bags_accepted' => 'required|max:255|numeric',
            'truck_number' => 'required',
            'quantity_of_bags_accepted' => 'required',
            'number_of_bags_rejected' => 'required|numeric|max:255',
            'quantity_of_bags_rejected' => 'required',
            'waybill' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048',
        ]);
        
        $delivery = new Delivery();
        $delivery->quantity_of_bags_rejected = $request->quantity_of_bags_rejected;
        $delivery->number_of_bags_rejected = $request->number_of_bags_rejected;
        $delivery->quantity_of_bags_accepted = $request->quantity_of_bags_accepted;
        $delivery ->number_of_bags_accepted= $request->number_of_bags_accepted;
        $delivery->logistics_id  = $request->truck_number;
        $delivery->discounted_price =$request->discounted_price;
        $delivery->waybill=$this->uploadImage($request);
        $logistics = Logistics::find($delivery->logistics_id);
        $delivery->coupon_price = $logistics->buyerOrder->price;
        $delivery->aggregator_id = $logistics->aggregator_id;
        $delivery->buyer_order_id = $logistics->buyerOrder->id;
        $orderMapping= OrderMapping::where('buyer_order_id',$logistics->buyerOrder->id)
                        ->where('aggregator_id',$logistics->aggregator_id)->get();
            
        

        $delivery->strike_price =  $logistics;//->buyerOrder; //->orderMapping[0]['price'];

        dd($delivery);
        //return redirect(route('delivery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
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
        //
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

    public function uploadImage(Request $request){

        if ($request->has('waybill')) {
            // Get image file
            $image = $request->file('waybill');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);

        }
        return $filePath;
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
