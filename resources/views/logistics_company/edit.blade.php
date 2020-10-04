@extends('layouts.master')
@section('title')
Update Logistics company | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Logistics company</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Logistics company</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('logisticsCompany.update',$logisticsCompany)}}">
                        @method('PATCH')
                        @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Company Name:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="name" class="form-control" value= "{{ $logisticsCompany->name }}"  />
                                </div>
                            </div>
                            <div class="form-group @error('address') has-error @enderror">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" rows="3" value= "{{ $logisticsCompany->address }}" />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_name') has-error @enderror">
                                <label class="col-md-3 control-label">Contact Person  Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_name" class="form-control" value= "{{ $logisticsCompany->contact_person_name }}"   />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Contact Person Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_phone_number" class="form-control" value= "{{ $logisticsCompany->contact_person_phone_number }}"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state_id" class ="form-control select">
                                        @foreach ($states as $state)
                                        <option @if($state->id == $logisticsCompany->state_id) selected="selected" @endif  value="{{ $state->id }}">
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