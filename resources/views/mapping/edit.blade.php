@extends('layouts.master')
@section('title')
Update  Mapping | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Order Mapping</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order Mapping</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('mapping.update',$orderMapping)}}">
                        @method('PATCH')   
                        @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="buyer_order_id" class ="form-control select">
                                        <option value="{{ $orderMapping->buyerOrder->id }}">
                                            {{$orderMapping->buyerOrder->buyer->name }} >> 
                                            {{$orderMapping->buyerOrder->state->name }} >> 
                                            {{$orderMapping->buyerOrder->commodity->name }} >>
                                             {{$orderMapping->buyerOrder->price }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Aggregator:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator_id" class ="form-control select">
                                        <option value="{{ $orderMapping->aggregator_id }}">{{$orderMapping->aggregator->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('strike_price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Price(KG):</label>
                                <div class="col-md-6">
                                    <input type="text" name="strike_price" class="form-control" value="{{$orderMapping->strike_price}}" />
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