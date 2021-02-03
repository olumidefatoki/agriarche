@extends('layouts.master')
@section('title')
Create Farmer | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">User</a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ __('Register') }}</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') is-invalid @enderror">
                                <label class="col-md-3 control-label">{{ __('Name') }}</label>
                                <div class="col-md-6 ">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                </div>
                            </div>
                            <div class="form-group @error('name') is-invalid @enderror">
                                <label class="col-md-3 control-label">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6 ">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>
                            <div class="form-group @error('department') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Department :</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="department" class="form-control select">
                                        <option selected disabled>Select a Department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('phone_number') is-invalid @enderror">
                                <label class="col-md-3 control-label">{{ __('Phone Number') }}</label>
                                <div class="col-md-6 ">
                                    <input id="name" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="name" autofocus>

                                </div>
                            </div>




                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection


    @section('script')
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
    @endsection