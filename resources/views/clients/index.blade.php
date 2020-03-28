@extends('layouts.client')

@section('pageTitle', "Login")

@section('content')

<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<h3 class="page-title">
Dashboard
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->tong_tien_nap, "") }}
                </div>
                <div class="desc">
                     Tổng số tiền đã nạp
                </div>
            </div>
            <a class="more" href="{{ url('/client/payment') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ formatCurrency($data->tong_tien_nap - $data->tong_tien_da_dung, "") }}
                </div>
                <div class="desc">
                     Tổng số tiền đã sử dụng
                </div>
            </div>
            <a class="more" href="{{ url('/client/payment') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->tong_tien_da_dung, "") }}
                </div>
                <div class="desc">
                     Số tiền còn lại
                </div>
            </div>
            <a class="more" href="{{ url('/client/payment') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ formatCurrency($data->tong_campaign, '') }}
                </div>
                <div class="desc">
                     Tổng số Campaign
                </div>
            </div>
            <a class="more" href="{{ url('/client/list_campaign') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ formatCurrency($data->tong_campaign_running, '') }}
                </div>
                <div class="desc">
                     Số Campaign đang chạy
                </div>
            </div>
            <a class="more" href="{{ url('/client/list_campaign') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ formatCurrency($data->tong_campaign_stop, '') }}
                </div>
                <div class="desc">
                     Campaign đã dừng
                </div>
            </div>
            <a class="more" href="{{ url('/client/list_campaign') }}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->tien_su_dung_sms, '') }}
                </div>
                <div class="desc">
                     Tiền SMS đã dùng
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ formatCurrency($data->sms_da_gui, '') }}
                </div>
                <div class="desc">
                     SMS đã gửi
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->sms_dang_cho, '') }}
                </div>
                <div class="desc">
                     SMS đang chờ gửi
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->sms_gui_khong_thanh_cong, '') }}
                </div>
                <div class="desc">
                     SMS gửi không thành công
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->tien_su_dung_check, '') }}
                </div>
                <div class="desc">
                     Tiền Check Phone đã dùng
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->check_da_gui, '') }}
                </div>
                <div class="desc">
                     Số điện thoại đã check
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->check_dang_cho, '') }}
                </div>
                <div class="desc">
                     Số điện thoại đang chờ check
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ formatCurrency($data->check_gui_khong_thanh_cong, '') }}
                </div>
                <div class="desc">
                     Số điện thoại check không thành công
                </div>
            </div>
            <a class="more" href="javascript:;">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green-sharp hide"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Gửi SMS</span>
                    <span class="caption-helper"> trong tháng</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_loading">
                    <img src="{{ URL::asset('clients/admin/layout/img/loading.gif') }}" alt="loading"/>
                </div>
                <div id="site_statistics_content" class="display-none">
                    <div id="site_statistics" class="chart">
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Tài chính</span>
                    <span class="caption-helper">trong tháng</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filter Range<span class="fa fa-angle-down">
                        </span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                Q1 2014 <span class="label label-sm label-default">
                                past </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                Q2 2014 <span class="label label-sm label-default">
                                past </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript:;">
                                Q3 2014 <span class="label label-sm label-success">
                                current </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                Q4 2014 <span class="label label-sm label-warning">
                                upcoming </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <img src="{{ URL::asset('clients/admin/layout/img/loading.gif') }}" alt="loading"/>
                </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" style="height: 228px;">
                    </div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-success">
                            Revenue: </span>
                            <h3>$13,234</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-info">
                            Tax: </span>
                            <h3>$134,900</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-danger">
                            Shipment: </span>
                            <h3>$1,134</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning">
                            Orders: </span>
                            <h3>235090</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-blue-steel hide"></i>
                    <span class="caption-subject font-blue-steel bold uppercase">Lịch sử giao dịch</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                    <ul class="feeds">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             You have 4 pending tasks. <span class="label label-sm label-warning ">
                                            Take action <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     Just now
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Finance Report for year 2013 has been released.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     20 mins
                                </div>
                            </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             You have 5 pending membership that requires a quick review.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     24 mins
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             New order received with <span class="label label-sm label-success">
                                            Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     30 mins
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             You have 5 pending membership that requires a quick review.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     24 mins
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                            Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     2 hours
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             IPO Report for year 2013 has been released.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     20 mins
                                </div>
                            </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             You have 4 pending tasks. <span class="label label-sm label-warning ">
                                            Take action <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     Just now
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Finance Report for year 2013 has been released.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     20 mins
                                </div>
                            </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             You have 5 pending membership that requires a quick review.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     24 mins
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             New order received with <span class="label label-sm label-success">
                                            Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     30 mins
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection

@section('scripts')
<script src="{{ URL::asset('clients/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() { 
   Index.initDashboardDaterange();
   Index.initCharts(); // init index page's custom scripts
   Index.initMiniCharts();
});
</script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection