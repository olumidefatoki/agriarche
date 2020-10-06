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
                    <!-- <li>
                        <a href="/"><span class="fa fa-tachometer"></span> <span class="xn-text">Dashboard</span></a>
                    </li> -->
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Partner</span></a>
                        <ul>                            
                            <li><a href="{{ route('buyer.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Buyer</span></a></li>
                            <li><a href="{{ route('aggregator.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Aggregator</span></a></li>
                            <li><a href="{{route('logisticsCompany.index') }}"><span class="fa fa-users"></span>Logistics Company</a></li>

                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Order</span></a>
                        <ul>                            
                            <li><a href="{{ route('order.index') }}"><span class="fa fa-shopping-cart"></span>Buyer Order</a></li>
                            <li><a href="{{ route('mapping.index') }}"><span class="fa fa-sitemap"></span>Order Mapping</a></li>
                        </ul>
                    </li>
                    <li>
                            <li><a href="{{route('logistics.index') }}"><span class="fa fa-road"></span>Logistics </a></li>
                        
                    </li>
                    <li>
                        <a href="{{route('delivery.index') }}"><span class="glyphicon glyphicon-home"></span> <span class="xn-text">Delivery</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Report</span></a>
                    </li>                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>