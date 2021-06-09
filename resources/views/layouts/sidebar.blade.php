<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li >
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Enquiries</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('enquiry.add') }}"><i class="fa fa-list"></i> Add Enquiry</a></li>
                    <li><a href="{{ route('enquiry.all') }}"><i class="fa fa-list"></i> All Enquiries</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i>
                    <span>Manage Cars</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('car.add_model') }}"><i class="fa fa-car"></i> Add Car Model</a></li>
                    <li><a href="{{ route('car.all_car_models') }}"><i class="fa fa-car"></i> All Car Models</a></li>
                    <li><a href="{{ route('car.add') }}"><i class="fa fa-address-book"></i> Add Car</a></li>
                    <li><a href="{{ route('car.all_cars') }}"><i class="fa fa-address-book"></i> All Cars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i>
                    <span>Manage Gallery</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('car.add_gallery') }}"><i class="fa fa-photo"></i> Add Car Gallery</a></li>
                    <li><a href="{{ route('car.all_galleries') }}"><i class="fa fa-image"></i> All Car Galleries</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('duration.add_duration') }}"><i class="fa fa-clock-o"></i> Add hire duration</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>User Model</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.add') }}"><i class="fa fa-clock-o"></i> Add User</a></li>
                    <li><a href="{{ route('user.all') }}"><i class="fa fa-clock-o"></i> All Users</a></li>
                </ul>
            </li>
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-book"></i>--}}
{{--                    <span> Minutes</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    @if(Auth::user()->can('add-minutes'))--}}
{{--                        <li><a href="{{ route('minutes') }}"><i class="fa fa-bookmark"></i> Add Minutes</a></li>--}}
{{--                    @endif--}}
{{--                    <li><a href="{{ route('all.minutes') }}"><i class="fa fa-bookmark-o"></i> All Minutes</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            @if(Auth::user()->can('add-permissions'))--}}
{{--                <li class="treeview">--}}
{{--                    <a href="#">--}}
{{--                        <i class="fa fa-lock"></i>--}}
{{--                        <span>Manage Permissions</span>--}}
{{--                        <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                    </a>--}}
{{--                    <ul class="treeview-menu">--}}
{{--                        <li><a href="{{ route('member.permission') }}"><i class="fa fa-key"></i> Give Permissions</a></li>--}}
{{--                        <li><a href="{{ route('all.permissions') }}"><i class="fa fa-unlock-alt"></i> All Permission</a></li>--}}
{{--                        <li><a href="{{ route('register.permission') }}"><i class="fa fa-unlock"></i> Add Permission</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endif--}}


{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-file-image-o"></i>--}}
{{--                    <span> Gallery</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    @if(Auth::user()->can('add-gallery'))--}}
{{--                        <li><a href="{{ route('gallery') }}"><i class="fa fa-bookmark"></i> Add Images</a></li>--}}
{{--                    @endif--}}
{{--                    <li><a href="{{ route('all.photos') }}"><i class="fa fa-image"></i> View Gallery</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}



{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    @if(Auth::user()->can('add-contributions'))--}}
{{--                        <i class="fa fa-money"></i> <span>Manage Contributions</span>--}}
{{--                    @else--}}
{{--                        <i class="fa fa-money"></i> <span>Contributions</span>--}}
{{--                    @endif--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    @if(Auth::user()->can('add-contributions'))--}}
{{--                        <li><a href="{{ route('contribute') }}"><i class="fa fa-money"></i> Add Contribution</a></li>--}}
{{--                    @endif--}}
{{--                    @if(Auth::user()->can('view-contributions'))--}}
{{--                        <li><a href="{{ route('all.contributions') }}"><i class="fa fa-money"></i> All Contributions</a></li>--}}
{{--                        <li><a href="{{ route('my.contributions') }}"><i class="fa fa-money"></i> My Contributions</a></li>--}}
{{--                    @endif--}}

{{--                </ul>--}}
{{--            </li>--}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
