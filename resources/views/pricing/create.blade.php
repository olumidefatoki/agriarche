@extends('layouts.master')
@section('title')
Create Pricing | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Pricing</a></li>
<li class="active">Create</li>
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
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('pricing.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group  @error('order') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Order:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="order" class="form-control select">
                                        @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">
                                            {{$order->processor->name }} >> {{$order->state->name }} >>
                                             {{$order->commodity->name }} >> &#8358; {{$order->price }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('aggregator') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Farmer Influencer :</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator" class="form-control select">
                                        @foreach ($aggregators as $aggregator)
                                        <option value="{{ $aggregator->id }}">
                                            {{ $aggregator->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Price(KG):</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="price" class="form-control" value="{{ old('price')}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group @error('commission') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Commission(KG):</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="commission" class="form-control" value="{{ old('commission')}}" required />
                                    </div>
                                </div>
                            </div>



                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection