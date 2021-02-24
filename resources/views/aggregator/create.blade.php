@extends('layouts.master')
@section('title')
Aggregator index | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Aggregator</a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Farmer Influencer</strong></h3>
                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('aggregator.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                </div>
                            </div>
                            <div class="form-group @error('address') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" required autocomplete="address" autofocus />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Contact Person First Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_name" class="form-control" value="{{ old('contact_person_name') }}" required autocomplete="contact_person_first_name" autofocus />
                                </div>
                            </div>

                            <div class="form-group @error('contact_person_email') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Contact Person Email:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_email" class="form-control" value="{{ old('contact_person_email') }}" />
                                </div>
                            </div>
                            <div class="form-group @error('contact_person_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Contact Person Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_phone_number" class="form-control" value="{{ old('contact_person_phone_number') }}" required autocomplete="contact_person_phone_number" autofocus />
                                </div>
                            </div>
                            <div class="form-group @error('state') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        <option selected disabled>Select a State</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('bvn') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">bvn:</label>
                                <div class="col-md-6">
                                    <input type="text" name="bvn" class="form-control" value="{{ old('bvn') }}" autocomplete="contact_person_first_name" autofocus />
                                </div>
                            </div>
                            <div class="form-group @error('kyc_passort') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">KYC Passort:</label>
                                <div class="col-md-6">
                                    <input name='kyc_passort' type="file" multiple id="file-simple" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group @error('kyc_agreement') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">KYC Agrement:</label>
                                <div class="col-md-6">
                                    <input name='kyc_agreement' type="file" multiple id="file-simple" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group @error('bank') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Bank:</label>
                                <div class="col-md-6">
                                    <select class="form-control select" name="bank" id="formGender">
                                        <option selected disabled>Select a Bank</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('account_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Account Number:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="account_number" value="{{ old('account_number')}}" required autocomplete="account_number" autofocus />
                                </div>
                            </div>
                            <div class="form-group @error('account_name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Account Name:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="account_name" value="{{ old('account_name') }}" required autocomplete="account_name" autofocus />
                                </div>
                            </div>

                            <div class="btn-group pull-right">
                                <button class="btn btn-success" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection