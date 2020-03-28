@extends('layouts.client')

@section('pageTitle', "Login")

@section('content')

<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Tạo chiến dịch mới</a>
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
                                <span class="caption-subject font-blue-madison bold uppercase">Tạo chiến dịch mới</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <form class="form-without-legend" role="form" id="form-create-campaign" method="post" accept="#">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="start_run" id="start_run" value="">
                                        <input type="hidden" name="end_run" id="end_run" value="">
                                        <div class="form-group">
                                            <label class="control-label">Tên chiến dịch</label>
                                            <input type="text" placeholder="Tên chiến dịch" name="campaign_name" value="" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Thời gian chạy chiến dịch</label>
                                            <div class="input-group" id="defaultrange">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                <button class="btn default date-range-toggle" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Số tiền giới hạn</label>
                                            <input type="number" placeholder="Số tiền giới hạn" name="budget_limit" value="" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ghi chú</label>
                                            <textarea class="form-control" name="note" rows="3" placeholder="Ghi chú"></textarea>
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="submit" id="btn_create_campagin" class="btn green-haze uppercase">Tạo</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
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
        $("#form-create-campaign").submit(onSubtmitCreateCampaign);

        $('#defaultrange').daterangepicker({
                opens: (Metronic.isRTL() ? 'left' : 'right'),
                format: 'DD/MM/YYYY',
                separator: ' to ',
                startDate: moment(),
                endDate: moment().add(10, 'days'),
                minDate: moment(),
                maxDate: moment().add(365, 'days'),
            },
            function (start, end) {
                $('#defaultrange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $("#start_run").val(start.format('YYYY-MM-DD'));
                $("#end_run").val(end.format('YYYY-MM-DD'));
            }
        );
    });

    function onSubtmitCreateCampaign(e)
    {
        $("#btn_create_campagin").hide();

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
                    setTimeout(function(){location.href = "{{ url('/client/list_campaign') }}";}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_create_campagin").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
                $("#btn_create_campagin").show();
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