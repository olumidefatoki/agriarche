<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::to('css/theme-blue.css') }}"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body class="">
        <!-- START PAGE CONTAINEcontentR -->
        <div class="page-container page-navigation-top-fixed">

            <!-- START PAGE SIDEBAR -->
            @include('partials.sidebar')
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                @include('partials.topbar')
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                @yield('breadcrumb')
                </ul>
                <!-- END BREADCRUMB -->
                @yield('content')
                <!-- PAGE CONTENT WRAPPER -->
                
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        @include('partials.logout')
        <!-- END MESSAGE BOX-->

       
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src="{{ URL::to('js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

        @yield('script')
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->

        <script type="text/javascript" src="{{ URL::to('js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{ URL::to('js/actions.js')}}"></script>
        @yield('dashboardscript')
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>
