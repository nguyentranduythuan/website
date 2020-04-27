@extends('layouts.master')

@section('pageTitle', "Home")

@section('breadcrumb')
    
@endsection

@section('content')
<!--main slider-->
<section class="main-slider">
    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach($slides as $slide)
        <div class="slide" style="background-image:url({{ asset('uploads/slide/'.$slide->image ) }})">
            <div class="container">
                <div class="content">
                    <h1>{{ $slide->name }}</h1>
                    <div class="tp-btn">
                        <a href="#" class="btn-one">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</section>
<!-- main slider end -->
<!-- about section -->
<section class="about-us sec-pad">
    {{-- <div class="container">
        <div class="about-title centred">
            <div class="section-title">
                <h2>GIỚI THIỆU</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 about-column">
                <div class="about-content">
                    <h3><span>WeMarketing</span> là gì ?</h3>
                    <div class="text">
                        <p>WeMarketing cung cấp giải pháp marketing trực tiếp đến hàng trăm ngàn khách hàng thông qua tin nhắn SMS, mang lại hiệu quả cao với chi phí thấp và tiết kiệm thời gian cho doanh nghiệp.</p>
                        <p>Chúng tôi cam kết về chất lượng dịch vụ cũng như giá cả cạnh tranh để đảm bảo đem lại cho khách hàng trải nghiệm tốt nhất về hiệu quả tiếp thị.</p>
                        <p>WeMarketing được ra đời hướng đến các đối tượng doanh nghiệp doanh nghiệp vừa và nhỏ, các cửa hàng thực hiện các chương trình quảng cáo, tiếp thị một cách dễ dàng nhất, tiết kiệm thời gian nhất và hiệu quả nhất.</p>
                    </div>
                    <div class="button"><a href="{{ url('about.html') }}" class="btn-one">Xem thêm</a></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 about-column">
                <div class="img-box">
                    <figure><img src="{{ URL::asset('assets/images/about/1.jpg') }}" alt=""></figure>
                </div>
            </div>
        </div>
    </div> --}}
</section>
<!-- about section end -->
<!-- our idea -->
<section class="our-service sec-pad">
    <div class="container">
        <div class="idea-title centred">
            <div class="section-title">
                <h2>DỊCH VỤ</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4 col-sm-6 col-xs-12 service-column">
                <div class="single-item hoverly-one">
                    <figure class="img-box">
                        <img src="{{ asset('uploads/'.$service->image) }}" alt="">
                        <div class="overlay">
                            <a href="{{ url('service-detail/'.$service->slug) }}" class="btn-one">Xem thêm</a>
                        </div>
                    </figure>
                    <div class="lower-content">
                        <div class="icon-box"><i class="flaticon-growth"></i></div>
                        <h4><a href="service-details.html">{{ $service->title }}</a></h4>
                        <div class="text"><p>
                            @php
                                $substr = substr($service->description, 0, 30);
                                echo $substr;
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
    </div>
</section>
<!-- our idea end -->
@if(1==2)
<!-- our-skills & business-growth -->
<section class="skills-growth sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 skills-column">
                <div class="our-skills">
                    <div class="sec-title-two">Our Skills</div>
                </div>
                <div class="skills-content">
                    <div class="progress-levels">
                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="box-title">
                                <h6>Financial Planning</h6>
                            </div>
                            <div class="percent"></div>
                            <div class="inner">
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="bar-fill" data-percent="80"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-levels">
                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="box-title">
                                <h6>Social Marketing</h6>
                            </div>
                            <div class="percent"></div>
                            <div class="inner">
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="bar-fill" data-percent="70"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-levels">
                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="box-title">
                                <h6>Trust Investment</h6>
                            </div>
                            <div class="percent"></div>
                            <div class="inner">
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="bar-fill" data-percent="75"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-levels">
                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="box-title">
                                <h6>Stock Marketting</h6>
                            </div>
                            <div class="percent"></div>
                            <div class="inner">
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="bar-fill" data-percent="85"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-levels">
                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="box-title">
                                <h6>Wealth Management</h6>
                            </div>
                            <div class="percent"></div>
                            <div class="inner">
                                <div class="bar">
                                    <div class="bar-innner">
                                        <div class="bar-fill" data-percent="91"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-1 growth-colunm">
                <div class="growth-title">
                    <div class="sec-title-two">Business Growth</div>
                </div>
                <div class="chart-outer">
                    <div id="Chart1" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- our-skills & business-growth section end -->
@endif
<!-- latest project -->
<section class="latest-project sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 project-column">
                <div class="project-content">
                    <div class="sec-title-two">DỰ ÁN ĐÃ THỰC HIỆN</div>
                    <div class="text">
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                    </div>
                    <div class="button"><a href="{{ url('projects.html') }}" class="btn-one">Xem thêm</a></div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 project-column">
                <div class="two-column-carousel">
                    @foreach ($projects as $project)
                    <div class="inner-box">
                        <figure class="imghvr-strip-vert-bottom-right">
                            <img src="{{ asset('uploads/project/'.$project->image) }}" alt="">
                            <figcaption>
                                <div class="box">
                                    <div class="content">
                                        <a href="{{ url('project-detail/'.$project->slug) }}"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                    {{-- <div class="inner-box">
                        <figure class="imghvr-strip-vert-bottom-right">
                            <img src="{{ URL::asset('assets/images/gallery/2.jpg') }}" alt="">
                            <figcaption>
                                <div class="box">
                                    <div class="content">
                                        <a href="project-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest project end -->
<!-- cta section -->
<section class="cta-section sec-pad" style="background-image: url({{ URL::asset('assets/images/home/cta.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 cta-column">
                <div class="cta-content">
                    <div class="section-title centred">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    </div>
                    <div class="cta-form">
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <input type="text" name="name" value="" placeholder="Your Name" required="">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <input type="email" name="email" value="" placeholder="Your Email" required="">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <div class="select-box">
                                        <i class="fa fa-angle-down"></i>
                                        <select class="text-capitalize selectpicker form-control required" name="form_subject" data-style="g-select" data-width="100%">
                                            <option value="0" selected="">I Would like to Discuss</option>
                                            <option value="1">Business Planning</option>
                                            <option value="2">Insurence Planning</option>
                                            <option value="2">Wealth Management</option>
                                            <option value="2">Marketing Strategy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="phone" value="" placeholder="Your Phone" required="">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <div class="cta-btn centred"><button type="submit" class="btn-one">GỬI</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta section end -->
<!-- testimonials section -->
<section class="testimonials-section centred sec-pad">
    <div class="container">
        <div class="testimonials-title">
            <div class="section-title">
                <h2>KHÁCH HÀNG NÓI GÌ VỀ CHÚNG TÔI</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 testimonials-column">
                <div class="testimonials-slider">
                    <div class="testimonial-content">
                        <div class="content">
                            <div class="author-thumb"><img src="{{ URL::asset('assets/images/home/t1.png') }}" alt=""></div>
                            <div class="text">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                            </div>
                            <div class="author">
                                <h4>Edward Silverman</h4>
                                <p>Chairman</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="content">
                            <div class="author-thumb"><img src="{{ URL::asset('assets/images/home/t1.png') }}" alt=""></div>
                            <div class="text">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                            </div>
                            <div class="author">
                                <h4>Edward Silverman</h4>
                                <p>Chairman</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="content">
                            <div class="author-thumb"><img src="{{ URL::asset('assets/images/home/t1.png') }}" alt=""></div>
                            <div class="text">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit. Red quia numquam eius modi. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                            </div>
                            <div class="author">
                                <h4>Edward Silverman</h4>
                                <p>Chairman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonials section end -->
<!-- brand section -->
<section class="brand-section">
    <div class="container">
        <ul class="brand-slider">
            <li>
                <figure class="img-box"><a href="#"><img src="{{ URL::asset('assets/images/brand/1.png') }}" alt=""></a></figure>
            </li>
            <li>
                <figure class="img-box"><a href="#"><img src="{{ URL::asset('assets/images/brand/2.png') }}" alt=""></a></figure>
            </li>
            <li>
                <figure class="img-box"><a href="#"><img src="{{ URL::asset('assets/images/brand/3.png') }}" alt=""></a></figure>
            </li>
            <li>
                <figure class="img-box"><a href="#"><img src="{{ URL::asset('assets/images/brand/4.png') }}" alt=""></a></figure>
            </li>
            <li>
                <figure class="img-box"><a href="#"><img src="{{ URL::asset('assets/images/brand/5.png') }}" alt=""></a></figure>
            </li>
        </ul>
    </div>
</section>
<!-- brand section end -->
<!-- news section -->
<section class="news-section sec-pad">
    <div class="container">
        <div class="news-title centred">
            <div class="section-title">
                <h2>TIN TỨC MỚI CẬP NHẬT</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ asset('uploads/blog/'.$blog->image) }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="blog-details.html">{{ $blog->name }}</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Jun 15, 2018</li>
                            <li><i class="fa fa-tag"></i>{{ $blog->blogcate->name }}</li>
                            <li><i class="fa fa-comments-o"></i>3 Comments</li>
                        </ul>
                        <div class="text">
                            <p>
                                @php
                                $substr = substr($blog->description, 0, 70);
                                echo $substr.'...';
                            @endphp
                            </p>
                        </div>
                        <ul class="list">
                            @foreach ($tags as $tag)
                                <li><a href="{{ url('tag/'.$tag->slug) }}">{{ $tag->name }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Marketing</a></li> --}}
                            {{-- <li><a href="#">News</a></li> --}}
                            {{-- <li><a href="#">Sports</a></li> --}}
                        </ul>
                        <div class="button">
                            <a href="{{ url('blog-details/'.$blog->slug) }}" class="btn-one">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/3.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="blog-details.html">Save money for your future.</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Jul 15, 2018</li>
                            <li><i class="fa fa-tag"></i>Planning</li>
                            <li><i class="fa fa-comments-o"></i>3 Comments</li>
                        </ul>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtempor incid et dolore magna aliqu enim minim veniam quis nostrud exercittion ullamco laboris nisi ut aliquip excepteur sint occaecat cuidatat non proident sunt in culpa qui officia.</p>
                        </div>
                        <ul class="list">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Sports</a></li>
                        </ul>
                        <div class="button">
                            <a href="blog-details.html" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/2.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="blog-details.html">Improve your business growth</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Nov 15, 2018</li>
                            <li><i class="fa fa-tag"></i>Planning</li>
                            <li><i class="fa fa-comments-o"></i>7 Comments</li>
                        </ul>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtempor incid et dolore magna aliqu enim minim veniam quis nostrud exercittion ullamco laboris nisi ut aliquip excepteur sint occaecat cuidatat non proident sunt in culpa qui officia.</p>
                        </div>
                        <ul class="list">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Sports</a></li>
                        </ul>
                        <div class="button">
                            <a href="blog-details.html" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- news section end -->

{!! App\Http\Controllers\ModuleController::box_bye_now() !!}

@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection

@section('style')
<style type="text/css">
.min_h_160{
    min-height: 160px;
    display: block;
}
</style>
@endsection