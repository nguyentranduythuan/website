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
<!-- END GLOBAL MANDATORY STYLES -->
<link href="{{ URL::asset('clients/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('clients/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ URL::asset('clients/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
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
  window.Framework = {csrfToken: '{{ csrf_token() }}', sitekey:"{{ env('CAPTCHA_SITEKEY', '') }}", tmk: {{ session()->has('user_id') ? session()->get('user_id') : 0}}};
  var HOT = "{{ url('/') }}";
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCaptcha"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{ url('/client') }}">
    <img src="{{ URL::asset('clients/admin/layout/img/logo-big.png') }}" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->

@yield('content')

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
<div class="copyright">Copyright © <a href="#">We Marketing</a> 2018. All rights reserved.</div>

<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ URL::asset('clients/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('clients/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
<script src="{{ URL::asset('clients/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('clients/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('clients/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('clients/main.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
});
</script>
<!-- END JAVASCRIPTS -->
@yield('style')

@yield('scripts')
</body>
<!-- END BODY -->
</html>