@extends('layouts.master')
@section('title')
Buyer | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Buyer</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Buyer</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('buyer.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Buyer </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                <div class="row">
                        <div class="col-md-3"><input class="form-control input-sm" id="Name" type="text" placeholder="Aggregator" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="Contact Name" /></div>
                        <div class="col-md-3"><input class="form-control input-sm" id="phone_number" type="text" placeholder="State" /></div>

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
                                    <th nowrap>Buyer Name</th>
                                    <th nowrap>Buyer Address</th>
                                    <th nowrap>Contact Person Name</th>
                                    <th nowrap>Phone Number</th>
                                    <th nowrap>Contact Person Email</th>
                                    <th nowrap>State</th>
                                    <th nowrap>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @if(count($buyers) > 0)
                                @foreach($buyers as $buyer)
                                <tr>
                                    <td nowrap>{{$buyer->name}} </td>
                                    <td nowrap>{{$buyer->address}} </td>
                                    <td>{{$buyer->contact_person_first_name}} , {{$buyer->contact_person_last_name }}</td>
                                    <td nowrap>{{$buyer->contact_person_phone_number}}</td>
                                    <td nowrap>{{$buyer->contact_person_email}}</td>
                                    <td nowrap>{{$buyer->state->name}}</td>
                                    <td nowrap><a href="{{ route('buyer.edit',$buyer->id) }}"><i class="fa fa-edit"></i> </a>
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
                    <div>
                        {{$buyers->links()}}
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