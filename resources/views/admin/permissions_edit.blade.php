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
                <a href="{{ url('/cms/permissions/lists') }}">Thông tin cá nhân</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Chỉnh sửa  - {{ $content->fullname }}</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Chỉnh sửa: {{ $content->fullname }}
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" class="form_submit form-horizontal"
                    data-bv-message="This value is not valid"
                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                        {!! csrf_field() !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Tên đăng nhập <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The User Name is required and cannot be empty" type="text" name="username" data-required="1" class="form-control" value="{{ $content->username }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Họ và tên <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Full Name is required and cannot be empty" type="text" name="fullname" data-required="1" class="form-control" value="{{ $content->fullname }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Mật khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" data-required="1" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Chức năng được nhìn thấy <span class="required">
                                * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="checkbox-list" data-error-container="#form_2_services_error">
                                        <?php 
                                        $permission_data = explode(',',$content->permissions);
                                        ?>
                                        @foreach($data as $dt)
                                        <label><input type="checkbox" value="{{ $dt->model }}" <?= (in_array($dt->model,$permission_data) ? 'checked' : '') ?> name="permissions[]"/> {{ $dt->name }} </label>
                                            <?php
                                            $sub = \App\Models\AdminMenu::where("parent_id", $dt->id)->get();
                                            ?>
                                            @if(count($sub) > 0)
                                                @foreach($sub as $dt)
                                                    <label><input type="checkbox" value="{{ $dt->model }}" <?= (in_array($dt->model,$permission_data) ? 'checked' : '') ?> name="permissions[]"/> -- {{ $dt->name }} </label>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Trạng thái <span class="required"> * </span></label>
                                <div class="col-md-4">
                                    <div class="radio-list">
                                        @if($content->is_active == 1)
                                        <label>
                                        <input type="radio" name="is_active" value="0"/>Không hoạt động</label>
                                        <label>
                                        <input type="radio" name="is_active" value="1" checked="checked" />Hoạt động</label>
                                        @else
                                        <label>
                                        <input type="radio" name="is_active" value="0" checked="checked"/>Không hoạt động</label>
                                        <label>
                                        <input type="radio" name="is_active" value="1"/>Hoạt động</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Cập nhật</button>
                                    <a href="{{ url('cms/permissions/lists') }}" class="btn default">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
</div>
@stop