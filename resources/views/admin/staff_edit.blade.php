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
                <a href="{{ url('/cms/staff/lists') }}">Staff</a>
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
                                <label class="control-label col-md-3">Email <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="email" data-required="1" class="form-control" value="{{ $content->email }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Thumbnail (800 x 368)</label>
                                <div class="col-md-6">
                                    <div class="fileinput @if(!empty($content->image)) fileinput-exists @else fileinput-new @endif" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 300px; max-height: 138px;">
                                            <img src="http://www.placehold.it/800x368/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 138px;">
                                            @if(!empty($content->image))
                                                <img src="{{ url('uploads/staff/'.$content->image) }}" style="max-width: 300px; max-height: 138px;" />
                                            @endif
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new">Chọn hình </span>
                                                <span class="fileinput-exists">Đổi hình </span>
                                                <input type="file" class="thumb" name="thumb" required data-bv-notempty-message="The Thumbnail is required and cannot be empty"/>
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Xóa hình </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Position <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <textarea class="" rows="2" cols="80" id="" name="position">{!! $content->position !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Profile Link <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <textarea class="" rows="2" cols="80" id="" name="link">{!! $content->link !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Cập nhật</button>
                                    <a href="{{ url('cms/staff/lists') }}" class="btn default">Hủy</a>
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