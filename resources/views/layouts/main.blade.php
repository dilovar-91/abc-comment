<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php 
       if (Request::is('dealer/*')) {
        $after_title = '' ;
       }
        else {
            $after_title = 'список автосалонов России';
        } ?>

<title>@yield('title') | <?=$after_title ?></title>    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="/img/favicon.ico">
     <!-- Css compiled css -->
     <link rel="stylesheet" href="/css/app.css">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Modernizer js -->
    <script src="/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="/https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper" id="app">
        <!-- Main Header Area Start Here -->
        @include('includes.header')
        <!-- Main Header Area End Here -->        
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- Main Wrapper End Here -->
    @stack('before-scripts')
    <script src="/js/app.js"></script>
    <!-- jquery 3.2.1 -->
    <script src="/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="/js/main.js"></script>
    @stack('after-scripts')
</body>
</html>