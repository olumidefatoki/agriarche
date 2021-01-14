@extends('layouts.master')
@section('title')
Delivery details | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li><a href="/delivery">Delivery</a></li>
<li class="active">Details</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Delivery</h2>
                </div>
                <div class="col-md-11">
                    <div class=" panel-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="40%">Processor</td>
                                    <td>{{$delivery->logistics->processorOrder->processor->name}}</td>
                                </tr>
                                <tr>
                                    <td>Delivery State</td>
                                    <td>{{$delivery->logistics->processorOrder->state->name}}</td>
                                </tr>
                                <tr>
                                    <td>Aggregator</td>
                                    <td>{{$delivery->logistics->aggregator->name}}</td>
                                </tr>
                                <tr>
                                    <td>Commodity</td>
                                    <td>{{$delivery->logistics->processorOrder->commodity->name}}</td>
                                </tr>
                                <tr>
                                    <td>Logistics Company</td>
                                    <td>{{$delivery->logistics->logisticsCompany->name}}</td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_accepted * $delivery->aggregator_price,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Discounted Amount</td>
                                    <td>&#8358; {{number_format(($delivery->discounted_price),2)}}</td>
                                </tr>
                                <tr>
                                    <td>Payable Amount</td>
                                    <td>&#8358; {{number_format($delivery->quantity_of_bags_rejected * $delivery->strike_price,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Quantity Delivered(KG)</td>
                                    <td>{{number_format($delivery->quantity_of_bags_accepted,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Numbers of Bags Rejected</td>
                                    <td>{{number_format($delivery->number_of_bags_rejected)}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$delivery->status->name}}</td>
                                </tr>
                                <tr>
                                    <td>Waybill</td>
                                    <td><img src="data:image/jpeg;base64,{{$delivery->waybill}}" width="200"  /></td>
                                </tr>

                            </tbody>
                        </table>
                        <form>
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger" style="margin:2px" type="submit">Decline</button>
                                <button class="btn btn-success" style="margin:2px" type="submit">Approve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
@endsection