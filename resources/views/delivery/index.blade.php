@extends('layouts.master')
@section('title')
Delivery | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li class="active"><a href="#">Delivery</a></li>
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
                        <form action="{{ route('delivery.index') }}">
                            @csrf
                            <div class="col-md-2">
                                <select id="processor" name="processor" class="form-control select">
                                    <option selected disabled>Select a processor</option>
                                    <?php $processorId = (isset($data['processor']) ? $data['processor'] : ""); ?>
                                    @foreach ($processors as $processor)
                                    <option @if($processor->id == $processorId ) selected="selected" @endif value="{{ $processor->id }}">{{strtoupper($processor->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="commodity" name="commodity" class="form-control select">
                                    <?php $commodityId = (isset($data['commodity']) ? $data['commodity'] : ""); ?>
                                    <option selected disabled>Select a Commodity</option>
                                    @foreach ($commodities as $commodity)
                                    <option @if($commodity->id == $commodityId ) selected="selected" @endif value="{{ $commodity->id }}">{{ strtoupper($commodity->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="aggregator" name="aggregator" class="form-control select">
                                    <?php $aggregatorId = (isset($data['commodity']) ? $data['commodity'] : ""); ?>
                                    <option selected disabled>Select an Influencer</option>
                                    @foreach ($aggregators as $aggregator)
                                    <option @if($aggregator->id == $aggregatorId ) selected="selected" @endif value="{{ $aggregator->id }}">{{ strtoupper($aggregator->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        </form>
                        <div class="col-md-2">
                            <a href="{{ route('delivery.index') }}">
                                <button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Clear Filter</button>
                            </a>
                        </div>
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
                                    <th nowrap>Payable Amount</th>
                                    <th nowrap>Quantity Delivered(KG)</th>
                                    <th nowrap>Status</th>
                                    <th nowrap>Action</th>
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
                                    <td nowrap>&#8358; {{number_format($delivery->quantity_of_bags_accepted * ($delivery->discounted_price),2)}}</td>
                                    <td>{{number_format($delivery->quantity_of_bags_accepted,2)}}</td>

                                    <td>{{$delivery->status->name}}</td>
                                    <td nowrap><a href="{{ route('delivery.edit',$delivery) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit Delivery">
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