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
                        <form class="form-horizontal" method="post" action="{{ route('aggregatorPayment.store')}}" enctype="multipart/form-data">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('logistics') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Farmer Influencer</label>
                                <div class="col-md-6">
                                    <select class="form-control select" name="logistics">
                                        <option> Select an Delivery </option>
                                        @foreach ($deliveries as $delivery)
                                        <option value="{{ $delivery->id }}">
                                            {{$delivery->name}} >>
                                            {{$delivery->code}} >>
                                            {{$delivery->truck_number}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="loading" style="display:none"> <img src="{{ URL::to('img/loaders/ajax-loader.gif') }}" alt="" /> Loading </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commodity:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="amount" class="form-control" id="amount" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Quanity:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="quantity" class="form-control" id="amount" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Amount:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="amount" class="form-control" id="amount" disabled />
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