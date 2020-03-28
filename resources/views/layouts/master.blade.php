<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('pageTitle') - WeMarketing.tech</title>
        <!-- Stylesheets -->
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ URL::asset('assets/css/custom/theme-wemarketing.css?v=10') }}"/>
        <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
        <script>
          window.Framework = {csrfToken: '{{ csrf_token() }}', sitekey:"{{ env('CAPTCHA_SITEKEY', '6LdlYpAUAAAAADPSckwnP1TuMEJoMHjxunRL1y-A') }}", tmk: {{ session()->has('user_id') ? session()->get('user_id') : 0}}};
          var HOT = "{{ url('/') }}";
      </script>
    </head>
    <!-- body wrapper -->
    <body class="body_wrapper">
        <!-- .preloader -->
        <div class="preloader"></div>
        <!-- /.preloader -->
        <!-- main header area -->
        <header class="main-header">
            <!-- header upper -->
            <div class="header-upper">
                <div class="container">
                    <div class="top-left">
                        <div class="text">Welcome to We Marketing</div>
                    </div>
                    <div class="top-right">
                        <ul class="top-bar">
                            <li><i class="fa fa-phone"></i>Phone: 0944.22.3879</li>
                            <li><i class="fa fa-envelope"></i>hotro@wemarketing.tech</li>
                        </ul>
                        @if(1==2)
                        <div class="language-switcher">
                            <div id="polyglotLanguageSwitcher" class="">
                                <form action="#">
                                    <select id="polyglot-language-options">
                                        <option id="en" value="en" selected>English</option>
                                        <option id="fr" value="fr">French</option>
                                        <option id="de" value="de">German</option>
                                        <option id="it" value="it">Italian</option>
                                        <option id="es" value="es">Spanish</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end header upper -->
            <!-- header lower/fixed-header -->     
            <div class="theme_menu stricky">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo-box">
                                <a href="{{ url('/') }}"></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="menu-bar">
                                <nav class="main-menu">
                                    <div class="navbar-header">     
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse collapse clearfix">
                                        <ul class="navigation clearfix">
                                            <li class="{{ \Request::route()->getName() == 'index' ? 'current' : '' }}"><a href="{{ url('/') }}">Trang chủ</a></li>
                                            <li class="{{ \Request::route()->getName() == 'about' ? 'current' : '' }}"><a href="{{ url('/about.html') }}">Giới thiệu</a></li>
                                            <li class="{{ \Request::route()->getName() == 'service' ? 'current' : '' }}"><a href="{{ url('/service.html') }}">Dịch vụ</a></li>
                                            <li class="{{ \Request::route()->getName() == 'projects' ? 'current' : '' }}"><a href="{{ url('/projects.html') }}">Dự án</a></li>
                                            <li class="{{ \Request::route()->getName() == 'blog' ? 'current' : '' }}"><a href="{{ url('/blog.html') }}">Tin tức</a></li>
                                            <li class="{{ \Request::route()->getName() == 'contact' ? 'current' : '' }}"><a href="{{ url('/contact.html') }}">Liên Hệ</a></li>
                                        </ul>
                                        <!-- mobile menu -->
                                        <ul class="mobile-menu clearfix">
                                            <li class="{{ \Request::route()->getName() == 'index' ? 'current' : '' }}"><a href="{{ url('/') }}">Trang chủ</a></li>
                                            <li class="{{ \Request::route()->getName() == 'about' ? 'current' : '' }}"><a href="{{ url('/about.html') }}">Giới thiệu</a></li>
                                            <li class="{{ \Request::route()->getName() == 'service' ? 'current' : '' }}"><a href="{{ url('/service.html') }}">Dịch vụ</a></li>
                                            <li class="{{ \Request::route()->getName() == 'projects' ? 'current' : '' }}"><a href="{{ url('/projects.html') }}">Dự án</a></li>
                                            <li class="{{ \Request::route()->getName() == 'blog' ? 'current' : '' }}"><a href="{{ url('/blog.html') }}">Tin tức</a></li>
                                            <li class="{{ \Request::route()->getName() == 'contact' ? 'current' : '' }}"><a href="{{ url('/contact.html') }}">c</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="search-box-area">
                                    <div class="search-toggle"><i class="fa fa-search"></i></div>
                                    <div class="search-box">
                                        <form method="post" action="index.html">
                                            <div class="form-group">
                                                <input type="search" name="search" placeholder="Tìm kiếm" required>
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header lower/fixed-header -->
        </header>
        <!-- end main header area -->
        

        @yield('content')

        <!-- main-footer area -->
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-column">
                        <div class="logo-wideget footer-wideget">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}"></a>
                            </div>
                            <div class="text">
                                <p>Tallent consulting over 20 years of experience we’ll ensure you always get the best guidance. We serve a clients at every level of their organization, in whatever capacity we can be most useful, whether as a trusted advisor.</p>
                            </div>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 footer-column">
                        <div class="service-wideget footer-wideget">
                            <div class="footer-title">
                                <h4>Dịch vụ</h4>
                            </div>
                            <ul class="list">
                                <li><a href="#">Startups Help</a></li>
                                <li><a href="#">Customer Insights</a></li>
                                <li><a href="#">Advanced Analytics</a></li>
                                <li><a href="#">Export Promotions</a></li>
                                <li><a href="#">Business Photography</a></li>
                                <li><a href="#">Brand Development</a></li>
                                <li><a href="#">Public Relations</a></li>
                                <li><a href="#">User Infographics</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                        <div class="news-wideget footer-wideget">
                            <div class="footer-title">
                                <h4>Tin mới</h4>
                            </div>
                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ URL::asset('assets/images/footer/1.jpg') }}" alt=""></figure>
                                        <div class="overlay">
                                            <div class="inner-box">
                                                <ul class="content">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6><a href="blog-details.html">What Makes A Financial Website</a></h6>
                                <div class="text">24 Jun 2018</div>
                            </div>
                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ URL::asset('assets/images/footer/2.jpg') }}" alt=""></figure>
                                        <div class="overlay">
                                            <div class="inner-box">
                                                <ul class="content">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6><a href="blog-details.html">How To Reduce Financial Stress</a></h6>
                                <div class="text">25 Aug 2018</div>
                            </div>
                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <figure><img src="{{ URL::asset('assets/images/footer/3.jpg') }}" alt=""></figure>
                                        <div class="overlay">
                                            <div class="inner-box">
                                                <ul class="content">
                                                    <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6><a href="blog-details.html">What Makes A Financial Service</a></h6>
                                <div class="text">10 Sep 2018</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-column">
                        <div class="contact-wideget footer-wideget">
                            <div class="footer-title">
                                <h4>Liên hệ</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-item">
                                    <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                                    <div class="text">
                                        <p>436A/71 đường Ba Tháng Hai, Phường 12, Quận 10, Thành phố Hồ Chí Minh, Việt Nam</p>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="fa fa-phone"></i></div>
                                    <div class="text">
                                        <p>Phone: 0944223879</p>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="fa fa-envelope"></i></div>
                                    <div class="text">
                                        <p>Email: hotro@wemarketing.tech</p>
                                    </div>
                                </div>
                            </div>
                            @if(1==2)
                            <div class="subscribe-area">
                                <div class="footer-title">
                                    <h4> Newsletter</h4>
                                </div>
                                <div class="input-box">
                                    <form action="contact.html" method="post">
                                        <input type="email" name="email" placeholder="Email Address" required="">
                                        <button type="submit"><i class="icon fa fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->
        <!-- footer bottom -->
        <section class="footer-bottom">
            <div class="container">
                <div class="copyright">Copyright © <a href="#">We Marketing</a> 2020. All rights reserved.</div>
                <ul class="footer-card clearfix">
                    <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                    <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                    <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                    <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                    <li><a href="#"><i class="fa fa-cc-stripe"></i></a></li>
                </ul>
            </div>
        </section>
        <!-- footer bottom end -->
        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>
        <!--jquery js -->
        <!-- jqurey -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.4.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- Style-switcher  -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/jQuery.style.switcher.min.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
        <!-- jQuery ui js -->
        <script src="{{ URL::asset('assets/js/jquery-ui.js') }}"></script>
        <!-- jQuery fancybox js -->
        <script src="{{ URL::asset('assets/js/jquery.fancybox.pack.js') }}"></script> 
        <!-- jQuery wow js -->
        <script src="{{ URL::asset('assets/js/wow.js') }}"></script>
        <!-- jQuery contact form js -->
        <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
        <!-- jQuery select menu js -->
        <script src="{{ URL::asset('assets/js/bootstrap-select.min.js') }}"></script>
        <!-- jQuery smooth scroll js -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/SmoothScroll.js') }}"></script>
        <!-- jQuery language switcher js -->
        <script src="{{ URL::asset('assets/js/jquery.polyglot.language.switcher.js') }}"></script>
        <!-- jQuery canvas js -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.canvasjs.min.js') }}"></script> 
        <script src="{{ URL::asset('assets/js/charts-script.js') }}"></script>
        <!-- js main js-->
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        <!-- End of .page_wrapper -->

        @yield('style')

        @yield('scripts')

        @stack('script')

    </body>
</html>