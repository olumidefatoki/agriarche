@extends('layouts.master')
@section('title')
Order | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Order</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Order</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('order.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Order </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                <div class="row">
                        <div class="col-md-3"><input class="form-control input-sm" id="Name" type="text" placeholder="Processor" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Commodity" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="State" /></div>

                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-from-sch" type="text" placeholder="Start Date(yyyy-mm-dd)"  onclick="javascript:NewCssCal('date-from-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-to-sch" type="text" placeholder="End Date(yyyy-mm-dd)" onclick="javascript:NewCssCal('date-to-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2"><select id="reg_type" name="reg_type" class="form-control"><option value="">Select</option></select></div> -->
                        <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        <!--<div class="col-md-3"><button class="btn btn-default btn-sm form-control input-sm" id="download"><i class="fa fa-download"></i> Download Activated Cards</button></div> -->
                    </div>
                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th nowrap>Code</th>
                                    <th nowrap>Processor</th>
                                    <th nowrap>Commodity</th>
                                    <th nowrap>Coupon Price </th>
                                    <th nowrap>Order Qty(MT)</th>
                                    <th nowrap>State</th>
                                    <th nowrap>Delivery Location</th>                                   
                                    <th nowrap>Start Date</th>
                                    <th nowrap>End Date</th>
                                    <th nowrap>Creation Date</th>
                                    <th nowrap >Last Updated Date</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($processorOrders) > 0)
                                @foreach($processorOrders as $processorOrder)
                                <tr>
                                    <td nowrap>{{$processorOrder->code}} </td>
                                    <td nowrap>{{$processorOrder->processor->name}} </td>
                                    <td nowrap>{{$processorOrder->commodity->name}}</td>
                                    <td nowrap>&#8358;{{number_format($processorOrder->price)}}</td>
                                    <td nowrap>{{number_format($processorOrder->quantity,2)}}</td>
                                    <td nowrap>{{$processorOrder->state->name}}</td>
                                    <td >{{$processorOrder->delivery_location}}</td>
                                    <td nowrap>{{$processorOrder->start_date}}</td>
                                    <td nowrap>{{$processorOrder->end_date}}</td>
                                    <td >{{$processorOrder->created_at}}</td>
                                    <td >{{$processorOrder->updated_at}}</td>
                                    <td nowrap><a href="{{ route('order.edit',$processorOrder) }}" class="btn btn-sm btn-info" 
                                        data-toggle="tooltip" data-placement="top" title="Edit Order">
                                            <i class="fa fa-edit"></i></a>
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
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>
@endsection

@section('script')
@endsection