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