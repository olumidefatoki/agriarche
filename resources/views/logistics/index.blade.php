@extends('layouts.master')
@section('title')
Pickup | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Pickup</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pickup</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('logistics.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Pickup </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <select id="aggregator" name="aggregator" class="form-control select">
                                <option selected disabled>Select a Farmer Influ
                                    encer</option>
                                @foreach ($aggregators as $aggregator)
                                <option value="{{ $aggregator->id }}">{{ strtoupper($aggregator->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Truck number" /></div>
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
                                    <th nowrap>Code</th>
                                    <th nowrap>Buyer</th>
                                    <th nowrap>Delivery state</th>
                                    <th nowrap>Aggregator</th>
                                    <th>Commodity</th>
                                    <th nowrap>No of Bags</th>
                                    <th nowrap>Logisitics Company</th>
                                    <th nowrap>Truck No</th>
                                    <th nowrap>Driver Name</th>
                                    <th nowrap>Driver Phone</th>
                                    <th nowrap>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($Logistics) > 0)
                                @foreach($Logistics as $logistics)
                                <tr>
                                    <td>{{ $logistics->code}}</td>
                                    <td>{{$logistics->processorOrder->processor->name}} </td>
                                    <td>{{$logistics->processorOrder->state->name}} </td>
                                    <td>{{ $logistics->aggregator->name}}</td>
                                    <td>{{ $logistics->processorOrder->commodity->name}}</td>
                                    <td>{{ number_format($logistics->no_of_bags)}}</td>
                                    <td>{{ $logistics->logisticsCompany->name}}</td>
                                    <td>{{ $logistics->truck_number}}</td>
                                    <td>{{ $logistics->driver_name}}</td>
                                    <td>{{ $logistics->driver_phone_number}}</td>
                                    <td>{{$logistics->status->name}}</td>
                                    <td>
                                        <a href="{{ route('logistics.edit',$logistics) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
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