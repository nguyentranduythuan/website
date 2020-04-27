@extends('layouts.master')

@section('pageTitle', "Service")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">DỊCH VỤ</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- service section -->
<section class="our-service service-page">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ asset('uploads/'.$service->image) }}" alt="">
                        <div class="overlay">
                            <a href="{{ url('service-detail/'.$service->slug) }}.html" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-growth"></i></div>
                        <h4><a href="{{ url('service-detail/'.$service->slug) }}.html">{{ $service->title }}</a></h4>
                        <div class="text"><p>
                            @php
                                $a = url('service-detail/'.$service->slug).'.html';
                                $substr = substr($service->description, 0, 70);
                                echo $substr.'...<a href="'.$a.'">Xem thêm</a>';
                            @endphp
                        </p></div>
                    </div>
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
        <div>
            <div class="clearfix">
                    {{ $services->links() }}
            </div>
            {{-- <div class="clearfix">
                
            </div> --}}
        </div>
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