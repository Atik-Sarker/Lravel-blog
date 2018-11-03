<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>blog</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Name</b>Blog</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top skin-purple">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu skin-purple">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle-o" style="font-size:20px;"></i>
                        <span class="hidden-xs"><i class="fa fa-gears"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <p>{{ Auth::User()->name }}</p>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.password.changes') }}" class="btn btn-primary btn-flat">Changes Password</a>
                            </div>
                            <div class="pull-right">
                                <form id="logout-form" action="{{ route('admin.logout')}}" method="post"  style="display: none">

                                    @csrf
                                </form>
                                <a href="" class="btn btn-primary btn-flat" onclick="
                                         event.preventDefault();
                                         document.getElementById('logout-form').submit()
                                        ">
                                    Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>