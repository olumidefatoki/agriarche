<div class="page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide scroll page-sidebar-fixed">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="#">Agriarche</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        </li>
        <li class="xn-title"></li>
        <li>
        <li><a href="{{route('dashboard') }}"><span class="fa fa-dashboard"></span>Dashboard </a></li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Partner</span></a>
            <ul>
                <li><a href="{{ route('processor.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Processor</span></a></li>
                <li><a href="{{ route('aggregator.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Farmer Influencer</span></a></li>
                <li><a href="{{route('logisticsCompany.index') }}"><span class="fa fa-truck"></span>Logistics Company</a></li>
                <li><a href="{{ route('farmer.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Farmer</span></a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Order</span></a>
            <ul>
                <li><a href="{{ route('order.index') }}"><span class="fa fa-shopping-cart"></span>Processor Order</a></li>
                <li><a href="{{ route('pricing.index') }}"><span class="fa fa-sitemap"></span>Farmer Influencer Pricing</a></li>
            </ul>
        </li>
        <li>
        <li><a href="{{route('logistics.index') }}"><span class="fa fa-road"></span>Pickup </a></li>
        </li>
        <li>
            <a href="{{route('delivery.index') }}"><span class="glyphicon glyphicon-home"></span> <span class="xn-text">Delivery</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-money"></span> <span class="xn-text">Payment</span></a>
            <ul>
                <li><a href="{{ route('aggregatorPayment.index') }}"><span class="fa fa-money"></span></span>Influencer Payment</a></li>
                <!-- <li><a href="{{ route('aggregatorPayment.index') }}"><span class="fa fa-sitemap"></span>Buyer Payment</a></li>
                <li><a href="{{ route('aggregatorPayment.index') }}"><span class="fa fa-sitemap"></span>Other Payment</a></li> -->
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-bar-chart-o"></span><span class="xn-text">Report</span></a>
            <ul>
                <!-- <li><a href="#"><span class="fa fa-bar-chart-o"></span>General</a></li> -->
                <li><a href="{{ url('/report') }}"><span class="fa fa-bar-chart-o"></span>Pricing</a></li>
                <!-- <li><a href="#"><span class="fa fa-bar-chart-o"></span>Pickup</a></li> -->
                <!-- <li><a href="#"><span class="fa fa-bar-chart-o"></span>Payment</a></li> -->
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-gear"></span><span class="xn-text">Settings</span></a>
            <ul>
                <li><a href="{{ url('/commodity') }}"><span class="glyphicon glyphicon-leaf"></span></span>Commodity</a></li>
                <li><a href="{{ url('/user') }}"><span class="fa fa-user"></span>
                        Users</a></li>
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>