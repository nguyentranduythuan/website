@extends('layouts.client')

@section('pageTitle', "Login")

@section('content')

<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                 Widget settings form goes here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue">Save changes</button>
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Tài khoản cá nhân</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row margin-top-20">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ getAvatar('avatar-d.png') }}" style="background-size: contain;background-image: url({{ getAvatar($data->avatar) }});" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ Session::get("client_full_name") }}
                    </div>
                    <div class="profile-usertitle-job">
                         {{ Session::get("client_email") }}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <div class="portlet light">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             {{ $data->total_campaign }}
                        </div>
                        <div class="uppercase profile-stat-text">
                             Campaign
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             {{ formatCurrency($data->total_money, "") }}
                        </div>
                        <div class="uppercase profile-stat-text">
                             Tổng tiền đã nạp
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                             {{ formatCurrency($data->left_money, "") }}
                        </div>
                        <div class="uppercase profile-stat-text">
                             Số tiền còn lại
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Lịch sử giao dịch</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1">Lịch sử nạp tiền</a>
                                </li>
                                <li>
                                    <a href="{{ url('/client/payment/history') }}">Lịch sử sử dụng</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="tab-content">
                                        <div class="table-container">
                                            <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-sort="1" data-order="desc" data-link_ajax="{{ url('/client/payment/ajax_nap_tien') }}">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th width="5%">
                                                    ID
                                                </th>
                                                <th width="15%">
                                                    Số tiền
                                                </th>
                                                <th width="35%">
                                                    Hình thức nạp
                                                </th>
                                                <th width="35%">
                                                    Thời gian nạp
                                                </th>
                                                <th width="10%">
                                                    Trạng thái
                                                </th>
                                                <th width="10%">
                                                     Actions
                                                </th>
                                            </tr>
                                            <tr role="row" class="filter">
                                                <form action="" method="post">
                                                    {!! csrf_field() !!}
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <select name="status" class="form-control form-filter input-sm">
                                                            <option value="-1">Select...</option>
                                                            <option value="0">Không thành công</option>
                                                            <option value="1">Thành công</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="margin-bottom-5">
                                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                                    </td>
                                                </form>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/datatable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/table_view_list.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        TableViewList.init();
    });

    function onloadCallbackCaptcha()
    {
        
    }
</script>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>

<link href="{{ URL::asset('clients/admin/pages/css/profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection