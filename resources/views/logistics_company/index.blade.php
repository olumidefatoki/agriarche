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
                                    <h3 class="panel-title">Logistics company</h3>
                                    <ul class="panel-controls">
                                        <a href="{{ route('logisticsCompany.create') }}">
                                            <button class="m-0 btn btn-success" style="float:right;">Add New Logistics company </button>
                                        </a>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Logistics company Name</th>
                                                <th>Contact Person Name</th>
                                                <th>Contact Person Phone Number</th>
                                                <th>Address</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($logisticsCompanies as $logisticsCompany)
                                            <tr>
                                            <td>{{$logisticsCompany->name}} </td>
                      <td>{{$logisticsCompany->contact_person_name}} </td>
                      <td>{{$logisticsCompany->contact_person_phone_number}}</td>
                      <td>{{$logisticsCompany->address}}</td>
                                                <td>{{$logisticsCompany->state->name}}</td>
                                                <td><a href="{{ route('logisticsCompany.show',$logisticsCompany) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
                                            </tr>
                                          @endforeach 
                                        </tbody>
                                    </table>
                                    <div>
                                    {{$logisticsCompanies->links()}}
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