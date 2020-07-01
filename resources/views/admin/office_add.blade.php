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
                <a href="{{ url('/cms/support/lists') }}">Support</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Add</a>
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
                        <i class="fa fa-gift"></i>Add
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
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="title" data-required="1" class="form-control" value="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Address <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="address" data-required="1" class="form-control" value="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Phone <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="phone" data-required="1" class="form-control" value="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Email <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    <input required data-bv-notempty-message="The Name is required and cannot be empty" type="text" name="email" data-required="1" class="form-control" value="" />
                                </div>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3">Thumbnail (800 x 368)</label>
                                <div class="col-md-6">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 300px; max-height: 138px;">
                                            <img src="http://www.placehold.it/800x368/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 138px;">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new">Chọn hình </span>
                                                <span class="fileinput-exists">Đổi hình </span>
                                                <input type="file" class="thumb" name="thumb"/>
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Xóa hình </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3">Content <span class="required"> * </span></label>
                                <div class="col-md-9">
                                    <textarea class="ckeditor" cols="80" id="" name="content" rows="40"></textarea>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3">Trạng thái <span class="required"> * </span></label>
                                <div class="col-md-4">
                                    <div class="radio-list">
                                        <label><input type="radio" name="is_active" value="0"/>Không hoạt động</label>
                                        <label><input type="radio" name="is_active" value="1" checked="checked" />Hoạt động</label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Add</button>
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