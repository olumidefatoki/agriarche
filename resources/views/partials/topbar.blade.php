<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="{{ route('logout') }}" class="mb-control" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                    </form>
                    </li>
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><i class="glyphicon glyphicon-user"></i></a>
                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"> {{ Auth::user()->name }}</a>                        
                    </li>
                    <!-- END TASKS -->
                </ul>