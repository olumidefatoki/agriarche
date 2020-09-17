@extends('layouts.master')
@section('title')
Buyer index | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>                    
                    <li><a href=active>Aggregator</a></li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Aggregator</h3>
                                    <ul class="panel-controls">
                                        <a href="{{ route('aggregator.create') }}">
                                            <button class="m-0 btn btn-success" style="float:right;">Add New Aggregator </button>
                                        </a>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Buyer Name</th>
                                                <th>Contact Person Name</th>
                                                <th>Contact Person Phone Number</th>
                                                <th>Contact Person Email</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($aggregators as $aggregator)
                                            <tr>
                                            <td>{{$aggregator->name}} </td>
                      <td>{{$aggregator->contact_person_first_name}} , {{$aggregator->contact_person_last_name }}</td>
                      <td>{{$aggregator->contact_person_phone_number}}</td>
                      <td>{{$aggregator->contact_person_email}}</td>
                                                <td>{{$aggregator->state->name}}</td>
                                                <td><a href="{{ route('aggregator.show',$aggregator) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
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