@extends('layouts.master')
@section('title')
Infuencer Payment | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li class = "active"><a href="#">Infuencer Payment</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Infuencer Payment</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('aggregatorPayment.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Infuencer Payment </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                <div class="row">
                        <div class="col-md-3"><input class="form-control input-sm" id="Name" type="text" placeholder="Processor" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Farmer Influencer" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Commodity" /></div>

                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-from-sch" type="text" placeholder="Start Date(yyyy-mm-dd)"  onclick="javascript:NewCssCal('date-from-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-to-sch" type="text" placeholder="End Date(yyyy-mm-dd)" onclick="javascript:NewCssCal('date-to-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                        <!-- <div class="col-md-2"><select id="reg_type" name="reg_type" class="form-control"><option value="">Select</option></select></div> -->
                        <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        <!--<div class="col-md-3"><button class="btn btn-default btn-sm form-control input-sm" id="download"><i class="fa fa-download"></i> Download Activated Cards</button></div> -->
                    </div>
                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th nowrap>Logistics Code</th>
                                    <th nowrap>Processor</th>
                                    <th nowrap>Aggregator</th>
                                    <th nowrap>Delivery Point</th>
                                    <th nowrap>Commodity</th>
                                    <th nowrap>Amount</th>
                                    <th nowrap>Quantity Delivered(KG)</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>                             
                                <tr>
                                    <td colspan="9" style="text-align: center;">
                                        No Records Found
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

@section('script')
@endsection