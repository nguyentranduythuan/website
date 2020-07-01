@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="page-content" style="min-height:1269px">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ url('/cms') }}">Trang chủ</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Thông tin cá nhân</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Thông tin cá nhân</span>
                    </div>
                    @if(Session::get('admin_group') == 1)
                    <div class="actions">
                        <a href="{{ url('cms/permissions/add') }}" class="btn btn-circle btn-default">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-480">Thêm người quản lý </span>
                        </a>
                    </div>
                    @endif
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-link_ajax="{{ url('/cms/permissions/ajax') }}">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="5%">
                                 ID
                            </th>
                            <th width="15%">
                                 Tên đăng nhập
                            </th>
                            <th width="15%">
                                 Họ và tên
                            </th>
                            <th width="10%">
                                 Trạng thái
                            </th>
                            <th width="15%">
                                 Chức năng
                            </th>
                        </tr>
                        <tr role="row" class="filter">
                            <form action="" method="post">
                                {!! csrf_field() !!}
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="id">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="username">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="fullname">
                                </td>
                                <td>
                                    <select name="is_active" class="form-control form-filter input-sm">
                                        <option value="">Chọn...</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Không hoạt động</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Tìm</button>
                                    <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Làm lại</button>
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
    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        TableViewList.init();
    });
</script>
@stop