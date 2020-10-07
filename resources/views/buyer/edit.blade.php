@extends('layouts.master')
@section('title')
Create Buyer | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li><a href="/buyer">Buyer</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Buyer</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('buyer.update',$buyer->id)}}">
                            @method('PATCH')
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Name:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="name" class="form-control" value="{{ $buyer->name }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('address') has-error @enderror">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" value="{{ $buyer->address }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_first_name') has-error @enderror">
                                <label class="col-md-3 control-label">Contact Person First Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_first_name" class="form-control" value="{{ $buyer->contact_person_first_name}}" required />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_last_name') has-error @enderror">
                                <label class="col-md-3 control-label">Contact Person Last Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_last_name" class="form-control" value="{{ $buyer->contact_person_last_name }}"  />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_email') has-error @enderror">
                                <label class="col-md-3 control-label">Contact Person Email:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_email" class="form-control" value="{{ $buyer->contact_person_email }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Contact Person Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_phone_number" class="form-control" value="{{ $buyer->contact_person_phone_number }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('state') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        @foreach ($states as $state)
                                        <option @if($state->id == $buyer->state_id) selected="selected" @endif value="{{ $state->id }}">
                                            {{ $state->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Update</button>
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