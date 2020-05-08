@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Blog Grid</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- blog grid -->
<section class="blog-grid blog-page news-section">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ asset('uploads/blog/'.$blog->image) }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details/'.$blog->slug) }}.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details/'.$blog->slug) }}.html">{{ $blog->name }}</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>
                                @php
                                    $date = date_create($blog->created_at);
                                    echo date_format($date,'M d Y');
                                @endphp
                                <li>
                            
                            
                            <li><i class="fa fa-tag"></i>{{ $blog->blogcate->name }}</li>
                            
                            <li><i class="fa fa-comments-o"></i>{{ $blog->comment->count() }} Comments</li>
                        </ul>
                        <div class="text">
                            <p>
                                @php
                                    $substr = substr($blog->description, 0, 100);
                                    echo $substr.'...';
                                @endphp
                            </p>
                        </div>
                         
                        <ul class="list">
                           @foreach ($tags as $tag)
                            <li><a href="{{ url('tag/'.$tag->slug) }}.html">{{ $tag->name }}</a></li>
                            {{-- <li><a href="#">Business</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Sports</a></li> --}}
                             @endforeach
                        </ul>
                        
                        
                        <div class="button">
                            <a href="{{ url('/blog-details/'.$blog->slug) }}.html" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/2.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Save money for future</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Jan 25, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/3.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Improve your business</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Jan 25, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/4.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Plan For Your Future</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Feb 06, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/5.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Future Planning Service</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Feb 25, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
           {{--  <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/6.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Experts Consultation</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Mar 15, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/7.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">Project growth analysis</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Apr 10, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/8.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">MARKETING STRATEGY</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>Apr 30, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/news/9.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/blog-details.html') }}"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/blog-details.html') }}">WEALTH MANAGEMENT</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>May 15, 2018</li>
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
                            <a href="{{ url('/blog-details.html') }}" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <ul class="link-btn centered">
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul> --}}
        <div class="clearfix">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
<!-- blog grid end -->

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