@extends('layouts.master')
@section('title')
Create Logistics  | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Logistics </a></li>
<li class="active">Create</li>
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
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('logistics.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order </label>
                                <div class="col-md-6">
                                    <select id="formGender" name="order_id" class ="form-control select">
                                    @foreach ($buyerOrders as $buyerOrder)
                                        <option value="{{ $buyerOrder->id }}">
                                            {{$buyerOrder->buyer->name }} >> {{$buyerOrder->state->name }} >> {{$buyerOrder->commodity->name }} 
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('aggregator_id') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Aggregator:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="aggregator_id" class ="form-control select">
                                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logistics Company:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="logistics_company_id" class ="form-control select">
                                    @foreach ($logisticsCompanies as $logisticsCompany)
                                        <option value="{{ $logisticsCompany->id }}">{{ $logisticsCompany->name }}</option>
                                        @endforeach   
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('number_of_bags') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Number Of Bags:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="number_of_bags" class="form-control" value= "{{ old('number_of_bags') }}"  />
                                </div>
                            </div>
                            <div class="form-group @error('quantity') has-error @enderror">
                                <label class="col-md-3 control-label">Qty(kg):</label>
                                <div class="col-md-6">
                                <input type="text" name="quantity" class="form-control" value= "{{ old('quantity') }}"   />
                                </div>
                            </div>
                            <div class="form-group @error('truck_number') has-error @enderror">
                                <label class="col-md-3 control-label">Truck Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="truck_number" class="form-control" value= "{{ old('truck_number') }}"   />
                                </div>
                            </div>
                            <div class="form-group @error('driver_name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_name" class="form-control" value= "{{ old('driver_name') }}"  />
                                </div>
                            </div>
                            
                            <div class="form-group @error('driver_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Truck Driver Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="driver_phone_number" class="form-control" value= "{{ old('driver_phone_number') }}"  />
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
        $('select[name="order_id"]').on('change', function() {
            var orderId = $(this).val();
           if(orderId) {
                $.ajax({
                    url: '{{ url('/mapping/aggregator/') }}'+'/' + orderId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="aggregator_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="aggregator_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="aggregator_id"]').empty();
            }
        });
    });
</script>
    @endsection