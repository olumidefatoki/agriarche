@extends('layouts.master')
@section('title')
Mapping | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Mapping</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Mapping</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('mapping.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Mapping </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Buyer Name</th>
                                    <th>Delivery State</th>
                                    <th>Commodity</th>
                                    <th>Aggregator Name</th>
                                    <th>Coupon Price</th>
                                    <th>Strike Price(NGN)</th>
                                    <th>Creation Date</th>
                                    <th>Last Updated Date</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($orderMappings) > 0)
                                @foreach($orderMappings as $orderMapping)
                                <tr>
                                    <td>{{$orderMapping->buyerOrder->buyer->name }}</td>
                                    <td>{{$orderMapping->buyerOrder->state->name }}</td>
                                    <td>{{$orderMapping->buyerOrder->commodity->name }}</td>
                                    <td>{{$orderMapping->aggregator->name}} </td>
                                    <td>&#8358;{{$orderMapping->buyerOrder->coupon_price}}</td>
                                    <td>&#8358;{{$orderMapping->strike_price}}</td>
                                    <td>{{$orderMapping->created_at}}</td>
                                    <td>{{$orderMapping->updated_at}}</td>
                                    <td nowrap>
                                        <a href="{{ route('mapping.edit',$orderMapping) }}"
                                        class="btn btn-sm btn-info" 
                                        data-toggle="tooltip" data-placement="top" title="Edit Order">
                                            <i class="fa fa-edit"></i>
                                        </a>
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