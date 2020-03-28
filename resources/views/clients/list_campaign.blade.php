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
            <a href="#">Danh sách chiến dịch</a>
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
                    <i class="fa fa-gift"></i>Danh sách chiến dịch
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn default yellow-stripe dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                Export to Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-sort="1" data-order="desc" data-link_ajax="{{ url('/client/list_campaign/ajax') }}">
                    <thead>
                    <tr role="row" class="heading">
                        <th width="5%">
                            ID
                        </th>
                        <th width="15%">
                            Tên chiến dịch
                        </th>
                        <th width="10%">
                            Thòi gian bắt đầu
                        </th>
                        <th width="10%">
                            Thòi gian kết thúc
                        </th>
                        <th width="10%">
                            Số tiền giới hạn
                        </th>
                        <th width="10%">
                            Số tiền đã dùng
                        </th>
                        <th width="10%">
                            Giá SMS
                        </th>
                        <th width="10%">
                            Giá Check phone
                        </th>
                        <th width="10%">
                             Status
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
                                <input type="text" class="form-control form-filter input-sm" name="campaign_name">
                            </td>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="start_run_from" placeholder="From">
                                    <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="start_run_to" placeholder="To">
                                    <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="end_run_from" placeholder="From">
                                    <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="end_run_to" placeholder="To">
                                    <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <input type="number" class="form-control form-filter input-sm" name="budget_limit_from" placeholder="From"/>
                                </div>
                                <input type="number" class="form-control form-filter input-sm" name="budget_limit_to" placeholder="To"/>
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <input type="number" class="form-control form-filter input-sm" name="amount_used_from" placeholder="From"/>
                                </div>
                                <input type="number" class="form-control form-filter input-sm" name="amount_used_to" placeholder="To"/>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <select name="is_active" class="form-control form-filter input-sm">
                                    <option value="-1">Select...</option>
                                    <option value="0">Chưa chạy</option>
                                    <option value="1">Đang chạy</option>
                                    <option value="2">Đã chạy thành công</option>
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
    });
</script>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('clients/global/plugins/bootstrap-datepicker/css/datepicker.css') }}"/>
@endsection