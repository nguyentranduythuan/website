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
                <a href="{{ url('/cms/member/lists') }}">Member</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit {{ $content->fullname }}</a>
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
                        <i class="fa fa-gift"></i>Edit {{ $content->fullname }}
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
                                <label class="control-label col-md-3">Full Name <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Full Name is required and cannot be empty" type="text" name="fullname" data-required="1" class="form-control" value="{{ $content->fullname }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Email is required and cannot be empty" type="text" name="email" data-required="1" class="form-control" value="{{ $content->email }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Phone <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input readonly type="text" name="phone" data-required="1" class="form-control" value="{{ $content->phone }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Gender <span class="required"> * </span></label>
                                <div class="col-md-4">
                                    <div class="radio-list">
                                        @if($content->gender == 1)
                                        <label>
                                        <input type="radio" name="gender" value="0"/>Nữ</label>
                                        <label>
                                        <input type="radio" name="gender" value="1" checked="checked" />Nam</label>
                                        @else
                                        <label>
                                        <input type="radio" name="gender" value="0" checked="checked"/>Nữ</label>
                                        <label>
                                        <input type="radio" name="gender" value="1"/>Nam</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Công việc <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input readonly type="text" name="job_id" data-required="1" class="form-control" value="{{ $content->getJob ? $content->getJob->name : '' }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Đang quan tâm <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input readonly type="text" name="hobby_id" data-required="1" class="form-control" value="{{ $content->getHobby ? $content->getHobby->name : '' }}" />
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
                            <div class="form-group">
                                <label class="control-label col-md-3">Thời gian đăng ký <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input readonly type="text" name="time_register" data-required="1" class="form-control" value="{{ $content->time_register }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Đăng nhập lần cuối <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input readonly type="text" name="time_last_login" data-required="1" class="form-control" value="{{ $content->time_last_login }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Cập nhật</button>
                                    <a href="{{ url('cms/member/lists') }}" class="btn default">Hủy</a>
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