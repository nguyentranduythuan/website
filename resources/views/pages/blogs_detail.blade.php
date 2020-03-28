@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Blog Details</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- blog classiec -->
<section class="blog-details sidebar-page-container news-section blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 content-side">
                <div class="blog-details-content">
                    <div class="content-style-one">
                        <div class="single-item">
                            <div class="project-slid">
                            <div class="img-box"><figure><img src="{{ URL::asset('assets/images/gallery/d1.jpg') }}" alt=""></figure></div>
                            <div class="img-box"><figure><img src="{{ URL::asset('assets/images/gallery/d2.jpg') }}" alt=""></figure></div>
                            <div class="img-box"><figure><img src="{{ URL::asset('assets/images/gallery/d3.jpg') }}" alt=""></figure></div>
                        </div>
                        <div class="lower-content">
                            <h2>{{ $blogDetail->name }}</h2>
                            <ul class="meta">
                                <li><i class="fa fa-calendar"></i>Jun 15, 2018</li>
                                <li><i class="fa fa-tag"></i>Planning</li>
                                <li><i class="fa fa-comments-o"></i>3 Comments</li>
                            </ul>
                            <div class="text">
                                <p>{{ $blogDetail->description }}</p>
                                <p>{{ $blogDetail->content }}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="content-style-two">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 column">
                                <div class="img-box"><figure><img src="{{ URL::asset('assets/images/news/3.jpg') }}" alt=""></figure></div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 colunn">
                                <div class="text">
                                    <p>Eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                </div>
                                <ul class="list">
                                    <li>Morbi fermentum felis nec</li>
                                    <li>Morbi fermentum felis nec gravida tempus.</li>
                                    <li>Morbi fermentum felis nec gravida tempus.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="post-share-option">
                        <ul class="tags">
                            <li><h5>Tags:</h5></li>
                            <li><a href="#">Consulting</a> ,</li>
                            <li><a href="#">Financial</a> ,</li>
                            <li><a href="#">Business</a></li>
                        </ul>
                        <ul class="post-social">
                            <li><h5>Share:</h5></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        </ul>
                    </div>
                    <div class="comment-area">
                        <div class="title"><h3>Comment</h3></div>
                        <div class="single-comment">
                            <div class="img-box"><img src="{{ URL::asset('assets/images/news/c1.jpg') }}" alt=""></div>
                            <h5>Joss Butlar</h5>
                            <div class="date"><i class="fa fa-calendar"></i><p>24 Jun 2018</p></div>
                            <div class="text"><p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</p></div>
                            <a href="#">Replay</a>
                        </div>
                        <div class="single-comment replay">
                            <div class="img-box"><img src="{{ URL::asset('assets/images/news/c2.jpg') }}" alt=""></div>
                            <h5>Alex Jusika</h5>
                            <div class="date"><i class="fa fa-calendar"></i><p>10 Jul 2018</p></div>
                            <div class="text"><p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p></div>
                        </div>
                        <div class="single-comment">
                            <div class="img-box"><img src="{{ URL::asset('assets/images/news/c3.jpg') }}" alt=""></div>
                            <h5>Joss Martin</h5>
                            <div class="date"><i class="fa fa-calendar"></i><p>24 Sep 2018</p></div>
                            <div class="text"><p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</p></div>
                            <a href="#">Replay</a>
                        </div>
                    </div>
                    <div class="comment-box">
                        <div class="title"><h3>Your Comment</h3></div>
                        <div class="form">
                            <form action="contact.html" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <input type="text" name="name" value="" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <input type="email" name="email" value="" placeholder="Your Email" required="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <input type="text" name="subject" value="" placeholder="Subject" required="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <textarea placeholder="Message" name="message" required=""></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <button type="submit" class="btn-one">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="sidebar-search">
                        <form action="contact.html" method="post">
                            <input type="search" name="search-field" placeholder="Search...." required="">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-catagories">
                        <div class="title"><h3>Categories</h3></div>
                        <ul class="list">
                            <li><a href="#" class="active">Financial Services</a></li>
                            <li><a href="#">Industrial Goods & Services</a></li>
                            <li><a href="#">Investment Planning</a></li>
                            <li><a href="#">Corporate Interior</a></li>
                            <li><a href="#">Organization</a></li>
                            <li><a href="#">Customer Insights</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-post">
                        <div class="title"><h3>Recent News</h3></div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/news/p1.jpg') }}" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <ul class="content">
                                                <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h5><a href="blog-details.html">Finance & legal throughout project.</a></h5>
                            <div class="text"><i class="fa fa-calendar">16 Aug 2018</i></div>
                        </div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/news/p2.jpg') }}" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <ul class="content">
                                                <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h5><a href="blog-details.html">What Makes A Financial Service</a></h5>
                            <div class="text"><i class="fa fa-calendar">15 Sep 2018</i></div>
                        </div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/news/p3.jpg') }}" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <ul class="content">
                                                <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h5><a href="blog-details.html">How To Reduce Financial Stress</a></h5>
                            <div class="text"><i class="fa fa-calendar">25 Oct 2018</i></div>
                        </div>
                    </div>
                    <div class="sidebar-tag sidebar-wideget">
                        <div class="title"><h3>Popular Tags</h3></div>
                        <ul class="list clearfix">
                            <li><a href="#" class="active">Finance</a></li>
                            <li><a href="#">Expare</a></li>
                            <li><a href="#">Idea</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Growth</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-follow sidebar-wideget">
                        <div class="title"><h3>Follow Us</h3></div>
                        <ul class="social-list clearfix">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog details end -->

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