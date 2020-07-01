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
                <a href="{{ url('/cms/office/lists') }}">Staff</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit {{ $content->name }}</a>
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
                        <i class="fa fa-gift"></i>Edit {{ $content->name }}
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
                                <label class="control-label col-md-3">Name <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="title" data-required="1" class="form-control" value="{{ $content->name }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Address <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="address" data-required="1" class="form-control" value="{{ $content->name }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Phone <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="phone" data-required="1" class="form-control" value="{{ $content->name }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Email <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="email" data-required="1" class="form-control" value="{{ $content->name }}" />
                                </div>
                            </div>
                            
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Cập nhật</button>
                                    <a href="{{ url('cms/office/lists') }}" class="btn default">Hủy</a>
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

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function() {

        $('.thumb').change(function(e){
            filename = e.target.files[0].name;
            if (e.target.files && e.target.files[0]) {

                size = e.target.files[0].size;
                if(size > (1024*1024*0.8))
                {
                    alert("Hình Thumbnail quá lớn. Vui lòng up hình dưới 800kb");

                    $('.thumb').val("");
                }
            }
            
        });

    });

</script>
@endsection