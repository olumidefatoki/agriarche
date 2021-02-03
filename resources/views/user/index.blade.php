@extends('layouts.master')
@section('title')
User | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>User</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">User</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('user.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Farmer </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">

                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th nowrap>Name</th>
                                    <th nowrap>Email</th>
                                    <th nowrap>Department</th>
                                    <th nowrap>Phone Number</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($users as $user)
                                <tr>
                                    <td>{{$user->name }}</td>
                                    <td>{{$user->email }}</td>
                                    <td>{{$user->department->name }}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td nowrap>
                                        <a href="{{ route('user.edit',$user) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit pricing">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endforelse
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