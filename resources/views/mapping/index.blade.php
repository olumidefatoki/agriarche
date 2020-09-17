@extends('layouts.master')
@section('title')
Mapping | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>                    
                    <li><a href=active>Mapping</a></li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Mapping</h3>
                                    <ul class="panel-controls">
                                        <a href="{{ route('mapping.create') }}">
                                            <button class="m-0 btn btn-success" style="float:right;">Add New Mapping </button>
                                        </a>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <th>Aggregator Name</th>
                                                <th>Order code</th>
                                                <th>Commodity</th>
                                                <th>Price(NGN)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            @foreach($orderMappings as $orderMapping)
                            <tr>
                                <td>{{$orderMapping->buyerOrder->buyer->name }}</td>
                                <td>{{$orderMapping->aggregator->name}} </td>
                                <td>{{$orderMapping->id}}</td>
                                <td>{{$orderMapping->buyerOrder->commodity->name }}</td>
                                <td>{{$orderMapping->price}}</td>
                                <td>Active</td>
                            </tr>
                            @endforeach

                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->


                        </div>
                    </div>                                
                    
                </div>
@endsection

@section('script')
@endsection