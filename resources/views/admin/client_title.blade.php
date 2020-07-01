@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="page-content" style="min-height:1269px">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ url('/cms') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">About</a>
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
                        <span class="caption-subject font-green-sharp bold uppercase">Client Info</span>
                    </div>
                    <div class="actions">
                        <a href="{{ url('cms/client-title/add') }}" class="btn btn-circle btn-default">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-480">Add</span>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover" id="datatable_table_list" data-link_ajax="{{ url('/cms/client-title/ajax') }}">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="5%">
                                ID
                            </th>
                            <th width="60%">
                                Name
                            </th>
                            <th width="15%">
                                Action
                            </th>
                        </tr>
                        <tr role="row" class="filter">
                            <form action="" method="post">
                                {!! csrf_field() !!}
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="id">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="name">
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