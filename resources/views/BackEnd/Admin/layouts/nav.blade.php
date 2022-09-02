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
            <a href="{{route('adminhome') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-pin'></i></div>
                <div class="menu-title">Tax Payer</div>
            </a>
            <ul>
                <li><a href="{{route('taxholders')}}"><i class="bx bx-right-arrow-alt"></i>Tax Payer List</a></li>
            </ul>
        </li>
        <!--       <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-pin'></i></div>
                <div class="menu-title">Report</div>
            </a>
            <ul>
                <li><a href=""><i class="bx bx-right-arrow-alt"></i>Tax Holder</a></li>
                <li><a href=""><i class="bx bx-right-arrow-alt"></i>Tax Statement</a></li>
            </ul>
        </li> -->
    </ul>
    <!--end navigation-->
</div>