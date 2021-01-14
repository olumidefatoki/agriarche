@extends('layouts.master')
@section('title')
Farmer Influencer Pricing | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Farmer Influencer Pricing</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Farmer Influencer Pricing</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('pricing.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Pricing </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Processor</th>
                                    <th>Delivery State</th>
                                    <th>Commodity</th>
                                    <th>Farmer Influencer</th>
                                    <th>Price</th>
                                    <th>Commission</th>
                                    <th>Creation Date</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($pricingList) > 0)
                                @foreach($pricingList as $pricing)
                                <tr>
                                    <td>{{$pricing->processorOrder->processor->name }}</td>
                                    <td>{{$pricing->processorOrder->state->name }}</td>
                                    <td>{{$pricing->processorOrder->commodity->name }}</td>
                                    <td>{{$pricing->aggregator->name}} </td>
                                    <td>&#8358;{{$pricing->price}}</td>
                                    <td>&#8358;{{$pricing->commission}}</td>
                                    <td>{{$pricing->created_at}}</td>
                                    <td nowrap>
                                        <a href="{{ route('pricing.edit',$pricing) }}"
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