@extends('layouts.master')
@section('title')
Order | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Order</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Order</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('order.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Order </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th nowrap>Code</th>
                                    <th nowrap>Buyer</th>
                                    <th nowrap>Commodity</th>
                                    <th nowrap>Coupon Price </th>
                                    <th nowrap>Order Qty(MT)</th>
                                    <th nowrap>State</th>
                                    <th nowrap>Delivery Location</th>                                   
                                    <th nowrap>Start Date</th>
                                    <th nowrap>End Date</th>
                                    <th nowrap>Creation Date</th>
                                    <th nowrap >Last Updated Date</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($buyerOrders) > 0)
                                @foreach($buyerOrders as $buyerOrder)
                                <tr>
                                    <td nowrap>{{$buyerOrder->code}} </td>
                                    <td nowrap>{{$buyerOrder->buyer->name}} </td>
                                    <td nowrap>{{$buyerOrder->commodity->name}}</td>
                                    <td nowrap>&#8358;{{number_format($buyerOrder->coupon_price)}}</td>
                                    <td nowrap>{{number_format($buyerOrder->quantity,2)}}</td>
                                    <td nowrap>{{$buyerOrder->state->name}}</td>
                                    <td >{{$buyerOrder->delivery_location}}</td>
                                    <td nowrap>{{$buyerOrder->start_date}}</td>
                                    <td nowrap>{{$buyerOrder->end_date}}</td>
                                    <td >{{$buyerOrder->created_at}}</td>
                                    <td >{{$buyerOrder->updated_at}}</td>
                                    <td nowrap><a href="{{ route('order.edit',$buyerOrder) }}" class="btn btn-sm btn-info" 
                                        data-toggle="tooltip" data-placement="top" title="Edit Order">
                                            <i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
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