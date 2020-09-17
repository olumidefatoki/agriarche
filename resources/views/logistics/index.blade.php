@extends('layouts.master')
@section('title')
Logistics | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>                    
                    <li><a href=active>Logistics</a></li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Logistics</h3>
                                    <ul class="panel-controls">
                                        <a href="{{ route('logistics.create') }}">
                                            <button class="m-0 btn btn-success" style="float:right;">Add New Logistics </button>
                                        </a>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Buyer</th>
                                                <th>Aggregator</th>
                                                <th>Commodity</th>
                                                <th>Truck No</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Logistics as $logistics)
                                            <tr>
                                            <td>{{$logistics->buyerOrder->buyer->name}} </td>
                      <td>{{ $logistics->aggregator->name}}</td>
                      <td>{{ $logistics->buyerOrder->commodity->name}}</td>
                      <td>{{ $logistics->truck_number}}</td>
                                                <td>{{$logistics->status->name}}</td>
                                                <td><a href="{{ route('logistics.show',$logistics) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
                                            </tr>
                                          @endforeach 
                                        </tbody>
                                    </table>
                                    <div>
                                    {{$Logistics->links()}}
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->


                        </div>
                    </div>                                
                    
                </div>
@endsection

@section('script')
@endsection