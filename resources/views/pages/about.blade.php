@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Giới thiệu</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- about section -->
<section class="about-us sec-pad">
    <div class="container">
        <div class="about-title centred">
            <div class="section-title"><h2>GIỚI THIỆU</h2></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 about-column">
                @foreach ($abouts as $about)
                <div class="about-content">
                    <h3><span>{{ $about->title }}</span></h3>
                    <div class="text">
                        <p>{{ $about->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 about-column">
                <div class="video-gallery">
                    <img src="{{ URL::asset('assets/images/about/1.jpg') }}" alt="Awesome Video Gallery">
                    <div class="overlay-gallery">
                        <div class="icon-holder">
                            <div class="icon">
                                <a class="html5lightbox" title="Consulting" href="https://www.youtube.com/watch?v=Tb1HsAGy-ls"><img src="{{ URL::asset('assets/images/icons/play-btn.png') }}" alt="Play Button"/></a>   
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->


<!-- fact-counter section -->
<div class="fact-counter sec-pad centered">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="140">0</span><span> tr</span></div>
                        <div class="text">Thuê bao di động ở Việt Nam</div>
                    </article>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="100">0</span><span>%</span></div>
                        <div class="text">Đọc tin nhắn SMS</div>
                    </article>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="98">0</span><span>%</span></div>
                        <div class="text">Open text trong vòng 4 phút</div>
                    </article>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="95">0</span><span>%</span></div>
                        <div class="text">Đã thành công trong việc gửi SMS</div>
                    </article>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="70">0</span><span>%</span></div>
                        <div class="text">Trả lời chương trình khuyến mãi</div>
                    </article>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12 counter-colmun">
                <div class="single-item">
                    <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="99">0</span><span>%</span></div>
                        <div class="text">Truy câp cho người dùng mà không có internet</div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fact-counter section end -->


<!-- faq & Strategy development -->
<section class="faq-section strategy-section sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 faq-column">
                <div class="faq-content">
                    <div class="sec-title-two">CÂU HỎI THƯỜNG GẶP</div>
                    <div class="accordion-box">
                        <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn active">
                                <h6>What is the procedure to join with your company?</h6>
                                <div class="toggle-icon">
                                    <span class="plus fa fa-angle-right"></span><span class="minus fa fa-angle-down"></span>
                                </div>
                            </div>
                            <div class="acc-content collapsed">
                                <div class="text"><p>
                                    The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure. 
                                </p></div>
                            </div>
                        </div>
                        <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn">
                                <h6>Do you give any offer for premium customer?</h6>
                                <div class="toggle-icon">
                                    <i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="acc-content">
                                <div class="text"><p>
                                    The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure. 
                                </p></div>
                            </div>
                        </div>
                        <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn">
                                <h6>What makes you special from others?</h6>
                                <div class="toggle-icon">
                                    <i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="acc-content">
                                <div class="text"><p>
                                    The master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure. 
                                </p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 strategy-column">
                <div class="strategy-content">
                    <div class="sec-title-two">Strategy Develoment</div>
                    <div class="strategy-development">
                        <div id="area-chart" style="height: 350px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq & Strategy development end -->


<!-- choose us section -->
<section class="choose-us">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-clock"></i></div>
                    <h4>40 years of Experience</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-award"></i></div>
                    <h4>First Award for Best Service</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-solution"></i></div>
                    <h4>Global Solutions Service</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-meeting"></i></div>
                    <h4>Business Opportunities</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-business-partnership"></i></div>
                    <h4>Exclusive Partnerships</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 choose-column">
                <div class="single-item">
                    <div class="icon-box"><i class="flaticon-support"></i></div>
                    <h4>24/7 Online Support</h4>
                    <div class="text"><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipis civelit sed quia non qui dolorem ipsum quia dolor sit amet.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- choose us section end -->

<!-- team section -->
<section class="team-section sec-pad centered">
    <div class="container">
        <div class="team-title">
            <div class="section-title"><h2>ĐỘI NGỦ</h2></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 team-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/team/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><a href="#">Brown Angelino</a></h4>
                        <div class="text">President</div>
                        <div class="mail"><i class="fa fa-envelope-o"><a href="#">brown@tallent.com</a></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 team-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <figure><img src="{{ URL::asset('assets/images/team/2.jpg') }}" alt=""></figure>
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><a href="#">Venanda Bond</a></h4>
                        <div class="text">Founder</div>
                        <div class="mail"><i class="fa fa-envelope-o"><a href="#">venanda@tallent.com</a></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 team-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <figure><img src="{{ URL::asset('assets/images/team/3.jpg') }}" alt=""></figure>
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><a href="#">Astley Fletcher</a></h4>
                        <div class="text">Designer</div>
                        <div class="mail"><i class="fa fa-envelope-o"><a href="#">astley@tallent.com</a></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 team-column">
                <div class="single-item centred">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <figure><img src="{{ URL::asset('assets/images/team/4.jpg') }}" alt=""></figure>
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><a href="#">Bernett Rotty</a></h4>
                        <div class="text">Manager</div>
                        <div class="mail"><i class="fa fa-envelope-o"><a href="#">bernett@tallent.com</a></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team section end -->


{!! App\Http\Controllers\ModuleController::box_bye_now() !!}

@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection