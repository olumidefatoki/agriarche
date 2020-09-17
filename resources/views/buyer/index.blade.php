@extends('layouts.master')
@section('title')
Buyer | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>                    
                    <li><a href=active>Buyer</a></li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Buyer</h3>
                                    <ul class="panel-controls">
                                        <a href="{{ route('buyer.create') }}">
                                            <button class="m-0 btn btn-success" style="float:right;">Add New Buyer </button>
                                        </a>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover">
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
                                        @foreach($buyers as $buyer)
                                            <tr>
                                            <td>{{$buyer->name}} </td>
                      <td>{{$buyer->contact_person_first_name}} , {{$buyer->contact_person_last_name }}</td>
                      <td>{{$buyer->contact_person_phone_number}}</td>
                      <td>{{$buyer->contact_person_email}}</td>
                                                <td>{{$buyer->state->name}}</td>
                                                <td><a href="{{ route('buyer.show',$buyer->id) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
                                            </tr>
                                          @endforeach 
                                        </tbody>
                                    </table>
                                    <div>
                                    {{$buyers->links()}}
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