@extends('layouts.master')
@section('title')
Create Delivery | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Delivery </a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Delivery</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ route('delivery.store')}}" enctype="multipart/form-data">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('logistics') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Code</label>
                                <div class="col-md-6">
                                    <select class="form-control select" name="logistics">
                                        <option selected disabled>Select a Code</option>
                                        @foreach ($logistics as $logistic)
                                        <option value="{{ $logistic->id }}">{{ $logistic->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="loading" style="display:none"> <img src="{{ URL::to('img/loaders/ajax-loader.gif') }}" alt="" /> Loading </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Processor:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="processor" class="form-control" id="processor" disabled />
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
                            <div class="form-group">
                                <label class="col-md-3 control-label">Delivery State</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="delivery_state" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logistics Company</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="logistics_company" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Truck No:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="truck_number" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="form-group @error('discounted_price') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Discounted Price:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="discounted_price" class="form-control" value="{{ old('discounted_price') }}" />
                                </div>
                            </div>
                            <div class="form-group @error('quantity_of_bags_accepted') has-error @enderror">
                                <label class="col-md-3 control-label">Qty Of Bags Accepted(kg):</label>
                                <div class="col-md-6">
                                    <input type="text" name="quantity_of_bags_accepted" class="form-control" value="{{ old('quantity_of_bags_accepted') }}" />
                                </div>
                            </div>
                            <div class="form-group @error('number_of_bags_rejected') has-error @enderror">
                                <label class="col-md-3 control-label">Number Of Bags Rejected:</label>
                                <div class="col-md-6">
                                    <input type="text" name="number_of_bags_rejected" class="form-control" value="{{ old('number_of_bags_rejected') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">status</label>
                                <div class="col-md-6">
                                    <select class="form-control select" name="status">
                                        <option selected disabled>Select a Status</option>
                                        @foreach ($status as $sta)
                                        <option value="{{ $sta->id }}">{{ $sta->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group @error('waybill') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Waybill:</label>
                                <div class="col-md-6">
                                    <input name='waybill' type="file" multiple id="file-simple" class="form-control" />
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

    <script>
        $(function() {
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="logistics"]').on('change', function() {
                $("#loading").css("display", "inline-block");
                var logisticsId = $(this).val();
                if (logisticsId) {
                    $.ajax({
                        url: "{{ url('/logistics/order/') }}" + '/' + logisticsId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="aggregator_id"]').empty();
                            $('input[name="processor"]').val(data.processor);
                            $('input[name="commodity"]').val(data.commodity);
                            $('input[name="aggregator"]').val(data.aggregator);
                            $('input[name="truck_number"]').val(data.truck_number);
                            $('input[name="truck_quantity"]').val(data.truck_quantity);
                            $('input[name="delivery_state"]').val(data.state);
                            $('input[name="logistics_company"]').val(data.logistics_company);
                            $("#loading").css("display", "none");
                        }
                    });
                }

            });
            $('select[name="status"]').on('change', function() {
                var status = $(this).val();
                if (status == 10) {
                    $("#hidden").css("display", "block");
                }
            });

        });
    </script>
    @endsection