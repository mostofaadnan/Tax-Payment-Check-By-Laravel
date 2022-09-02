<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <!--   <div>
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div> -->
        <div>
            <h4 class="logo-text">{{ config('company.company_name') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.home') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-street-view'></i></div>
                <div class="menu-title">Area Operation</div>
            </a>
            <ul>
                <li><a href="{{route('states')}}"><i class="bx bx-right-arrow-alt"></i>State</a></li>
                <li><a href="{{route('districts')}}"><i class="bx bx-right-arrow-alt"></i>District</a></li>
                <li><a href="{{route('upazilas')}}"><i class="bx bx-right-arrow-alt"></i>Upazila</a></li>
                <li><a href="{{route('unions')}}"><i class="bx bx-right-arrow-alt"></i>Union</a></li>
                <li><a href="{{route('areas')}}"><i class="bx bx-right-arrow-alt"></i>Area</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Page Setup</div>
            </a>
            <ul>
            <li><a href="{{route('general.show')}}"><i class="bx bx-right-arrow-alt"></i>General Setting</a></li>
                <li><a href="{{route('aboutuses')}}"><i class="bx bx-right-arrow-alt"></i>About Us</a></li>
                <li><a href="{{route('menus')}}"><i class="bx bx-right-arrow-alt"></i>Menu</a></li>
                <li><a href="{{route('pages')}}"><i class="bx bx-right-arrow-alt"></i>Pages</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i></div>
                <div class="menu-title">Tax Operation</div>
            </a>
            <ul>
                <li><a href="{{route('superadmin.taxholders')}}"><i class="bx bx-right-arrow-alt"></i>Tax Payer</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('notices') }}">
                <div class="parent-icon"><i class='bx bx-list-ul'></i>
                </div>
                <div class="menu-title">Notice</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-pin'></i></div>
                <div class="menu-title">Union Admin</div>
            </a>
            <ul>
                <li><a href="{{route('unionusers')}}"><i class="bx bx-right-arrow-alt"></i>Union User</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-pin'></i></div>
                <div class="menu-title">Admin User</div>
            </a>
            <ul>
                <li><a href="{{route('admins')}}"><i class="bx bx-right-arrow-alt"></i>Admin User List</a></li>
                <li><a href="{{route('admin.create')}}"><i class="bx bx-right-arrow-alt"></i>New User</a></li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>