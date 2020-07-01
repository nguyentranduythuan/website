<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('frontent/img/favicon.png') }}">

        <title>SRC</title>

        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href='{{ asset('frontent/fonts/fonts.css') }}' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- WOW -->
        <link href="{{ asset('frontent/css/animate.css') }}" rel="stylesheet">
        <!--OWL carousel-->
        <link rel="stylesheet" href="{{ asset('frontent/css/owl.carousel.css') }}">
        <!-- Custom styles for this template -->
        <link href="{{ asset('frontent/css/style.css') }}" rel="stylesheet">

    </head>

    <body>

        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a data-to="banner" class="navbar-brand" href="#"><img class="img-responsive" src="{{ asset('frontent/img/logo.png') }}" /></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right text-uppercase">
                        <li><a class="active" data-to="banner" href="#">home</a></li>
                        <li><a data-to="about" href="#">about</a></li>
                        <li><a data-to="service" href="#">services</a></li>
                        <li><a data-to="port" href="#">portfolio</a></li>
                        <li><a data-to="client" href="#">clients</a></li>
                        <li><a data-to="footer" href="#">contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->

            </div>
        </nav>


        @foreach($banners as $banner)
        <section class="section-banner" style="background-image:url({{ asset('uploads/banner/'.$banner->logo) }});">
            <div class="container-fluid text-center">

                <img class="img-responsive center-block wow fadeIn" data-wow-delay=".4s" src="{{ asset('uploads/banner/'.$banner->image) }}" />
                <h2 class="text-uppercase wow fadeIn" data-wow-delay="1s" >{{ $banner->title }} </h2>
                
            </div>
        </section>
        @endforeach
        
        @foreach($abouts as $about)
        <section class="section-about">
            <div class="container text-center">
                <h2 class="text-uppercase wow fadeIn">{{ $about->title }}</h2>
                <div class="row wow fadeIn">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <p><h6 style="font-size: 15px;">{!! $about->content !!}</h6>.</p>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
        
        @foreach($about_infos as $info)
        <section class="section-masterpiece" style="background-image:url({{ asset('frontent/img/masterpieceBg.jpg') }});">
            <div class="container text-center">
                <h3 class="text-uppercase wow fadeIn">{{ $info->title }}</h3>
                <div class="row">
                    @foreach($info->content as $content)
                    <div class="col-sm-4 block wow fadeInUp">
                        <img class="center-block img-responsive" src="{{ asset('uploads/aboutcontent/'.$content->image) }}" />
                        <p class="text-uppercase">{{ $content->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach
        
        @foreach($company as $com)
        <section class="section-glance">
            <div class="container text-center">
                <h3 class="text-uppercase wow fadeIn">{{ $com->title }}</h3>
                <p class="wow fadeIn">{!! $com->description !!}</p>
                <div class="row">
                    @foreach($com->content as $content)
                    <div class="col-md-4 col-sm-6 block wow flipInY">
                        <h1>{!! $content->name !!}</h1>
                        <img class="center-block img-responsive" src="{{ asset('uploads/company_content/'.$content->image) }}" />
                        <p><h6 style="font-size: 15px;">{!! $content->content !!}</h6></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach
        
        @foreach($achievement as $info)
        <section class="section-partner">
            <div class="container text-center">
                <h5 class="wow fadeIn">{{ $info->title }}</h5>
                <div class="row wow fadeIn" data-wow-delay=".4s">
                    @foreach($info->content as $content)
                    <div class="col-sm-6">
                        <img class="center-block img-responsive" src="{{ asset('uploads/achievement_content/'.$content->image) }}"/>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach

       
        <section class="section-detail">
            <div class="container text-center">
                 @foreach($jobs as $job)
                <h3 class="text-uppercase wow fadeIn">{{ $job->title }}</h3>
                <p class="wow fadeIn" data-wow-delay=".2s">{!! $job->description !!}</p>
                @endforeach
                
                <div class="row">
                    
                    <div class="col-sm-4 block wow zoomIn">
                        <div>
                            <h6 class="detail-number">1</h6>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('frontent/img/detail_0004_Layer-3.png') }});">{{ $jobcontent1->title }}</h5>
                            <div class="clearfix"></div>
                            <div class="detail-text">
                                <p>
                                    {!! $jobcontent1->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 block wow zoomIn" data-wow-delay=".3s">
                        <div>
                            <h6 class="detail-number">2</h6>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('frontent/img/detail_0003_Layer-2.png') }});">{{ $jobcontent2->title }}</h5>
                            <div class="clearfix"></div>
                            <div class="detail-text">
                                <p>
                                    {!! $jobcontent2->content !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 block wow zoomIn" data-wow-delay=".6s">
                        <div>
                            <h6 class="detail-number">3</h6>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('frontent/img/detail_0002_Layer-4.png') }});">{{ $jobcontent3->title }}</h5>
                            <div class="clearfix"></div>
                            <div class="detail-text">
                                <p>
                                    {!! $jobcontent3->content !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2 block wow zoomIn" data-wow-delay=".3s">
                        <div>
                            <h6 class="detail-number">4</h6>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('frontend/img/detail_0001_Layer-5.png') }});">{{ $jobcontent4->title }}</h5>
                            <div class="clearfix"></div>
                            <div class="detail-text">
                                <p>
                                    {!! $jobcontent4->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 block wow zoomIn" data-wow-delay=".6s">
                        <div>
                            <h6 class="detail-number">5</h6>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('frontent/img/detail_0000_Layer-1.png') }});">{{ $jobcontent5->title }}</h5>
                            <div class="clearfix"></div>
                            <div class="detail-text">
                                <p>
                                    {!! $jobcontent5->content !!}
                                </p>
                        </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </section>
        
        
        @foreach($benefits as $benefit)
        <section class="section-benefit">
            <div class="container text-center">
                <h3 class="text-uppercase wow fadeIn">{{ $benefit->title }}</h3>
                <div class="row">
                    @foreach($benefit->content as $content)
                    <div class="col-md-4 col-sm-6 block text-center wow fadeInUp">
                        <img class="center-block img-responsive" src="{{ asset('uploads/benefit/'.$content->image) }}" />
                        <p>{!! $content->content !!}</p>
                    </div>
                    @endforeach
                    {{-- <div class="col-md-4 col-sm-6 block text-center wow fadeInUp" data-wow-delay=".3s">
                        <img class="center-block img-responsive" src="img/benefit_0004_Layer-2.png" />
                        <p>Cost Operational efficiency</p>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-6 block text-center wow fadeInUp" data-wow-delay=".6s">
                        <img class="center-block img-responsive" src="img/benefit_0003_Layer-3.png" />
                        <p></p>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-6 block text-center wow fadeInUp" data-wow-delay=".3s">
                        <img class="center-block img-responsive" src="img/benefit_0002_Layer-4.png" />
                        <p>Manage projects in a highly visible way</p>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-6 block text-center wow fadeInUp" data-wow-delay=".6s">
                        <img class="center-block img-responsive" src="img/benefit_0001_Layer-5.png" />
                        <p>We are experts in to a very high spec</p>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-6 block text-center wow fadeInUp" data-wow-delay=".9s">
                        <img class="center-block img-responsive" src="img/benefit_0000_Layer-6.png" />
                        <p>Love long-term relationships &amp; evolve to get better</p>
                    </div> --}}
                </div>
                <img class="line-break img-responsive center-block wow fadeIn" src="{{ asset('frontent/img/line.png') }}" />
            </div>
        </section>
        @endforeach

        <section class="section-service">
            <div class="container text-center">
                <h2 class="text-uppercase wow fadeIn">services</h2>
                <div class="service-item wow fadeIn" data-wow-delay=".3s">
                    <img class="img-responsive" src="{{ asset('uploads/service_top/'.$service1->image) }}" />
                    <h5 class="text-capitalize">{{ $service1->title }}</h5>
                </div>
                <div class="service-item wow fadeIn" data-wow-delay=".6s">
                    <img class="img-responsive" src="{{ asset('uploads/service_top/'.$service2->image) }}" />
                    <h5 class="text-capitalize">{{ $service2->title }}</h5>
                </div>
                <div class="service-item wow fadeIn" data-wow-delay=".9s">
                    <img class="img-responsive" src="{{ asset('uploads/service_top/'.$service3->image) }}" />
                    <h5 class="text-capitalize">{{ $service3->title }}</h5>
                </div>
                <div class="service-item wow fadeIn" data-wow-delay="1.2s">
                    <img class="img-responsive" src="{{ asset('uploads/service_top/'.$service4->image) }}" />
                    <h5 class="text-capitalize">{{ $service4->title }}</h5>
                </div>
                <div class="service-center wow fadeIn">
                    <img class="img-responsive" src="{{ asset('uploads/service_top/'.$service5->image) }}" />
                    <h5 class="text-uppercase">{{ $service5->title }}</h5>
                </div>
            </div>
        </section>

        <section class="section-explain">
            <div class="container">
                <div class="row">
                    @foreach($servicebots as $service)
                    <div class="col-md-6 block wow fadeInLeft">
                        <div>
                            <h5 class="black-title text-uppercase" style="background-image:url({{ asset('uploads/service_bot/'.$service->image) }});">{{ $service->title }}</h5>
                            <p>{!! $service->content !!}.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <img class="line-break img-responsive center-block wow fadeIn" src="{{ asset('frontent/img/line.png') }}" />
            </div>
        </section>
        
        
        <section class="section-port">
            <div class="container">
                <h2 class="text-uppercase text-center wow fadeIn">portfolio</h2>
                <?php 
                $index = 0;
                $xhtml = '';
                    foreach ($portfollios as $porfolio) 
                    {
                        
                        
                        $linkBigImage = asset('uploads/portfollio/'.$porfolio->image.'');
                        $linkSmallImage = asset('uploads/logo/'.$porfolio->logo.'');
                        if($index %2 == 0)
                        {
                            
                            $xhtml .= '<div class="row">
                                        <div class="col-sm-6 wow fadeInUp">
                                            <img class="img-responsive" src="'.$linkBigImage.'" />
                                        </div>
                                        <div class="col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                                            <h5 class="text-uppercase">'.$porfolio->title.'</h5>
                                            <img class="img-responsive" src="'.$linkSmallImage.'" />
                                            <p>'.$porfolio->content.'</p>
                                        </div>
                                    </div>
                                    <hr/>';
                        }
                        else if($index %2 != 0)
                        {
                            //dd("gffdgfdgfdgfdghfdgfdgfd");
                            $xhtml .= '<div class="row">
                                        <div class="col-sm-6 col-sm-push-6 wow fadeInUp">
                                            <img class="img-responsive" src="'.$linkBigImage.'" />
                                        </div>
                                        <div class="col-sm-6 col-sm-pull-6 wow fadeInUp" data-wow-delay=".3s">
                                            <h5 class="text-uppercase">'.$porfolio->title.'</h5>
                                            <img class="img-responsive" src="'.$linkSmallImage.'" />
                                            <p>'.$porfolio->content.'</p>
                                        </div>
                                    </div>

                                    <hr/>';
                        }
                    ++$index;
        }
    ?>
            {!! $xhtml !!}
                <img class="line-break img-responsive center-block wow fadeIn" src="{{ asset('frontent/img/line.png') }}" />
                <button class="more-btn center-block text-center wow fadeInDown">
                    <p class="text-uppercase">more</p>
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>
            
        </section>
        

        <section class="section-client">
            @foreach($clients as $client)
            <div class="container text-center">
                <h2 class="text-uppercase wow fadeIn">clients</h2>
                <p class="wow fadeInUp" data-wow-delay=".3s">{{ $client->title }}</p>
                <div class="client-carousel owl-carousel wow fadeInLeft">
                    @foreach($client->content as $content)
                    <div class="client-logo"><img class="img-responsive" src="{{ asset('uploads/client/'.$content->image) }}" /></div>
                    @endforeach
                </div>
                <div class="client-dots-container"></div>
            </div>
            @endforeach
        </section>

        <footer class="section-footer wow fadeIn" style="background-image:url({{ asset('frontent/img/footerBg.jpg') }});">
            <div class="container text-center">
                <div class="row">
                    @foreach($contacts as $contact)
                    <div class="col-sm-4">
                        <img class="center-block img-responsive" src="{{ asset('uploads/contact/'.$contact->image) }}" />
                        <h5 class="text-uppercase">{{ $contact->name }}</h5>
                        <p>
                            {!! $contact->description !!}
                        </p>
                    </div>
                    @endforeach

                    {{-- <div class="col-sm-4">
                        <img class="center-block img-responsive" src="img/footerIcon2.png" />
                        <h5 class="text-uppercase">call us</h5>
                        <p>(+84) 08 62885033</p>
                    </div>  --}}

                    {{-- <div class="col-sm-4">
                        <img class="center-block img-responsive" src="img/footerIcon3.png" />
                        <h5 class="text-uppercase">mail us</h5>
                        <p>contact@srcvn.com</p>
                    </div> --}}
                </div>
            </div>
        </footer>

        <div class="loader">
            <img src="{{ asset('frontent/img/loading.gif') }}" />
        </div>

        <!--Scripts links-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontent/js/wow.min.js') }}"></script>
        <script>
            new WOW().init();
        </script>
        <script src="{{ asset('frontent/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontent/js/script.js') }}"></script>

    </body>
</html>