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
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Buyer</th>
                                <th>Commodity</th>
                                <th>Qty(MT)</th>
                                <th>Status </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buyerOrders as $buyerOrder)
                            <tr>
                                <td>10000 </td>
                                <td>{{$buyerOrder->buyer->name}} </td>
                                <td>{{$buyerOrder->commodity->name}}</td>
                                <td>{{$buyerOrder->quantity}}</td>
                                <td>Active</td>
                                <td><a href="{{ route('order.show',$buyerOrder) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>
@endsection

@section('script')
@endsection