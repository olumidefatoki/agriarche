@extends('layouts.master')
@section('title')
Order Details | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Order</a></li>
<li class="active">Detail</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Order</h2>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class=" panel-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="50%">Code</td>
                                    <td>{{$processorOrder->code}}</td>
                                </tr>
                                <tr>
                                    <td>Buyer Name</td>
                                    <td>{{$processorOrder->processor->name}}</td>
                                </tr>
                                <tr>
                                    <td>Commodity</td>
                                    <td>{{$processorOrder->commodity->name}}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Quantity order</td>
                                    <td>{{number_format($processorOrder->quantity,0)}}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>&#8358;{{number_format($processorOrder->price,2)}}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{$processorOrder->state->name}}</td>
                                </tr>
                                <tr>
                                    <td>Delivery Location</td>
                                    <td>{{$processorOrder->delivery_location}}</td>
                                </tr>
                                <tr>
                                    <td>Start Date</td>
                                    <td>{{$processorOrder->start_date}}</td>
                                </tr>
                                <tr>
                                    <td>End Date</td>
                                    <td>{{$processorOrder->end_date}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>{{$processorOrder->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>{{$processorOrder->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;"> Order History</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th nowrap>S/N</th>
                                                    <th nowrap>Price</th>
                                                    <th>Date</th>

                                                </tr>
                                            </thead>
                                            @if(count($processorOrderHistories) > 0)
                                            <?php $sn = 0; ?>
                                            @foreach($processorOrderHistories as $processorOrderHistory)
                                            <tr>
                                                <td><?php $sn++;
                                                    echo $sn ?></td>
                                                <td> {{ $processorOrderHistory->price }}</td>
                                                <td>{{ $processorOrderHistory->created_at }}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="3" style="text-align: center;">
                                                    No Records Found
                                                </td>
                                            </tr>
                                            @endif
                                        </table>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <row>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">

                        </table>
                    </div>
                </row>

            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
@endsection