@extends('layouts.master')
@section('title')
Agriarche Dashboard
@endsection
@section('breadcrumb')
<a href="#">Dashboard</a>
<a href="#" class="x-navigation-control"></a>
@endsection

@section('content')
<div class="page-content-wrap">
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">Truck Dispatch Yesterday</div>
                        <div class="widget-int" id='truck-dispatch-yesterday'>0</div>
                    </div>
                    <div>
                        <div class="widget-title">Truck Dispatch This Week</div>
                        <div class="widget-int" id='truck-dispatch-this-week'>0</div>
                    </div>
                    <div>
                        <div class="widget-title">Truck Dispatch This Month</div>
                        <div class="widget-int" id='truck-dispatch-this-month'>0</div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count" id='processor-count'></div>
                    <div class="widget-title">Total Processor</div>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count" id='influencer-count'></div>
                    <div class="widget-title">Total Influencer</div>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count" id='logistics-count'></div>
                    <div class="widget-title">Total Logistics Company</div>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <div class='panel panel-yellow'>
                <div class='panel-heading'>
                    <h3 class='panel-title'> Number of Trucks Delivered</h3>
                </div>
                <div class='panel-body'>
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Yesterday</h3>
                            </div>
                            <div class="panel-body">
                                <div class='widget-data' id='truck-delivered-yesterday'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Week</h3>
                            </div>
                            <div class="panel-body">
                                <div class='huge' id='truck-delivered-this-week'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Month</h3>
                            </div>
                            <div class="panel-body">
                                <div class='widget-int num-count' id='truck-delivered-this-month'></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <div class='panel panel-yellow'>
                <div class='panel-heading'>
                    <h3 class='panel-title'> Volume of Commodity Delivered</h3>
                </div>
                <div class='panel-body'>
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Yesterday</h3>
                            </div>
                            <div class="panel-body">
                                <div class='huge' id='volume-delivered-yesterday'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Week</h3>
                            </div>
                            <div class="panel-body">
                                <div class='huge' id='volume-delivered-this-week'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Month</h3>
                            </div>
                            <div class="panel-body">
                                <div class='widget-int num-count' id='volume-delivered-this-month'></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <div class='panel panel-yellow'>
                <div class='panel-heading'>
                    <h3 class='panel-title'> Value of Commodity Delivered</h3>
                </div>
                <div class='panel-body'>
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Yesterday</h3>
                            </div>
                            <div class="panel-body">
                                <div class='huge' id='value-delivered-yesterday'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Week</h3>
                            </div>
                            <div class="panel-body">
                                <div class='huge' id='value-delivered-this-week'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">This Month</h3>
                            </div>
                            <div class="panel-body">
                                <div class='widget-int num-count' id='value-delivered-this-month'></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WIDGETS -->
    <!-- START DASHBOARD CHART -->
    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
    <div class="block-full-width">

    </div>
    <!-- END DASHBOARD CHART -->

</div>
@endsection

@section('script')
<script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>


@endsection
@section('dashboardscript')
<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: "{{ url('/dashboardReport/') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);
                $.each(data.generic, function(i, dat) {
                    console.log(dat);
                    $('#processor-count').html(dat.no_of_processor);
                    $('#influencer-count').html(dat.no_of_influencer);
                    $('#logistics-count').html(dat.no_of_logCom);
                    $('#truck-dispatch-yesterday').html(dat.dispatch_truck_yesterday);
                    $('#truck-dispatch-this-week').html(dat.dispatch_truck_week);
                    $('#truck-dispatch-this-month').html(dat.dispatch_truck_month);
                    $('#truck-delivered-yesterday').html(dat.delivered_truck_yesterday);
                    $('#truck-delivered-this-week').html(dat.delivered_truck_week);
                    $('#truck-delivered-this-month').html(dat.delivered_truck_month);
                    $('#volume-delivered-yesterday').html(dat.delivered_volume_yesterday);
                    $('#volume-delivered-this-week').html(dat.delivered_volume_week);
                    $('#volume-delivered-this-month').html(dat.delivered_volume_month);
                    $('#value-delivered-yesterday').html(dat.delivered_value_yesterday);
                    $('#value-delivered-this-week').html(dat.delivered_value_week);
                    $('#value-delivered-this-month').html(dat.delivered_value_month);
                });
            }
        });

    });
</script>
@endsection