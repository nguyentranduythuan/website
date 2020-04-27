@extends('layouts.master')

@section('pageTitle', "Dự án")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">{{ $cate->name }}</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- service section -->
<section class="our-service service-page">
    <div class="container">
        <div class="row" id="products">
            @foreach ($projects as $detail)
            <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="imghvr-strip-vert-bottom-right">
                            <img src="{{ asset('uploads/project/'.$detail->image) }}" alt="">
                            <figcaption>
                                <div class="box">
                                    <div class="content">
                                        <a href="{{ url('project-detail/'.$detail->slug) }}.html"><i class="fa fa-link"></i></a>
                                        <a href="{{ asset('uploads/project/'.$detail->image) }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/2.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-meeting"></i></div>
                        <h4><a href="service-details.html">Email Marketing</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/3.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-line-graph"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Google Ads</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/4.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-growth"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Facebook</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/5.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-meeting"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Youtube</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/6.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-line-graph"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Mobile</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/6.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-line-graph"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Cốc Cốc</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/6.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-line-graph"></i></div>
                        <h4><a href="service-details.html">Quảng cáo Zalo</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ URL::asset('assets/images/service/6.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="service-details.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-line-graph"></i></div>
                        <h4><a href="service-details.html">Content marketing</a></h4>
                        <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit</p></div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="clearfix" style="margin-left: 700px;">{{ $services->links() }}</div> --}}
    </div>

</section>
<!-- service section end -->

@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection