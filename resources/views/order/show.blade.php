@extends('layouts.master')
@section('title')
Order Details | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>                    
                    <li><a href="#">Order</a></li>
                    <li class="active">Detail</li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h2 class="panel-title">Order</h2>                                                                   
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                <div class=" panel-body">
                                    <table class="table table-bordered table-striped">
                                    <tbody>
                                            <tr>
                                                <td width="50%">Code</td>
                                                <td>{{$buyerOrder->Code}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Buyer Name</td>
                                                <td>{{$buyerOrder->buyer->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Commodity</td>
                                                <td>{{$buyerOrder->commodity->name}}</td>
                                            </tr> 
                                            <tr>
                                            <tr>
                                                <td>Quantity order</td>
                                                <td>{{$buyerOrder->quantity}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Quantity Delviery</td>
                                                <td></td>
                                            </tr>                                              
                                            <tr>
                                                <td>Quantity Balance</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Completion Status(%)</td>
                                                <td></td>
                                            </tr>  
                                            <tr>
                                                <td>Price</td>
                                                <td>{{$buyerOrder->price}}</td>
                                            </tr> 
                                            <tr>
                                                <td>State</td>
                                                <td>{{$buyerOrder->state->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Delivery Location</td>
                                                <td>{{$buyerOrder->delivery_location}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Duration</td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>Start Date</td>
                                                <td>{{$buyerOrder->start_date}}</td>
                                            </tr> 
                                            <tr>
                                                <td>End Date</td>
                                                <td>{{$buyerOrder->end_date}}</td>
                                            </tr>  
                                            <tr>
                                                <td>Created Date</td>
                                                <td>{{$buyerOrder->created_at}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Last Updated Date</td>
                                                <td>{{$buyerOrder->updated_at}}</td>
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