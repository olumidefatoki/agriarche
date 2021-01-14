@extends('layouts.master')
@section('title')
Create Farmer | Agriarche
@endsection

@section('breadcrumb')
<li><a href="">Home</a></li>
<li><a href="#">Farmer</a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Farmer</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('farmer.store')}}">
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">First Name:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Last Name:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
                                </div>
                            </div>
                            
                            <div class="form-group @error('contact_person_phone_number') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Phone Number:</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_person_phone_number" class="form-control" value="{{ old('contact_person_phone_number') }}" required />
                                </div>
                            </div>
                            <div class="form-group @error('address') has-error @enderror">
                                <label class="col-md-3 control-label">Address:</label>
                                <div class="col-md-6">
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}" required />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commodity:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="commodity" class ="form-control select">
                                        @foreach ($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group @error('state') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">State:</label>
                                <div class="col-md-6">
                                    <select id="formGender" name="state" class="form-control select">
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group @error('waybill') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Picture:</label>
                                <div class="col-md-6">
                                    <input name='picture' type="file" multiple id="file-simple" class="form-control" />
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