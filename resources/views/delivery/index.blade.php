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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Buyer</th>
                                <th>Aggregator</th>
                                <th>Delivery Point</th>
                                <th>Commodity</th>
                                <th>Truck No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($deliveries) > 0)
                            @foreach($deliveries as $delivery)
                            <tr>
                                <td></td>
                                <td>hi</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="{{ route('delivery.show',$delivery) }}"><i class="fa fa-plus-circle"></i> VIEW MORE </a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    No Records Found
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
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