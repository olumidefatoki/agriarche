@extends('layouts.master')
@section('title')
Update  Farmer Influencer Pricing | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Farmer Influencer Pricing</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Pricing</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('pricing.update',$pricing)}}">
                        @method('PATCH')   
                        @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="order" class ="form-control select">
                                        <option value="{{ $pricing->processorOrder->id }}">
                                            {{$pricing->processorOrder->processor->name }} >> 
                                            {{$pricing->processorOrder->state->name }} >> 
                                            {{$pricing->processorOrder->commodity->name }} >>
                                             &#8358; {{$pricing->processorOrder->price }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Aggregator:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator" class ="form-control select">
                                        <option value="{{ $pricing->aggregator_id }}">{{$pricing->aggregator->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Price(KG):</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="price" class="form-control" value="{{ $pricing->price}}" required />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group @error('commission') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Commission:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="commission" class="form-control" value="{{ $pricing->commission}}" required />
                                    </div>
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