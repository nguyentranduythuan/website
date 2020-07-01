<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>EventAdvisor | @yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
{{-- <script type="text/javascript" src="{{ URL::asset('editor/ckeditor/ckeditor.js') }}"></script> --}}
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/clockface/css/clockface.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/global/plugins/dropzone/css/dropzone.css') }}"/>

<link href="{{ URL::asset('admin/assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/admin/layout2/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/admin/layout2/css/themes/grey.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ URL::asset('admin/assets/admin/layout2/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('admin/assets/admin/pages/css/todo.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}"/>

<script src="{{ URL::asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<link href="{{ URL::asset('admin/assets/global/plugins/pace/themes/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>
<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
<script type="text/javascript">
   var HOT = "{{ url('/') }}";
   window.Framework = {csrfToken: '{{ csrf_token() }}'};
</script>
</head>
<body class="page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo page-header-fixed">
<div class="pace pace-inactive" style="z-index: 99999999999;">
   <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 94%;z-index: 9999999;"></div>
</div>
<div class="page-header navbar navbar-fixed-top">
   <!-- BEGIN HEADER INNER -->
   <div class="page-header-inner">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
         <a href="index.html">
         {{-- <img src="{{ URL::asset('/logo.png') }}" alt="logo" class="logo-default" height="34px" style="margin-top: 14px;"> --}}
         </a>
         <div class="menu-toggler sidebar-toggler"></div>
      </div>
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
      <div class="page-top">
         <!-- BEGIN TOP NAVIGATION MENU -->
         <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
               <li class="dropdown dropdown-user">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                  <span class="username username-hide-on-mobile">{{Session::get('admin_fullname')}}</span>
                  <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-default">
                     <li>
                        <a href="{{ url('cms/permissions') }}">
                        <i class="icon-user"></i> Thông tin cá nhân </a>
                     </li>
                     <li>
                        <a href="{{ url('cms/logout') }}">
                        <i class="icon-key"></i> Đăng xuất </a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END PAGE TOP -->
   </div>
   <!-- END HEADER INNER -->
</div>
<div class="clearfix"></div>
<div class="page-container">
   <div class="page-sidebar-wrapper">
      <div class="page-sidebar navbar-collapse collapse">
         <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            {!! App\Http\Controllers\Admin\ModuleController::menu() !!}
         </ul>
      </div>
   </div>
   <div class="page-content-wrapper">
      @yield('content')
   </div>
</div>
<div class="page-footer">
   <div class="page-footer-inner">
      2020 © EventAdvisor develop by CoDev Service Co., Ltd.
   </div>
</div>
<div class="scroll-to-top">
   <i class="icon-arrow-up"></i>
</div>
<!--[if lt IE 9]>
<script src="{{ URL::asset('admin/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
<script src="{{ URL::asset('admin/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ URL::asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ URL::asset('admin/assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/clockface/js/clockface.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<script src="{{ URL::asset('admin/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/scripts/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/jquery.number.js') }}"></script>

<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ URL::asset('admin/assets/admin/pages/scripts/components-dropdowns.js') }}"></script>

<script src="{{ URL::asset('admin/assets/global/plugins/dropzone/dropzone.js') }}"></script>

<script src="{{ URL::asset('admin/assets/global/scripts/datatable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/scripts/table_view_list.js') }}"></script>
<script src="{{ URL::asset('admin/assets/admin/pages/scripts/components-pickers.js') }}"></script>
<script src="{{ URL::asset('admin/assets/admin/pages/scripts/form-dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/assets/global/scripts/admin.js') }}"></script>
@yield('script')
@yield('style')

</body>
<!-- END BODY -->
</html>