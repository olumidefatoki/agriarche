@extends('layouts.master')
@section('title')
Delivery | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li class = "active"><a href="#">Delivery</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Delivery</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('delivery.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Delivery </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                <div class="row">
                <div class="col-md-3"><input class="form-control input-sm" id="Name" type="text" placeholder="Processor" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Farmer Influencer" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Commodity" /></div>
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
                                <th nowrap>Logistics Code</th>
                                    <th nowrap>Processor</th>
                                    <th nowrap>Farmer Influencer</th>
                                    <th nowrap>Delivery Point</th>
                                    <th nowrap>Commodity</th>
                                    <th nowrap>Total Amount</th>
                                    <th nowrap>Payable Amount</th>
                                    <th nowrap>Quantity Delivered(KG)</th>
                                    <th nowrap>Status</th>
                                    <th  nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($deliveries) > 0)
                                @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->logistics->code}}</td>
                                    <td>{{$delivery->logistics->processorOrder->processor->name}}</td>
                                    <td>{{$delivery->logistics->aggregator->name}}</td>
                                    <td>{{$delivery->logistics->processorOrder->state->name}}</td>
                                    <td>{{$delivery->logistics->processorOrder->commodity->name}}</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_accepted * $delivery->order_price,2)}}</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_accepted * ($delivery->discounted_price),2)}}</td>
                                    <td>{{number_format($delivery->quantity_of_bags_accepted,2)}}</td>
                                    
                                    <td>{{$delivery->status->name}}</td>
                                    <td   nowrap><a href="{{ route('delivery.edit',$delivery) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit Delivery">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delivery.show',$delivery) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Open Delivery">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{$deliveries->links()}}
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