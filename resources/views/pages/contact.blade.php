@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Contact</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- contact info -->
<section class="contact-info-section contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 column">
                <div class="single-item">
                    <h4>Main Office</h4>
                    <div class="text">Newyork City</div>
                    <div class="phone"><i class="fa fa-phone"></i>350006892995</div>
                    <div class="mail"><i class="fa fa-envelope"></i>info@tallentsolution</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 column">
                <div class="single-item">
                    <h4>Corporate Office</h4>
                    <div class="text">Los Angeles</div>
                    <div class="phone"><i class="fa fa-phone"></i>350006892995</div>
                    <div class="mail"><i class="fa fa-envelope"></i>info@tallentsolution</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 column">
                <div class="single-item">
                    <h4>Branch Office</h4>
                    <div class="text">San Fransisico</div>
                    <div class="phone"><i class="fa fa-phone"></i>350006892995</div>
                    <div class="mail"><i class="fa fa-envelope"></i>info@tallentsolution</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact info end -->


<!-- contact section -->
<section class="contact-section sec-pad contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 contact-column">
                <div class="title"><h2>Get in Touch</h2></div>
                <div id="message"></div>
                <div class="form">
                    <form name="contact_form" id="default-form" method="post" data-route="{{ route('postData') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" name="fullname" value="" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="email" name="email" value="" placeholder="Your Email">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <input type="text" name="phone" value="" placeholder="Your Phone" required="">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <input type="text" name="subject" value="" placeholder="Subject" required="">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <textarea placeholder="Message" name="message" required=""></textarea>
                            </div>
                            <div id="success"></div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <button type="submit" class="btn-one" data-loading-text="Please wait..." id="aaa">Send Message</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 map-column">
                <div class="google-map-area">
                    <div 
                        class="google-map" 
                        id="contact-google-map" 
                        data-map-lat="41.641264" 
                        data-map-lng="19.705595" 
                        data-icon-path="{{ URL::asset('assets/images/resources/map-marker.png') }}" 
                        data-map-title="Brooklyn, New York, United Kingdom" 
                        data-map-zoom="12" 
                        data-markers='{
                            "marker-1": [41.641264, 19.705595, "<h4>Branch Office</h4><p>77/99 London UK</p>","{{ URL::asset('assets/images/resources/map-marker.png') }}"]
                        }'>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact section end -->

{!! App\Http\Controllers\ModuleController::box_bye_now() !!}

@endsection
    
@push('script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  --}}<!-- or use local jquery -->
{{-- <script src="/js/jqBootstrapValidation.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js
" type="text/javascript" charset="utf-8" async defer></script>
<script>
    $(document).ready(function() {
        $('#default-form').submit(function(e){
            var route = $('default-form').data('route');
            var form_data = $(this);
            $('.alert').remove();
            $.ajax({
                    url: route,
                    method: 'POST',
                    data: form_data.serialize(),
                    success: function(Response){
                        console.log(Response);
                        if(Response.message){
                            $('#message').append('<div class="alert alert-success">'+Response.message+'</div>');
                        }
                    }
                });

            e.preventDefault();
        });    
    });
</script>
@endpush



@section('style')
<style type="text/css">

</style>
@endsection