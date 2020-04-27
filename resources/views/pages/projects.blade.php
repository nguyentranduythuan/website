@extends('layouts.master')

@section('pageTitle', "Projects")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<section class="page-title centered" style="background-image: url({{ URL::asset('assets/images/about/bg.jpg') }});">
    <div class="container">
        <div class="content-box">
            <div class="title">Project Gallery</div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- project section -->
<section class="project-grid project-gallery-view gallery-page">
    <div class="container">
        <ul class="post-filter centred art-vmenu">
            @foreach($projectcates as $projectcate)
            <li><a href="{{ url('category-project/'.$projectcate->slug) }}.html" title="">
                {{ $projectcate->name }}
            </li></a>
            @endforeach
            {{-- @foreach ($projectcates as $projectcate) --}}
{{--             <li data-filter=".Consulting">
                <span>{{ $projectcate->name }}Consulting</span>
            </li> --}}
            {{-- @endforeach --}}
            {{-- <li data-filter=".Finance">
                <span>Finance</span>
            </li> --}}
            {{-- <li data-filter=".Marketing">
                <span>Marketing</span>
            </li> --}}
            {{-- <li data-filter=".Growth">
                <span>Growth</span>
            </li> --}}
        </ul>
        {{-- <div id="products">
            <ul>
            @foreach ($projectCates as $aa)
                <img src="{{ asset('uploads/project/'.$aa->image) }}" alt="">
            @endforeach
            </ul>
        </div> --}}
        <div class="row masonary-layout filter-layout">
            <div id="products">
                
            
            @foreach($projects as $project)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="imghvr-strip-vert-bottom-right">
                            <img src="{{ asset('uploads/project/'.$project->image) }}" alt="">
                            <figcaption>
                                <div class="box">
                                    <div class="content">
                                        <a href="{{ url('/project-detail/'.$project->slug) }}.html"><i class="fa fa-link"></i></a>
                                        <a href="{{ asset('uploads/project/'.$project->image) }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            @endforeach
            </div>
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item Consulting">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/11.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/11.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item Finance Growth">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/12.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/12.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item Marketing Finance">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/13.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/13.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item Consulting Marketing">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/14.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/14.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item video">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/15.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/15.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item video">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/16.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/16.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12 filter-item video">
                <div class="inner-box">
                    <figure class="imghvr-strip-vert-bottom-right">
                        <img src="{{ URL::asset('assets/images/gallery/17.jpg') }}" alt="">
                        <figcaption>
                            <div class="box">
                                <div class="content">
                                    <a href="{{ url('/project-details.html') }}"><i class="fa fa-link"></i></a>
                                    <a href="{{ URL::asset('assets/images/gallery/17.jpg') }}" class="lightbox-image"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
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
            {{ $projects->links() }}
        </div>
    </div>
</section>
<!-- project section end -->

{!! App\Http\Controllers\ModuleController::box_bye_now() !!}

@endsection

@section('scripts')
<!-- jQuery lightbox js -->
<script src="{{ URL::asset('assets/js/html5lightbox/html5lightbox.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('assets/js/Chart.min.js') }}"></script>
<!-- jQuery isotop js -->
<script src="{{ URL::asset('assets/js/isotope.js') }}"></script>
{{-- Prorject by ProjectCategory --}}

@endsection

{{-- @push('script')
<script>
    $(document).ready(function() {
        @foreach ($projectcates as $cate)
            $('#cate{{ $cate->id }}').click(function(event) {
                var cate = $('#cate{{ $cate->id }}').val();
                //alert(cate);
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '{{ url('category-project') }}',
                    data: 'id=' + cate,
                    success:function(response){
                        console.log(response);
                        $('#products').html(response);
                    }
                });
        });
        @endforeach
    });
</script>
@endpush --}}

@section('style')
<style type="text/css">

</style>
@endsection