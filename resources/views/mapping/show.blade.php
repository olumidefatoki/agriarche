@extends('layouts.master')
@section('title')
Aggregator Detail | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>                    
                    <li><a href="#">Aggregator</a></li>
                    <li class="active">Detail</li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h2 class="panel-title">Aggregator</h2>                                                                   
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                <div class=" panel-body">
                                    <table class="table table-bordered table-striped">
                                    <tbody>
                                            <tr>
                                                <td width="50%">Aggregator Name</td>
                                                <td>{{$aggregator->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Address</td>
                                                <td>{{$aggregator->address}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person First Name</td>
                                                <td>{{$aggregator->contact_person_first_name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Last Name</td>
                                                <td>{{$aggregator->contact_person_last_name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Email</td>
                                                <td>{{$aggregator->contact_person_email}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Phone Number</td>
                                                <td>{{$aggregator->contact_person_phone_number}}</td>
                                            </tr> 
                                            <tr>
                                                <td>State</td>
                                                <td>{{$aggregator->state->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Bank</td>
                                                <td>{{$aggregator->bank->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Account Name</td>
                                                <td>{{$aggregator->account_name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Account Number</td>
                                                <td>{{$aggregator->account_number}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Created Date</td>
                                                <td>{{$aggregator->created_at}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Last Updated Date</td>
                                                <td>{{$aggregator->account_number}}</td>
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