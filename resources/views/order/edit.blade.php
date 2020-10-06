@extends('layouts.master')
@section('title')
Update Order | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Order</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Aggregator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('order.update',$buyerOrder)}}">
                            @method('PATCH')
                            @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Buyer:</label>
                                <div class="col-md-6">
                                    <select name="buyer" class="form-control select">
                                        @foreach ($buyers as $buyer)
                                        <option @if($buyer->id == $buyerOrder->buyer_id) selected="selected" @endif value="{{ $buyer->id }}">
                                            {{ $buyer->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commodity:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="commodity" class="form-control select">
                                        @foreach ($commodities as $commodity)
                                        <option @if($commodity->id == $buyerOrder->commodity_id) selected="selected" @endif value="{{ $commodity->id }}">
                                            {{ $commodity->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        @foreach ($states as $state)
                                        <option @if($state->id == $buyerOrder->state_id) selected="selected" @endif value="{{ $state->id }}">
                                            {{ $state->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('delivery_location') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Delivery location:</label>
                                <div class="col-md-6">
                                    <input type="text" name="delivery_location" class="form-control" value="{{ $buyerOrder->delivery_location}}" />
                                </div>
                            </div>
                            <div class="form-group @error('quantity') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Quantity:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">MT</span>
                                        <input type="text" name="quantity" class="form-control" value="{{ $buyerOrder->quantity}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group @error('coupon_price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Price:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="coupon_price" class="form-control" value="{{ $buyerOrder->coupon_price}}" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group @error('start_date') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Start Date:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="start_date" class="form-control datepicker" value="{{ $buyerOrder->start_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group @error('end_date') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">End Date:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="end_date" class="form-control datepicker" value="{{ $buyerOrder->end_date}}">
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
    @section('script')
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap-select.js')}}"></script>

    @endsection