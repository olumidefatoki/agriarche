@extends('layouts.master')
@section('title')
logistics details | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>                    
                    <li><a href="#">logistics</a></li>
                    <li class="active">Details</li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h2 class="panel-title">logistics</h2>                                                                   
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                <div class=" panel-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="50%">Order Code</td>
                                                <td>{{$logistics->buyer_order_id}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Buyer Name</td>
                                                <td>{{$logistics->buyerOrder->buyer->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Aggregator Name</td>
                                                <td>{{$logistics->aggregator->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Commodity</td>
                                                <td>{{$logistics->buyerOrder->commodity->namee}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Number Of Bags</td>
                                                <td>{{$logistics->no_of_bags}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Quantity</td>
                                                <td>{{$logistics->quantity}}</td>
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