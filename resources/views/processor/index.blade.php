@extends('layouts.master')
@section('title')
Processor | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Processor</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Processor</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('processor.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Processor </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="{{ route('processor.index') }}">
                            @csrf
                            <div class="col-md-3"><input class="form-control input-sm" name="name" type="text" placeholder="Processor Name" value="@if(isset($data['name'])) {{ $data['name'] }} @endif" /></div>
                            <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-from-sch" type="text" placeholder="Start Date(yyyy-mm-dd)"  onclick="javascript:NewCssCal('date-from-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                            <!-- <div class="col-md-2 "><input class="form-control input-sm datepicker" id="date-to-sch" type="text" placeholder="End Date(yyyy-mm-dd)" onclick="javascript:NewCssCal('date-to-sch','yyyyMMdd','dropdown',true,'24',true)" /></div> -->
                            <div class="col-md-2"><button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Filter Search</button></div>
                        </form>
                        <div class="col-md-2">
                            <a href="{{ route('processor.index') }}">
                                <button class="btn btn-sm btn-success" id="searchfilter"><i class="fa fa-filter"></i> Clear Filter</button>
                            </a>
                        </div>
                    </div>
                    <br />
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th nowrap>Processor Name</th>
                                    <th nowrap>Processor Address</th>
                                    <th nowrap>Contact Person Name</th>
                                    <th nowrap>Phone Number</th>
                                    <th nowrap>Contact Person Email</th>
                                    <th nowrap>State</th>
                                    <th nowrap>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($processors) > 0)
                                @foreach($processors as $processor)
                                <tr>
                                    <td nowrap>{{$processor->name}} </td>
                                    <td nowrap>{{$processor->address}} </td>
                                    <td>{{$processor->contact_person_first_name}} {{$processor->contact_person_last_name }}</td>
                                    <td nowrap>{{$processor->contact_person_phone_number}}</td>
                                    <td nowrap>{{$processor->contact_person_email}}</td>
                                    <td nowrap>{{$processor->state->name}}</td>
                                    <td nowrap>
                                        <a href="{{ route('processor.edit',$processor->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('processor.show',$processor) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
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
                        {{$processors->appends($data)->links()}}
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