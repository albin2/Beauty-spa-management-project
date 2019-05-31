<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Beauty And Spa</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <script src="{{ asset('theam/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js') }}"></script>
    <link rel="icon" href="{{ asset('theam/images/favicon.ico') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700">
    <link rel="stylesheet" href="{{ asset('theam/css/style.css') }}">
</head>

<body>
    <div class="page">
        <main class="page-content" id="perspective">
            <div class="content-wrapper">
                <div class="page-header page-header-perspective page-header-perspective-transparent">
                    <div class="page-header-left"><a class="brand" href="#">
                            <div class="brand-logo-default"><img src="{{ asset('theam/images/logo-default-199x36.png') }}" alt="" width="199" height="36" />
                            </div>
                            <div class="brand-logo-white"><img src="{{ asset('theam/images/papaya2.png') }}" alt="" width="200" height="36" />
                            </div>
                        </a></div>
                    <div class="page-header-right">
                    <div class="booking-control"><a class="btn btn-xs btn-circle btn-primary"  href="{{ route('login') }}">Login</a></div>

                        <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true"><span class="perspective-menu-text">Menu</span>
                            <button class="perspective-menu-toggle"><span></span></button>
                        </div>
                    </div>
                </div>
                <div id="wrapper">


                    @yield('content')

                    @include('userpages.components.sfooter')
                </div>
                <div id="perspective-content-overlay"></div>
            </div>
            <!-- RD Navbar-->

            @include('welcome.welcomenavebar')
        </main>
    </div>
    
    @yield('modals')
    
    <div class="snackbars" id="form-output-global"></div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__cent"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('theam/js/core.min.js') }}"></script>
    <script src="{{ asset('theam/js/script.js') }}"></script>

    <!--LIVEDEMO_00 -->

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7078796-5']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script');
            ga.type = 'theam/text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

</body>

</html> 