@extends('layouts.master')

@section('pageTitle', "Service")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Service Details</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- service details -->
<section class="service-details">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar-side">
                <div class="sidebar">
                    <ul class="list">
                        {{-- <li><a href="#" class="active">Financial Planning</a></li> --}}
                        @foreach ($serviceCates as $cate)
                            <li><a href="{{ url('category-service/'.$cate->slug) }}.html">{{ $cate->name }}</a></li>
                        @endforeach
                        
                        {{-- <li><a href="#">Investment Planning</a></li>
                        <li><a href="#">Taxes Advisory</a></li>
                        <li><a href="#">Trust Investment</a></li>
                        <li><a href="#">Stock Marketing</a></li>
                        <li><a href="#">Wealth Management</a></li>
                        <li><a href="#">Mutual Funds</a></li> --}}
                    </ul>
                    {{-- <div class="call centered">
                        <h5>Have Any Questions?</h5>
                        <p>Call Us:</p>
                        <h3><i class="fa fa-phone">0098453987</i></h3>
                    </div> --}}
                    {{-- <div class="download">
                        <a href="#">Download Brochure PDF <i class="fa fa-download"></i></a>
                        <a href="#">Download Brochure Doc <i class="fa fa-download"></i></a>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                <div class="sidebar-details">
                    <div class="img-box">
                        <figure><img src="{{ asset('uploads/'.$serviceDetail->image) }}" alt=""></figure>
                    </div>
                    <div class="content-one">
                        <div class="sec-title">
                            <h2>{{ $serviceDetail->title }}</h2>
                        </div>
                        <div class="text">
                            <p>{{ $serviceDetail->description }}</p>
                            <p>{{ $serviceDetail->content }}</p>
                        </div>
                    </div>
                    {{-- <div class="content-two">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 column">
                                <div class="strategy-content">
                                    <div class="sec-title-two">MARKETING STRATEGY</div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitazaa. fsdssd Curabitur libero eni lacinia finibus ante et, imaperdiet finibus risus. Donec malesuadaluctus elit naaacec hendrerit. Integer ex sap ien, ds eleifend sit amet tellus ut, porttitor dict um velit. Nulla dssd ads scelerisque, nisl euasaszz maximus bibendum nibh risus eleifen ex, a nulla.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 column">
                                <div class="pie_chart">
                                    <canvas id="doughnut-chartBox" width="510" height="260"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="content-three">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 column">
                                <div class="faq-content">
                                    <div class="sec-title-two">Business Growth Strategies</div>
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
                                        <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                            <div class="acc-btn">
                                                <h6>Why Would a Successful Entrepreneur Hire a Coach?</h6>
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
                            <div class="col-md-12 col-sm-12 col-xs-12 column">
                                <div class="sec-title-two">Free Consultation</div>
                                <div class="call-back-form">
                                    <form method="post" action="contact.html">
                                        <input type="text" name="name" placeholder="Your Name" required="">
                                        <input type="email" name="email" placeholder="Your Email" required="">
                                        <textarea placeholder="Your Message" name="message" required=""></textarea>
                                        <div class="button">
                                            <button type="submit" class="btn-one">Send Request</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service details end -->

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