<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="" id="logo" /></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="" id="logo" /> <b>Postal Exam</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @if(Auth::check())
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/assets/img/user.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->first}} {{Auth::user()->last}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/assets/img/user.png" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->first }}
                                    <small>Member since {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ URL::to('advertisers/profile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-left">
                                    <a href="{{ URL::to('users/changepassword') }}" class="btn btn-default btn-flat">Password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{URL::to('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li class="hidden">
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        @endif
    </nav>
</header>