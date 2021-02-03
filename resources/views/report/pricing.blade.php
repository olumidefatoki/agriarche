@extends('layouts.master')
@section('title')
Report | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Report</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Report</h3>
                </div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Commodity</th>
                                    <th>Processor</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pricingReports) > 0)
                                <?php $sn = 0; ?>
                                @foreach($pricingReports as $pricingReport)
                                <tr>
                                    <td><?php $sn++;
                                        echo $sn ?></td>
                                    <td nowrap>{{$pricingReport->commodity}} </td>
                                    <td nowrap>{{$pricingReport->processor}} </td>
                                    <td nowrap>&#8358;{{$pricingReport->price}} </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" style="text-align: center;">
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