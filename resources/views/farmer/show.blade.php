@extends('layouts.master')
@section('title')
Processor index | Agriarche 
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>                    
                    <li><a href="#">Processor</a></li>
                    <li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h2 class="panel-title">Processor</h2>                                                                   
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                <div class=" panel-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="50%">Processor Name</td>
                                                <td>{{$processor->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Address</td>
                                                <td>{{$processor->address}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Category</td>
                                                <td>{{$processor->category}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person First Name</td>
                                                <td>{{$processor->contact_person_first_name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Last Name</td>
                                                <td>{{$processor->contact_person_last_name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Email</td>
                                                <td>{{$processor->contact_person_email}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Contact Person Phone Number</td>
                                                <td>{{$processor->contact_person_phone_number}}</td>
                                            </tr> 
                                            <tr>
                                                <td>State</td>
                                                <td>{{$processor->state->name}}</td>
                                            </tr> 
                                            <tr>
                                                <td>KYC CAC</td>
                                                <td></td>
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