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
            <a href="#">Nhập data cho tool gửi SMS</a>
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
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Nhập data cho tool gửi SMS</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-without-legend" role="form" id="form-import-sms" method="post" action="{{ url('/client/import_sms/import_data') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Hãy chọn chiến dịch bạn muốn chạy SMS</label>
                            <select class="form-control" name="campaign_id" id="campaign_id">
                                <option value="" disabled selected>Chọn chiến dịch</option>
                                @foreach($campaigns as $campaign)
                                    <option value="{{ $campaign->id }}" {{ $campaign_id == $campaign->id ? 'selected' : '' }}>{{ $campaign->campaign_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Chọn file excel bạn muốn gửi nội dung.</label>
                            <div class="input-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename" style="overflow: hidden;width: 57px;">
                                            </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                        <span class="fileinput-new">
                                        Select file </span>
                                        <span class="fileinput-exists">
                                        Change </span>
                                        <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                        Remove </a>
                                    </div>
                                </div>
                            </div>
                            <label class="control-label">Dung lượng file dưới 2Mb. Bạn có thể download file mẫu <a href="{{ URL::asset('demo/data_sms.xlsx') }}" target="_blank">tại đây</a></label>
                        </div>
                        @if($campaign_selected)
                        <div class="form-group">
                            <label class="control-label">Giá SMS</label>
                            <input type="text" placeholder="Giá SMS" readonly="" name="price_sms" value="{{ formatCurrency($campaign_selected->price_sms) }}" class="form-control"/>
                        </div>
                        @endif
                        <div class="margiv-top-10">
                            <button type="submit" id="btn_import" class="btn green-haze uppercase">Nhập Data</button>
                        </div>
                    </form>
                </div>
                <!-- END SIDEBAR USER TITLE -->
            </div>
            <!-- END PORTLET MAIN -->
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
                                <span class="caption-subject font-blue-madison bold uppercase">Danh sách SMS cho chiến dịch này</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                @if($campaign_selected)
                                <div class="table-container">
                                    <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-sort="1" data-order="desc" data-link_ajax="{{ url('/client/import_sms/ajax?campaign_id=').$campaign_selected->id }}">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="5%">
                                            ID
                                        </th>
                                        <th width="15%">
                                            Số điện thoại
                                        </th>
                                        <th width="35%">
                                            Nội dung
                                        </th>
                                        <th width="10%">
                                            Trạng thái
                                        </th>
                                        <th width="10%">
                                            Thời gian gửi
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
                                                <input type="text" class="form-control form-filter input-sm" name="phone">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm" name="content_sms">
                                            </td>
                                            <td>
                                                <select name="status" class="form-control form-filter input-sm">
                                                    <option value="-1">Select...</option>
                                                    <option value="0">Waiting</option>
                                                    <option value="1">Done</option>
                                                    <option value="2">Error</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm" readonly name="time_send_from" placeholder="From">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm" readonly name="time_send_to" placeholder="To">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
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
                                @endif
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
@if($campaign_selected)
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/datatable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/table_view_list.js') }}"></script>
@endif

<script type="text/javascript">
    jQuery(document).ready(function() {

        $("#campaign_id").change(function(){
            location.href = HOT + "/client/import_sms?campaign_id=" + $(this).val();
        });

        $("#file").change(function(){
            if(this.files[0].size > 5242880){
               alert("File is too big!");
               this.value = "";
            };
        });

        $("#form-import-sms").submit(onSubtmitImportDataSMS);
    });

    @if($campaign_selected)
    $(document).ready(function(){
        TableViewList.init();
    });
    @endif

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
@if($campaign_selected)
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
@endif

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