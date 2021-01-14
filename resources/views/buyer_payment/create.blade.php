@extends('layouts.master')
@section('title')
Create Infuencer Payment | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Infuencer Payment </a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Infuencer Payment</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ route('delivery.store')}}" enctype="multipart/form-data">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('logistics') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">TruckNO</label>
                                <div class="col-md-6">
                                    <select class="form-control select" name="logistics">
                                    <option> Select an Truck No</option>
                                        @foreach ($deliveries as $delivery)
                                        <option value="{{ $delivery->id }}"> {{$delivery->logistics->truck_number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="loading" style="display:none"> <img src="{{ URL::to('img/loaders/ajax-loader.gif') }}" alt=""/> Loading </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Processor:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="processor" class="form-control" id="processor" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Aggregator</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="aggregator" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commodity</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="commodity" class="form-control" disabled />
                                </div>
                            </div>                           
                            <div class="form-group @error('discounted_price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Influencer Amount:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="discounted_price" class="form-control" value="{{ old('discounted_price') }}" />
                                </div>
                            </div>
                            <div class="form-group @error('quantity_of_bags_accepted') has-error @enderror">
                                <label class="col-md-3 control-label">Quantity(kg):</label>
                                <div class="col-md-6">
                                    <input type="text" name="quantity_of_bags_accepted" class="form-control" value="{{ old('quantity_of_bags_accepted') }}" />
                                </div>
                            </div>
                            <div class="form-group @error('number_of_bags_rejected') has-error @enderror">
                                <label class="col-md-3 control-label">Amount:</label>
                                <div class="col-md-6">
                                    <input type="text" name="number_of_bags_rejected" class="form-control" value="{{ old('number_of_bags_rejected') }}" />
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
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/fileinput/fileinput.min.js')}}"></script>

    
    @endsection