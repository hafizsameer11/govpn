<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon-2" alt="Logo" />
        </div>
        <div>
            <h4 class="logo-text">GO VPN</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard.index') }}">
                <div class="parent-icon"><i class="bx bx-home"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <!-- Servers Management -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-server"></i></div>
                <div class="menu-title">Servers</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.servers.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Server</a></li>
                <li> <a href="{{ route('admin.servers.index') }}"><i class="bx bx-right-arrow-alt"></i>All Servers</a></li>
            </ul>
        </li>

        <!-- OVPN Files Management -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-file"></i></div>
                <div class="menu-title">OVPN Files</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.ovpn-files.create') }}"><i class="bx bx-right-arrow-alt"></i>Add OVPN File</a></li>
                <li> <a href="{{ route('admin.ovpn-files.index') }}"><i class="bx bx-right-arrow-alt"></i>All OVPN Files</a></li>
            </ul>
        </li>

        <!-- Countries Management -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-globe"></i></div>
                <div class="menu-title">Countries</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.countries.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Country</a></li>
                <li> <a href="{{ route('admin.countries.index') }}"><i class="bx bx-right-arrow-alt"></i>All Countries</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-dollar"></i></div>
                <div class="menu-title">Plans</div>
            </a>
            <ul>
                <li> <a href="{{ route('plans.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Plan</a></li>
                <li> <a href="{{ route('plans.index') }}"><i class="bx bx-right-arrow-alt"></i>All PLans</a></li>
            </ul>
        </li>
        <!-- Optional Features for Future -->
        {{-- Additional features here --}}

        <!-- Logout Option -->
        <li>
            <a href="{{ route('logout') }}" >
                <div class="parent-icon"><i class="bx bx-log-out"></i></div>
                <div class="menu-title">Logout</div>
            </a>
            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form> --}}
        </li>
    </ul>
    <!--end navigation-->
</div>
