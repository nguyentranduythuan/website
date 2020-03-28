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
            <a href="#">Quản lý API phần gửi SMS</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row margin-top-20">
    <div class="col-md-12">
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Tạo API</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <form class="form-without-legend" role="form" id="form-import-sms" method="post" action="{{ url('/client/api_sms/create_api') }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="control-label">Hãy chọn chiến dịch bạn muốn tạo API</label>
                                        <select class="form-control" name="campaign_id" id="campaign_id">
                                            <option value="" disabled selected>Chọn chiến dịch</option>
                                            @foreach($campaigns as $campaign)
                                                <option value="{{ $campaign->id }}" {{ $campaign_id == $campaign->id ? 'selected' : '' }}>{{ $campaign->campaign_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="margiv-top-10">
                                        <button type="submit" id="btn_import" class="btn green-haze uppercase">Tạo API</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Danh sách các API</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <a href="{{ URL::asset('demo/huong-dan-dau-noi-api-sms-wemarketing.pdf') }}" target="_blank" class="btn btn-transparent grey-salsa btn-circle btn-sm active">Hướng dẫn đấu nối API</a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="table-container">
                                    <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-sort="1" data-order="desc" data-link_ajax="{{ url('/client/api_sms/ajax') }}">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="5%">
                                            ID
                                        </th>
                                        <th width="15%">
                                            Chiến dịch
                                        </th>
                                        <th width="35%">
                                            APP_KEY
                                        </th>
                                        <th width="35%">
                                            APP_SECRET
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
                                                <select class="form-control form-filter" name="campaign_id" id="campaign_id">
                                                    <option value="" disabled selected>Chọn chiến dịch</option>
                                                    @foreach($campaigns as $campaign)
                                                        <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <select name="status" class="form-control form-filter input-sm">
                                                    <option value="-1">Select...</option>
                                                    <option value="0">STOP</option>
                                                    <option value="1">RUNNING</option>
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

        $("#form-import-sms").submit(onSubtmitImportDataSMS);

        $(document).on("switchChange.bootstrapSwitch", ".make-switch", function (event, state) {
            updateStatusAPI($(this).data("id"), state);
        });
    });

    $(document).ready(function(){
        TableViewList.init();
    });

    function updateStatusAPI(id, status)
    {
        var formData = new FormData();
        formData.append('_token',  window.Framework.csrfToken);
        formData.append("id", id);
        formData.append("status", status ? 1 : 0);

        $.ajax({
            url: "{{ url('/client/api_sms/update-status') }}", 
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
                    //setTimeout(function(){location.reload();}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_import").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
            }
        });

        return false;
    }

    function onSubtmitImportDataSMS(e)
    {
        $("#btn_import").hide();

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
                    setTimeout(function(){location.reload();}, 2000);
                }
                else
                {
                    showAlert(result.message);
                    $("#btn_import").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                showAlert(text);
                $("#btn_import").show();
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
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>

<link href="{{ URL::asset('clients/admin/pages/css/profile.css') }}" rel="stylesheet" type="text/css"/>
<style type="text/css">
    #form-import-sms .uneditable-input{
        min-width: auto;
    }
    #form-import-sms .input-large{
        width: 260px!important;
    }
    .portlet.light{
        padding: 12px 20px 15px 20px!important;
    }
</style>
@endsection