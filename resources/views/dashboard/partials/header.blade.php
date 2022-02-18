<!-- Logo -->
<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>WS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>PWS</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{-- <img src="{{ asset('dashboard-assets/dist/img/user2-160x160.jpg') }}" class="user-image"
                        alt="User Image"> --}}
                    <span class="hidden-xs">{{ ucfirst(auth()->user()->name) }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header" style="height: 50px; line-height: 15px;">
                        {{-- <img src="{{ asset('dashboard-assets/dist/img/user2-160x160.jpg') }}" class="img-circle"
                            alt="User Image"> --}}

                        <p>{{ ucfirst(auth()->user()->name) }}</p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('profile.show')}}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-admin').submit();" class="btn btn-default btn-flat">Sign out</a>
                            <form id="logout-admin" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            {{-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> --}}
        </ul>
    </div>
</nav>
