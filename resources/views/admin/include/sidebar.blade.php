<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left">
                <h3 class="text-bold"></h3>
            </div>
            <div class="pull-left info">
                <p></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('post.index')}}"><i class="fa fa-circle-o"></i> Post</a></li>
                    @can('post.category', Auth::User())
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
                    @endcan
                    @can('post.tag', Auth::User())
                    <li><a href="{{route('tag.index')}}"><i class="fa fa-circle-o"></i> Tag</a></li>
                    @endcan
                    @if(Auth::User()->id == 1)
                        <li><a href="{{route('role.index')}}"><i class="fa fa-circle-o"></i> Role</a></li>
                        <li><a href="{{route('permission.index')}}"><i class="fa fa-circle-o"></i> Permission </a></li>
                        <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> Users</a></li>
                    @endif
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i>Changes Social link </a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Logo & Banner Setting </a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>