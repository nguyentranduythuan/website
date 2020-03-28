<?php 
$name = Route::currentRouteName();
?>
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="{{ $name == 'home' ? 'start active open' : '' }}">
                <a href="{{ url('/client') }}">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                @if($name == 'home')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">CAMPAIGN</h3>
            </li>
            <li class="{{ $name == 'create_campaign' ? 'start active open' : '' }}">
                <a href="{{ url('/client/create_campaign') }}">
                <i class="icon-settings"></i>
                <span class="title">Tạo campaign</span>
                <span class="arrow "></span>
                @if($name == 'create_campaign')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'list_campaign' ? 'start active open' : '' }}">
                <a href="{{ url('/client/list_campaign') }}">
                <i class="icon-briefcase"></i>
                <span class="title">Danh sách Campaign</span>
                <span class="arrow "></span>
                @if($name == 'list_campaign')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">SMS</h3>
            </li>
            <li class="{{ $name == 'import_sms' ? 'start active open' : '' }}">
                <a href="{{ url('/client/import_sms') }}">
                <i class="icon-settings"></i>
                <span class="title">Input data</span>
                <span class="arrow "></span>
                @if($name == 'import_sms')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'report_sms' ? 'start active open' : '' }}">
                <a href="{{ url('/client/report_sms') }}">
                <i class="icon-briefcase"></i>
                <span class="title">Report</span>
                <span class="arrow "></span>
                @if($name == 'report_sms')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'api_sms' ? 'start active open' : '' }}">
                <a href="{{ url('/client/api_sms') }}">
                <i class="icon-envelope-open"></i>
                <span class="title">API SMS</span>
                <span class="arrow "></span>
                @if($name == 'api_sms')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Check Phone</h3>
            </li>
            <li class="{{ $name == 'import_phone' ? 'start active open' : '' }}">
                <a href="{{ url('/client/import_phone') }}">
                <i class="icon-settings"></i>
                <span class="title">Input data</span>
                <span class="arrow "></span>
                @if($name == 'import_phone')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'report_phone' ? 'start active open' : '' }}">
                <a href="{{ url('/client/report_phone') }}">
                <i class="icon-briefcase"></i>
                <span class="title">Report</span>
                <span class="arrow "></span>
                @if($name == 'report_phone')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'api_phone' ? 'start active open' : '' }}">
                <a href="{{ url('/client/api_phone') }}">
                <i class="icon-envelope-open"></i>
                <span class="title">API Check phone</span>
                <span class="arrow "></span>
                @if($name == 'api_phone')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Account</h3>
            </li>
            <li class="{{ $name == 'profile' ? 'start active open' : '' }}">
                <a href="{{ url('/client/profile') }}">
                <i class="icon-settings"></i>
                <span class="title">Thông tin cá nhân</span>
                <span class="arrow "></span>
                @if($name == 'profile')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li class="{{ $name == 'payment' ? 'start active open' : '' }}">
                <a href="{{ url('/client/payment') }}">
                <i class="icon-briefcase"></i>
                <span class="title">Tài khoản</span>
                <span class="arrow "></span>
                @if($name == 'payment')
                <span class="selected"></span>
                @endif
                </a>
            </li>
            <li>
                <a href="{{ url('/client/logout') }}">
                <i class="icon-envelope-open"></i>
                <span class="title">Thoát</span>
                <span class="arrow "></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>