<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar" style="height: auto;">

        <!-- sidebar menu-->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="user-profile treeview">
                <a href="#">
                    <img src="{{ asset('assets/images/user.png') }}" alt="user">
                    <span>{{ Auth::user()->name }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('changeProfile') }}"><i class="fa fa-user mr-5"></i>Change Profile</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-5"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" >
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'courierIndex' ? 'active' : '' }}">
                <a href="{{ route('courierIndex') }}">
                    <i class="fa  fa-truck"></i> <span>Courier</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'departmentIndex' ? 'active' : '' }}">
                <a href="{{ route('departmentIndex') }}">
                    <i class="fa fa-building"></i> <span>Department</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'modeIndex' ? 'active' : '' }}">
                <a href="{{ route('modeIndex') }}">
                    <i class="fa fa-tasks"></i> <span>Modes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'inwardIndex' ? 'active' : '' }}">
                <a href="{{ route('inwardIndex') }}">
                    <i class="fa fa-sign-in"></i> <span>Inward Details</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'outwardIndex' ? 'active' : '' }}">
                <a href="{{ route('outwardIndex') }}">
                    <i class="fa fa-sign-out"></i> <span>Outward Details</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
            </li>
        </ul>
    </section>
</aside>