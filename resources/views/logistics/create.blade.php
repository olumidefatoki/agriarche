@extends('layouts.master')
@section('title')
Create Pickup | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Pickup </a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Pickup</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('logistics.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('order') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Order </label>
                                <div class="col-md-6">
                                    <select id="formGender" name="order" class="form-control select">
                                        <option selected disabled>Select an Order</option>
                                        @foreach ($processorOrders as $processorOrder)
                                        <option value="{{ $processorOrder->id }}">
                                            {{$processorOrder->processor->name }} >>
                                            {{$processorOrder->state->name }} >>
                                            {{$processorOrder->commodity->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="loading" style="display:none"> <img src="{{ URL::to('img/loaders/ajax-loader.gif') }}" alt="" /> Loading </div>
                            </div>
                            <div class="form-group @error('aggregator') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Aggregator:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator" class="form-control select">

                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Pickup State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        <option selected disabled>Select a State</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('location') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Pick up Location:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('logistics_company') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Logistics Company:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="logistics_company" class="form-control select">
                                        <option selected disabled>Select a Logisitics Company</option>
                                        @foreach ($logisticsCompanies as $logisticsCompany)
                                        <option value="{{ $logisticsCompany->id }}">{{ $logisticsCompany->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('number_of_bags') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Number Of Bags:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="number_of_bags" class="form-control" value="{{ old('number_of_bags') }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('truck_number') has-error @enderror">
                                <label class="col-md-3 control-label">Truck Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="truck_number" class="form-control" value="{{ old('truck_number') }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('driver_name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_name" class="form-control" value="{{ old('driver_name') }}" required />
                                </div>
                            </div>

                            <div class="form-group @error('driver_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_phone_number" class="form-control" value="{{ old('driver_phone_number') }}" required />
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="order"]').on('change', function() {
                $("#loading").css("display", "inline-block");
                var orderId = $(this).val();
                if (orderId) {
                    $.ajax({
                        url: "{{ url('/pricing/aggregator/') }}" + '/' + orderId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="aggregator"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="aggregator"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $("#loading").css("display", "none");
                        }
                    });
                } else {
                    $('select[name="aggregator"]').empty();
                }
            });
        });
    </script>
    @endsection