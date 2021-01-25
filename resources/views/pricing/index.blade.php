@extends('layouts.master')
@section('title')
Farmer Influencer Pricing | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Farmer Influencer Pricing</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Farmer Influencer Pricing</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('pricing.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Pricing </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="{{ route('pricing.index') }}">
                            @csrf
                            <div class="col-md-3">
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
                            <a href="{{ route('pricing.index') }}">
                                <button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Clear Filter</button>
                            </a>
                        </div>
                    </div>
                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Processor</th>
                                    <th>Delivery State</th>
                                    <th>Commodity</th>
                                    <th>Farmer Influencer</th>
                                    <th>Price</th>
                                    <th>Commission</th>
                                    <th>Creation Date</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pricingList as $pricing)
                                <tr>
                                    <td>{{$pricing->processorOrder->processor->name }}</td>
                                    <td>{{$pricing->processorOrder->state->name }}</td>
                                    <td>{{$pricing->processorOrder->commodity->name }}</td>
                                    <td>{{$pricing->aggregator->name}} </td>
                                    <td>&#8358;{{$pricing->price}}</td>
                                    <td>&#8358;{{$pricing->commission}}</td>
                                    <td>{{$pricing->created_at}}</td>
                                    <td nowrap>
                                        <a href="{{ route('pricing.edit',$pricing) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit pricing">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('pricing.show',$pricing) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Open pricing">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{$pricingList->appends($data)->links()}}
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>
@endsection

@section('script')
@endsection