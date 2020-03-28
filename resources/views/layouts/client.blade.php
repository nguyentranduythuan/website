<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js') }}"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js') }}"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Phần mềm quản lý - WeMarketing.tech</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ URL::asset('clients/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet') }}" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="{{ URL::asset('clients/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ URL::asset('clients/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<script>
  window.Framework = {csrfToken: '{{ csrf_token() }}', sitekey:"{{ env('CAPTCHA_SITEKEY', '6LdlYpAUAAAAADPSckwnP1TuMEJoMHjxunRL1y-A') }}", tmk: {{ session()->has('client_id') ? session()->get('client_id') : 0}}};
  var HOT = "{{ url('/') }}";
</script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url('/clients') }}">
            <img src="{{ URL::asset('clients/admin/layout/img/logo.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @if(1 == 2)
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                    7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">12 pending</span> notifications</h3>
                            <a href="extra_profile.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">just now</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    New user registered. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">3 mins</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Server #12 overloaded. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">10 mins</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Server #2 not responding. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">14 hrs</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    Application error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">2 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Database overloaded 68%. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">3 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    A user IP blocked. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">4 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Storage Server #4 not responding dfdfdfd. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">5 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    System Error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">9 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Storage server failed. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-envelope-open"></i>
                    <span class="badge badge-default">
                    4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have <span class="bold">7 New</span> Messages</h3>
                            <a href="page_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="{{ getAvatar($data->avatar) }}" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">Just Now </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="{{ URL::asset('clients/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">16 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="{{ URL::asset('clients/admin/layout3/img/avatar1.jpg') }}" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Bob Nilson </span>
                                    <span class="time">2 hrs </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="{{ URL::asset('clients/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">40 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="{{ URL::asset('clients/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">46 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                @endif
                
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="{{ getAvatar(Session::get("client_avatar")) }}"/>
                    <span class="username username-hide-on-mobile">{{ Session::get("client_full_name") }}</span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('/client/profile') }}">
                            <i class="icon-user"></i> Thông tin cá nhân </a>
                        </li>
                        <li>
                            <a href="{{ url('/client/payment') }}">
                            <i class="icon-envelope-open"></i> Tài khoản
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="{{ url('/client/logout') }}">
                            <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    {!! App\Http\Controllers\Client\ModuleController::menu() !!} 
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         Copyright © <a href="#">We Marketing</a> 2018. All rights reserved.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<div id="popup_message" class="modal fade modal-bdss" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title">Thông báo</h4>
    </div>
    <div class="modal-body">
        <p id="popup_message_msg"></p>
    </div>
</div>

<div id="popup_loading" class="modal fade modal-bdss" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-header">
        <h4 class="modal-title">Loading ...</h4>
    </div>
    <div class="modal-body">
        <p><img style="width: 84px;margin-top: 43px;" src="{{ URL::asset('clients/frontend/layout/img/loading.gif') }}"/></p>
    </div>
</div>

<!--[if lt IE 9]>
<script src="{{ URL::asset('clients/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('clients/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
<script src="{{ URL::asset('clients/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ URL::asset('clients/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ URL::asset('clients/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ URL::asset('clients/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ URL::asset('clients/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('clients/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/main.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
});
</script>
<!-- END JAVASCRIPTS -->
@yield('style')
@yield('scripts')
</body>
<!-- END BODY -->
</html>