<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->photo}}" class="img-circle" alt="User Image">

            </div>
            <div class="pull-left info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <a href="{{ route('home') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
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
                    <li><a href="{{ route('car.add_model') }}"><i class="fa fa-bookmark-o"></i> Add Car Model</a></li>
                    <li><a href="{{ route('car.all_car_models') }}"><i class="fa fa-bookmark-o"></i> All Car Models</a></li>
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
