@extends('layouts.client')

@section('pageTitle', "Login")

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Danh sách SMS chạy</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Danh sách SMS chạys
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn default yellow-stripe dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" id="btn_export_excel">
                                Export to Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-sort="1" data-order="desc" data-link_ajax="{{ url('/client/report_sms/ajax') }}">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="5%">
                                ID
                            </th>
                            <th width="15%">
                                Chiến dịch
                            </th>
                            <th width="15%">
                                Số điện thoại
                            </th>
                            <th width="20%">
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
                                    <select class="form-control form-filter input-sm" name="campaign_id" id="campaign_id">
                                    <option value="" disabled selected>Chọn chiến dịch</option>
                                    @foreach($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                    @endforeach
                                </select>
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
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/datatable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('clients/global/scripts/table_view_list.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        TableViewList.init();

        $("#btn_export_excel").click(onExport);
    });

    function onExport(e)
    {
        e.preventDefault();
        showLoading();

        var formData = new FormData();
        formData.append('_token',  window.Framework.csrfToken);
        $('#datatable_table_list input, #datatable_table_list select').each(
            function(index){  
                var input = $(this);
                //console.log([input.attr('name'), input.val()]);
                formData.append(input.attr('name'), input.val());
            }
        );

        $.ajax({
            url: "{{ url('/client/report_sms/download') }}", 
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
                    var blob=new Blob([result.data]);
                    var link=document.createElement('a');
                    link.href=result.link;
                    link.download="report_sms.xlsx";
                    link.click();
                }
                else
                {
                    showAlert(result.message);
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
</script>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
@endsection