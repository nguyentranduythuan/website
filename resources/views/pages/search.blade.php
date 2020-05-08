@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Kết quả tìm kiếm</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- blog grid -->
<section class="blog-grid blog-page news-section">
    <div class="container">
        <div class="row">
            <h3>Từ khóa tìm kiếm</h3>
            
            @foreach($services as $service)
            <div class="col-md-4 col-sm-6 col-xs-12 news-column">
                <div class="single-item">
                    <div class="single-item-overlay">
                        <div class="img-box">
                           {{--  <img src="{{ asset('uploads/'.$service->image) }}" alt=""> --}}
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="content">
                                        <li><a href="{{ url('/service-detail/'.$service->slug) }}.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h3><a href="{{ url('/service-detail/'.$service->slug) }}.html">{{ $service->name }}</a></h3>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>
                                @php
                                    $date = date_create($service->created_at);
                                    echo date_format($date,'M d Y');
                                @endphp
                                <li>
                            
                            
                            {{-- <li><i class="fa fa-tag"></i>{{ $blog->blogcate->name }}</li> --}}
                            
                            {{-- <li><i class="fa fa-comments-o"></i>{{ $blog->comment->count() }} Comments</li> --}}
                        </ul>
                        <div class="text">
                            <p>
                                @php
                                    $substr = substr($service->description, 0, 100);
                                    echo $substr.'...';
                                @endphp
                            </p>
                        </div>
                        <div class="button">
                            <a href="{{ url('/service-detail/'.$service->slug) }}.html" class="btn-one">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

           {{--  <div class="clearfix" style="margin-left: 700px;">{{$services->appends(request()->input())->links()}}</div> --}}

        {{-- <ul class="link-btn centered">
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul> --}}
        {{-- <div class="clearfix">
            {{ $blogs->links() }}
        </div> --}}
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