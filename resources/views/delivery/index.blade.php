@extends('layouts.master')
@section('title')
Logistics | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Logistics</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Logistics</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('delivery.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Delivery </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th nowrap>Logistics Code</th>
                                    <th nowrap>Buyer</th>
                                    <th nowrap>Aggregator</th>
                                    <th nowrap>Delivery Point</th>
                                    <th nowrap>Commodity</th>
                                    <th nowrap>Total Amount</th>
                                    <th nowrap>Payable Amount</th>
                                    <th nowrap>Quantity Delivered(KG)</th>
                                    <th nowrap>Status</th>
                                    <th  nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($deliveries) > 0)
                                @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->logistics->code}}</td>
                                    <td>{{$delivery->logistics->buyerOrder->buyer->name}}</td>
                                    <td>{{$delivery->logistics->aggregator->name}}</td>
                                    <td>{{$delivery->logistics->buyerOrder->state->name}}</td>
                                    <td>{{$delivery->logistics->buyerOrder->commodity->name}}</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_accepted * $delivery->strike_price,2)}}</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_accepted * ($delivery->strike_price - $delivery->discounted_price),2)}}</td>
                                    <td>{{number_format($delivery->quantity_of_bags_accepted,2)}}</td>
                                    
                                    <td>{{$delivery->status->name}}</td>
                                    <td   nowrap><a href="{{ route('delivery.edit',$delivery) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit Delivery">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delivery.show',$delivery) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Open Delivery">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{$deliveries->links()}}
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>
@endsection

@section('script')
@endsection