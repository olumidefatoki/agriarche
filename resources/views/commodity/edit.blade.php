@extends('layouts.master')
@section('title')
Create Commodity | Agriarche
@endsection

@section('breadcrumb')
<li><a href="/">Home</a></li>
<li><a href="/commodity">Commodity</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Commodity</strong></h3>

                    </div>
                    <div class="panel-body">
                        <form id="validate" role="form" class="form-horizontal" method="post" action="{{ route('commodity.update',$commodity->id)}}">
                            @method('PATCH')
                            @csrf
                            @include('partials.error')
                            <div class="form-group @error('name') has-error has-feedback @enderror">
                                <label class="col-md-3 control-label">Name:</label>
                                <div class="col-md-6 ">
                                    <input type="text" name="name" class="form-control" value="{{ $commodity->name }}" required />
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