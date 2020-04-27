@extends('layouts.master')

@section('pageTitle', "Projects")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Project Details</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- single-project -->
<section class="single-project sidebar-page-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar-side">
                <div class="sidebar">
                    <div class="sidebar-search sidebar-wideget">
                        <form action="contact.html" method="post">
                            <input type="search" name="search-field" placeholder="Search...." required="">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-catagories sidebar-wideget">
                        <div class="title"><h3>Categories</h3></div>
                        <ul class="list">
                            {{-- <li><a href="#" class="active">Financial Services</a></li> --}}
                            @foreach ($categories as $cate)
                                <li><a href="{{ url('category-project/'.$cate->slug) }}.html">{{ $cate->name }}</a></li>
                            @endforeach
                            
                            {{-- <li><a href="#">Investment Planning</a></li>
                            <li><a href="#">Corporate Interior</a></li>
                            <li><a href="#">Organization</a></li>
                            <li><a href="#">Customer Insights</a></li> --}}
                        </ul>
                    </div>
                    <div class="sidebar-post sidebar-wideget">
                        <div class="title"><h3>Recent News</h3></div>

                        <div class="post-area">
                            @foreach ($blogs as $blog)
                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ asset('uploads/blog/'.$blog->image) }}" alt="" style="width: 90px;"></figure>
                                        <div class="overlay">
                                            <div class="inner-box">
                                                <ul class="content">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <h5><a href="blog-details.html">{{ $blog->name }}</a></h5>
                                <div class="text">24 Jun 2018</div>
                            </div>
                            @endforeach
                            {{-- <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ URL::asset('assets/images/news/p2.jpg') }}" alt=""></figure>
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
                                <div class="text">14 Aug 2018</div>
                            </div> --}}
                            {{-- <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ URL::asset('assets/images/news/p3.jpg') }}" alt=""></figure>
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
                                <div class="text">20 Oct 2018</div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="sidebar-tag sidebar-wideget">
                        <div class="title"><h3>Product Tags</h3></div>
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
            <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                <div class="project-details-content">
                    <div class="project-slid">
                        <div class="img-box"><figure><img src="{{ asset('uploads/project/'.$projectDetail->image) }}" alt=""></figure></div>
                        <div class="img-box"><figure><img src="{{ URL::asset('assets/images/gallery/d2.jpg') }}" alt=""></figure></div>
                        {{-- <div class="img-box"><figure><img src="{{ URL::asset('assets/images/gallery/d3.jpg') }}" alt=""></figure></div> --}}
                    </div>
                    <div class="project-analysis">
                        {{-- <div class="sec-title-two">Project growth analysis</div> --}}
                        {{-- <div class="text">
                            <p>Projects evaluation and monitoring, maintanence compliance regulations and performing establisheed fact that a readers. Project it is a long establisheed fact that a readers will be ut distracted by that readable content of ut sed page when looking at its layout the point of usingl will be ut distracted by that readable.</p>
                        </div> --}}
                        {{-- <div class="groth">Project growth after our work</div> --}}
                        {{-- <div class="chart-box"><div id="chartbarTwo" style="height: 300px; width: 100%;"></div></div> --}}
                    </div>
                    <div class="project-result">
                        <div class="sec-title-two">{{ $projectDetail->title }}</div>
                        <div class="text">
                            <p>{{ $projectDetail->description }}.</p>
                        </div>
                        {{-- <ul class="list">
                            <li>Lorem ipsum dolor sit amet, adipiscing elitazaa.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elitazaa.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur elitazaa.</li>
                            <li>Lorem ipsum dolor sit,  adipiscing elitazaa.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elitazaa.</li>
                        </ul> --}}
                    </div>
                    <div class="related-project gallery-page">
                        <div class="sec-title-two">Related Projects</div>
                        <div class="row">
                            @foreach ($projects as $project)
                            <div class="col-md-6 col-sm-6 col-xs-12 filter-item">
                                <div class="single-item inner-box">
                                    <div class="single-item-overlay">
                                        <div class="img-box">
                                            <img src="{{ asset('uploads/project/'.$project->image) }}" alt="">
                                            <div class="overlay">
                                                <div class="inner-box">
                                                    <ul class="content">
                                                        <li><a href="#"><i class="fa fa-link"></i></a></li>
                                                        <li><a href="{{ asset('uploads/project/'.$project->image) }}" class="lightbox-image"><i class="fa fa-search"></i></a></li>
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="#">{{$project->title}}</a></h4>
                                        <div class="text"><p>{{ $project->description }}</p></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            {{-- <div class="col-md-6 col-sm-6 col-xs-12 filter-item Consulting">
                                <div class="single-item inner-box">
                                    <div class="single-item-overlay">
                                        <div class="img-box">
                                            <img src="{{ asset('uploads/project/'.$item->image) }}" alt="">
                                            <div class="overlay">
                                                <div class="inner-box">
                                                    <ul class="content">
                                                        <li><a href="#"><i class="fa fa-link"></i></a></li>
                                                        <li><a href="{{ asset('uploads/project/'.$item->image) }}" class="lightbox-image"><i class="fa fa-search"></i></a></li>
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="#">{{ $item->name }}</a></h4>
                                        <div class="text"><p>{{ $item->description }}</p></div>
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- single project end -->

{!! App\Http\Controllers\ModuleController::box_bye_now() !!}

@endsection

@section('scripts')
<!-- jQuery lightbox js -->
<script src="{{ URL::asset('assets/js/html5lightbox/html5lightbox.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('assets/js/Chart.min.js') }}"></script>
<!-- jQuery isotop js -->
<script src="{{ URL::asset('assets/js/isotope.js') }}"></script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection