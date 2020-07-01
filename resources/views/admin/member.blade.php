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
                <a href="#">Người dùng đăng ký</a>
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
                        <span class="caption-subject font-green-sharp bold uppercase">Người dùng đăng ký</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-link_ajax="{{ url('/cms/member/ajax') }}">
                           
                        <thead>
                        <tr role="row" class="heading">
                            <th width="5%">
                                ID
                            </th>
                            <th width="10%">
                                Tên
                            </th>
                            <th width="10%">
                                Email
                            </th>
                            <th>
                                Điện thoại
                            </th>
                            <th>
                                Avatar
                            </th>
                            <th>
                                Giới tính
                            </th>
                            <th width="10%">
                                Trạng thái
                            </th>
                            <th width="10%">
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
                                    <input type="text" class="form-control form-filter input-sm" name="fullname">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="email">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="phone">
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                    <select name="gender" class="form-control form-filter input-sm">
                                        <option value="-1">Trạng thái...</option>
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="is_active" class="form-control form-filter input-sm">
                                        <option value="-1">Trạng thái...</option>
                                        <option value="0">Tạm ngừng</option>
                                        <option value="1">Đang hoạt động</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Tìm </button>
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