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
                                <span class="caption-subject font-blue-madison bold uppercase">Thông tin cá nhân</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Thông tin cá nhân</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Thay đổi Avatar</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Thay đổi mật khẩu</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <form class="form-without-legend" role="form" id="form-update-profile" method="post" accept="#">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label class="control-label">Tên của bạn</label>
                                            <input type="text" placeholder="John" name="fullname" value="{{ $data->fullname }}" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Số điện thoại</label>
                                            <input type="text" placeholder="0909090909" name="phone" value="{{ $data->phone }}" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" placeholder="abc@abc.com" readonly name="email" value="{{ $data->email }}" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Địa chỉ</label>
                                            <input type="text" placeholder="Địa chỉ" name="address" value="{{ $data->address }}" class="form-control"/>
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="submit" id="btn_submit_profile" class="btn green-haze uppercase">Lưu thông tin</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p>
                                        Hình Avatar đẹp nhất là hình vuông có kích thướt từ: 100px X 100px đến 500px X 500px.
                                    </p>
                                    <form class="form-without-legend" role="form" id="form-change-avatar" method="post" action="{{ url('/client/profile-change-avatar') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="avatar">
                                                    </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                             <button type="submit" id="btn_submit_change_avatar" class="btn green-haze uppercase">Đổi Avatar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    <form class="form-without-legend" role="form" id="form-change-password" method="post" action="{{ url('/client/profile-change-password') }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label class="control-label">Mật khẩu hiện tại</label>
                                            <input type="password" name="current_password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mật khẩu mới</label>
                                            <input type="password" name="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nhập lại mật khẩu mới</label>
                                            <input type="password" name="password_confirmation" class="form-control"/>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" id="btn_submit_change_password" class="btn green-haze uppercase">Đổi mật khẩu</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
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
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#form-update-profile").submit(onSubtmitUpdateProfile);
        $("#form-change-password").submit(onSubtmitChangePassword);
        $("#form-change-avatar").submit(onSubtmitChangeAvatar);
    });

    function onSubtmitUpdateProfile(e)
    {
        $("#btn_submit_profile").hide();

        e.preventDefault();
        showLoading();

        $.ajax({
            url: $(this).attr("action"), 
            type : "POST", 
            dataType : 'json', 
            data : $(this).serialize(), 
            success : function(result) {
                
                hideLoading();

                if(result.status)
                {
                    showAlert(result.message);
                    setTimeout(function(){location.href = "{{ url('/client/profile') }}";}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_submit_profile").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
                $("#btn_submit_profile").show();
            }
        });

        return false;
    }

    function onSubtmitChangePassword(e)
    {
        $("#btn_submit_change_password").hide();

        e.preventDefault();
        showLoading();

        $.ajax({
            url: $(this).attr("action"), 
            type : "POST", 
            dataType : 'json', 
            data : $(this).serialize(), 
            success : function(result) {
                
                hideLoading();

                if(result.status)
                {
                    showAlert(result.message);
                    setTimeout(function(){location.href = "{{ url('/client/profile') }}";}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_submit_change_password").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
                $("#btn_submit_change_password").show();
            }
        });

        return false;
    }

    function onSubtmitChangeAvatar(e)
    {
        $("#btn_submit_change_avatar").hide();

        e.preventDefault();
        showLoading();

        var form = $(this)[0]; 
        var formData = new FormData(form);

        $.ajax({
            url: $(this).attr("action"), 
            type : "POST", 
            dataType : 'json',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            mimeType:"multipart/form-data",
            success : function(result) {
                
                hideLoading();

                if(result.status)
                {
                    showAlert(result.message);
                    setTimeout(function(){location.href = "{{ url('/client/profile') }}";}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_submit_change_avatar").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
                $("#btn_submit_change_avatar").show();
            }
        });

        return false;
    }

    function onloadCallbackCaptcha()
    {
        
    }
</script>
@endsection

@section('style')
<link href="{{ URL::asset('clients/admin/pages/css/profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection