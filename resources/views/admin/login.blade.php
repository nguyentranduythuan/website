<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title>EventAdvisor | Login Page</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL STYLES -->
		<link href="{{ URL::asset('admin/assets/admin/pages/css/login2.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END PAGE LEVEL SCRIPTS -->
		<!-- BEGIN THEME STYLES -->
		<link href="{{ URL::asset('admin/assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ URL::asset('admin/assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="{{ URL::asset('admin/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}"/>
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
			<a href="index.html">
				<img src="{{ URL::asset('logo.png') }}" style="height: 100px;" alt=""/>
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN LOGIN -->
		<div class="content">
			<!-- BEGIN LOGIN FORM -->
			<form class="login-form" action="" method="post" onsubmit="return false">
				{!! csrf_field() !!}
				<div class="form-title">
					<span class="form-title">Vui lòng đăng nhập.</span>
					<span class="form-subtitle"></span>
				</div>
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span>
					Vui lòng nhập tên đăng nhập và mật khẩu. </span>
				</div>
				<div class="form-group">
					<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
					<label class="control-label visible-ie8 visible-ie9">Tên đăng nhập</label>
					<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
				</div>
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
					<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
				</div>
				<div class="form-actions">
					<button type="submit" id="btn_login" style="border-color: #fff;color: #fff" class="btn btn-primary btn-block uppercase">Đăng nhập</button>
				</div>
				<!-- <div class="form-actions">
					<p>Giờ hiện tại của server: {{ date("Y-m-d H:i:s")}}</p>
				</div> -->
			</form>
			<!-- END LOGIN FORM -->
		</div>
		<div class="copyright">
			2020 © EventAdvisor develop by CoDev Service Co., Ltd.
		</div>
		<!--[if lt IE 9]>
		<script src="{{ URL::asset('admin/assets/global/plugins/respond.min.js') }}"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/excanvas.min.js') }}"></script>
		<![endif]-->
		<script src="{{ URL::asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="{{ URL::asset('admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="{{ URL::asset('admin/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/admin/layout/scripts/main.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/admin/pages/scripts/login.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
		jQuery(document).ready(function() {
			Metronic.init();
			Layout.init();
			Login.init();
		});
		</script>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>