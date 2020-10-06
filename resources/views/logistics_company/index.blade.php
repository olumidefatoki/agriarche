@extends('layouts.master')
@section('title')
Logistics company | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Logistics company</a></li>
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
                <div class="row">
                        <div class="col-md-3"><input class="form-control input-sm" id="Name" type="text" placeholder="Aggregator" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Contact Name" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="State" /></div>

                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-from-sch" type="text" placeholder="Start Date(yyyy-mm-dd)"  onclick="javascript:NewCssCal('date-from-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-to-sch" type="text" placeholder="End Date(yyyy-mm-dd)" onclick="javascript:NewCssCal('date-to-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2"><select id="reg_type" name="reg_type" class="form-control"><option value="">Select</option></select></div> -->
                        <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        <!--<div class="col-md-3"><button class="btn btn-default btn-sm form-control input-sm" id="download"><i class="fa fa-download"></i> Download Activated Cards</button></div> -->
                    </div>
                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Person Name</th>
                                    <th>Contact Person Phone Number</th>
                                    <th>State</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($logisticsCompanies) > 0)
                                @foreach($logisticsCompanies as $logisticsCompany)
                                <tr>
                                    <td>{{$logisticsCompany->name}} </td>
                                    <td>{{$logisticsCompany->address}} </td>
                                    <td>{{$logisticsCompany->contact_person_name}} </td>
                                    <td>{{$logisticsCompany->contact_person_phone_number}}</td>
                                    <td>{{$logisticsCompany->state->name}}</td>
                                    <td>{{$logisticsCompany->created_at}} </td>
                                    <td>
                                        <a href="{{ route('logisticsCompany.edit',$logisticsCompany) }}" class="btn btn-sm btn-info" 
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
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