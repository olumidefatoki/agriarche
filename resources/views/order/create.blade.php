@extends('layouts.master')
@section('title')
Create Order | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Order</a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('order.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Processor:</label>
                                <div class="col-md-6">
                                    <select name="processor" class="form-control select">
                                        <option selected disabled>Select a Processor</option>
                                        @foreach ($processors as $processor)
                                        <option value="{{ $processor->id }}">{{ $processor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commodity:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="commodity" class="form-control select">
                                        <option selected disabled>Select a Commodity</option>
                                        @foreach ($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        <option selected disabled>Select a State</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('delivery_location') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Delivery location:</label>
                                <div class="col-md-6">
                                    <input type="text" name="delivery_location" class="form-control" value="{{ old('delivery_location')}}" required />
                                </div>
                            </div>
                            <div class="form-group @error('quantity') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Quantity:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">MT</span>
                                        <input type="text" name="quantity" class="form-control" value="{{ old('quantity')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Payment Term:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="payment_term" class="form-control select">
                                        @foreach ($paymentTerms as $paymentTerm)
                                        <option value="{{ $paymentTerm->id }}">{{ $paymentTerm->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Price:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">&#8358;</span>
                                        <input type="text" name="price" class="form-control" value="{{ old('price')}}" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group @error('start_date') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Start Date:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="start_date" class="form-control datepicker" value="{{ old('start_date')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group @error('end_date') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">End Date:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="end_date" class="form-control datepicker" value="{{ old('end_date')}}" required>
                                    </div>
                                </div>
                            </div>



                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Submit</button>
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