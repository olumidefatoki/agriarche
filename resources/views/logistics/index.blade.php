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
                        <form action="{{ route('logistics.index') }}">
                            @csrf
                            <div class="col-md-3">
                                <select id="aggregator" name="aggregator" class="form-control select">
                                    <option selected disabled>Select a Farmer Influencer</option>
                                    <?php $aggregatorId = (isset($data['aggregator']) ? $data['aggregator'] : ""); ?>
                                    @foreach ($aggregators as $aggregator)
                                    <option @if($aggregator->id == $aggregatorId ) selected="selected" @endif value="{{ $aggregator->id }}">{{ strtoupper($aggregator->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2"><input class="form-control input-sm" name="truck_no" type="text" placeholder="Truck number" value="{{ (isset($data['truck_no']) ? $data['truck_no'] : '')}}" /></div>
                            <div class="col-md-2">
                                <select id="status" name="status" class="form-control select">
                                    <option selected disabled>Select a Status</option>
                                    <?php $statusId = (isset($data['status']) ? $data['status'] : ""); ?>
                                    @foreach ($status as $stat)
                                    <option @if($stat->id == $statusId ) selected="selected" @endif value="{{ $stat->id }}">{{ strtoupper($stat->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        </form>
                        <div class="col-md-2">
                            <a href="{{ route('logistics.index') }}">
                                <button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Clear Filter</button>
                            </a>
                        </div>
                    </div>

                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th nowrap>Code</th>
                                    <th nowrap>Farmer Influencer</th>
                                    <th nowrap>Delivery state</th>
                                    <th nowrap>Aggregator</th>
                                    <th>Commodity</th>
                                    <th nowrap>Logisitics Company</th>
                                    <th nowrap>Truck No</th>
                                    <th nowrap>Status</th>
                                    <th>Creaton Date</th>
                                    <th nowrap style="text-align:center">Action</th>
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
                                    <td>{{ $logistics->logisticsCompany->name}}</td>
                                    <td>{{ $logistics->truck_number}}</td>
                                    <td>{{$logistics->status->name}}</td>
                                    <td>{{$logistics->created_at}}</td>
                                    <td nowrap>
                                        <a href="{{ route('logistics.edit',$logistics) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('logistics.show',$logistics) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Open">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>

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
                        {{$Logistics->appends($data)->links()}}
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