@extends('layouts.master')
@section('title')
logistics details | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Pickup</a></li>
<li class="active">Details</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Pickup</h2>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class=" panel-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="50%">Order Code</td>
                                    <td>{{$logistics->code}}</td>
                                </tr>
                                <tr>
                                    <td>Processor Name</td>
                                    <td>{{$logistics->processorOrder->processor->name}}</td>
                                </tr>
                                <tr>
                                    <td>Farmer Influencer Name</td>
                                    <td>{{$logistics->aggregator->name}}</td>
                                </tr>
                                <tr>
                                    <td>Pickup State</td>
                                    <td>{{$logistics->pickupState->name}}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Location</td>
                                    <td>{{$logistics->pickup_location}}</td>
                                </tr>
                                <tr>
                                    <td>Delivery state</td>
                                    <td>{{$logistics->processorOrder->state->name}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$logistics->status->name}}</td>
                                </tr>
                                <tr>
                                    <td>Commodity</td>
                                    <td>{{$logistics->processorOrder->commodity->name}}</td>
                                </tr>
                                <tr>
                                    <td>Number Of Bags</td>
                                    <td>{{$logistics->no_of_bags}}</td>
                                </tr>
                                <tr>
                                    <td>Logistics Company</td>
                                    <td>{{$logistics->driver_phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>Driver Name</td>
                                    <td>{{$logistics->driver_name}}</td>
                                </tr>
                                <tr>
                                    <td>Driver Phone Number</td>
                                    <td>{{$logistics->driver_phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>{{$logistics->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Last Modified</td>
                                    <td>{{$logistics->updated_at}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
@endsection