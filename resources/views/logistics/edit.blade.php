@extends('layouts.master')
@section('title')
Update Logistics | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Logistics </a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Logistics</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('logistics.update',$logistics)}}">
                        @method('PATCH')   
                        @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="order_id" class="form-control select">
                                        @foreach ($buyerOrders as $buyerOrder)
                                        <option  @if($buyerOrder->id == $logistics->buyer_order_id) selected="selected" @endif value="{{ $buyerOrder->id }}">
                                            {{$logistics->buyerOrder->buyer->name }} >> 
                                            {{$logistics->buyerOrder->state->name}} >>
                                            {{$logistics->buyerOrder->commodity->name}} 

                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Aggregator:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator_id" class="form-control select">
                                        @foreach ($aggregators as $aggregator)
                                        <option @if($aggregator->id == $logistics->aggregator_id) selected="selected" @endif  value="{{ $aggregator->id }}">
                                            {{ $aggregator->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logistics Company:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="logistics_company_id" class="form-control select">
                                        @foreach ($logisticsCompanies as $logisticsCompany)
                                        <option @if($logisticsCompany->id == $logistics->logistics_company_id) selected="selected" @endif  value="{{ $logisticsCompany->id }}">
                                            {{ $logisticsCompany->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('number_of_bags') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Number Of Bags:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="number_of_bags" class="form-control" value="{{ $logistics->no_of_bags }}" />
                                </div>
                            </div>
                            <div class="form-group @error('quantity') has-error @enderror">
                                <label class="col-md-3 control-label">Qty(kg):</label>
                                <div class="col-md-6">
                                    <input type="text" name="quantity" class="form-control" value="{{ $logistics->quantity }}" />
                                </div>
                            </div>
                            <div class="form-group @error('truck_number') has-error @enderror">
                                <label class="col-md-3 control-label">Truck Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="truck_number" class="form-control" value="{{ $logistics->truck_number }}" />
                                </div>
                            </div>
                            <div class="form-group @error('driver_name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_name" class="form-control" value="{{ $logistics->driver_name }}" />
                                </div>
                            </div>

                            <div class="form-group @error('driver_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_phone_number" class="form-control" value="{{ $logistics->driver_phone_number }}" />
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection