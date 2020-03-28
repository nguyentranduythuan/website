@extends('layouts.client_login')

@section('pageTitle', "Login")

@section('content')

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-horizontal form-without-legend" role="form" id="form-login" method="post" accept="#">
        {!! csrf_field() !!}
        <h3 class="form-title">Đăng nhập</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>
            Vui lòng nhập email và mật khẩu </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mã bảo mật</label>
            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITEKEY') }}"></div>
        </div>
        <div class="form-actions">
            <button type="submit" id="btn_submit" class="btn btn-success uppercase">Đăng nhập</button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#form-login").submit(onSubtmitLogin);
    });

    function onSubtmitLogin(e)
    {
        $("#btn_submit").hide();

        e.preventDefault();
        showLoading();

        $.ajax({
            url: $(this).attr("action"), 
            type : "POST", 
            dataType : 'json', 
            data : $(this).serialize(), 
            success : function(result) {
                
                hideLoading();

                if(result.status)
                {
                    setTimeout(function(){location.href = "{{ url('/client') }}";}, 500);
                }
                else
                {
                    showAlert(result.message);
                    grecaptcha.reset();
                    $("#btn_submit").show();
                }
            },
            error: function(xhr, resp, text) {

                hideLoading();
                
                console.log(xhr, resp, text);
                grecaptcha.reset();
                showAlert(text);
                $("#btn_submit").show();
            }
        });

        return false;
    }

    function onloadCallbackCaptcha()
    {
        
    }
</script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection