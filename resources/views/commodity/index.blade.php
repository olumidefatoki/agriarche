@extends('layouts.master')
@section('title')
Farmer | Agriarche
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Home</a></li>
<li><a href=active>Commodity</a></li>
@endsection

@section('content')
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Commodity</h3>
                    <ul class="panel-controls">
                        <a href="{{ route('commodity.create') }}">
                            <button class="m-0 btn btn-success" style="float:right;">Add New Commodity </button>
                        </a>
                    </ul>
                </div>
                <div class="panel-body">

                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th nowrap>S/N</th>
                                    <th nowrap>Name</th>
                                    <th nowrap>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 0; ?>
                                @forelse($commodities as $commodity)
                                <tr>
                                    <td><?php $sn++;
                                        echo $sn ?></td>
                                    <td>{{$commodity->name }}</td>
                                    <td nowrap><a href="{{ route('commodity.edit',$commodity) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit Delivery">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" style="text-align: center;">
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