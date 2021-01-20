@extends('layouts.master')
@section('title')
Farmer Influencer Pricing Detail | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Farmer Influencer Pricing</a></li>
<li class="active">Detail</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Farmer Influencer Pricing</h2>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class=" panel-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>Processor</td>
                                    <td>{{($pricing->processorOrder->processor->name)}}</td>
                                </tr>
                                <tr>
                                    <td>Farmer Influencer</td>
                                    <td>{{($pricing->aggregator->name)}}</td>
                                </tr>
                                <tr>
                                    <td>Commission</td>
                                    <td>&#8358; {{number_format($pricing->commission,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>{{$pricing->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>{{$pricing->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;"> Pricing History</td>
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
                                                <tr>
                                                    <?php $sn = 0; ?>
                                                    @forelse($pricingHistories as $pricingHistory)
                                                <tr>
                                                    <td><?php $sn++;
                                                        echo $sn ?></td>
                                                    <td> {{ $pricingHistory->price }}</td>
                                                    <td>{{ $pricingHistory->created_at }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3" style="text-align: center;">
                                                        No Records Found
                                                    </td>
                                                </tr>
                                                @endforelse
                                </tr>
                                </thead>

                        </table>

                        </td>
                        </tr>

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