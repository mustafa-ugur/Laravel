<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Ionicons Font CSS-->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- font awesome CSS-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Animate CSS-->
	<link rel="stylesheet" href="/css/animate.css">
	<!-- UI CSS-->
	<link rel="stylesheet" href="/css/jquery-ui.min.css">
	<!-- Chosen CSS-->
	<link rel="stylesheet" href="/css/chosen.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="/css/meanmenu.min.css">
	<!-- Fancybox CSS-->
	<link rel="stylesheet" href="/css/jquery.fancybox.css">
	<!-- Normalize CSS-->
	<link rel="stylesheet" href="/css/normalize.css">
	<!-- Nivo Slider CSS-->
	<link rel="stylesheet" href="/css/nivo-slider.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<!-- EasyZoom CSS-->
	<link rel="stylesheet" href="/css/easyzoom.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="/css/slick.css">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- Default CSS -->
	<link rel="stylesheet" href="/css/default.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="/css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

    <div class="wrapper">
        @include('bolum.header')
        @yield('content')
        @include('bolum.footer')
    </div>



<!--All Js Here-->

<!--Jquery 1.12.4-->
<script src="/js/vendor/jquery-1.12.4.min.js"></script>
<!--Popper-->
<script src="/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="/js/bootstrap.min.js"></script>
<!--Imagesloaded-->
<script src="/js/imagesloaded.pkgd.min.js"></script>
<!--Isotope-->
<script src="/js/isotope.pkgd.min.js"></script>
<!--Ui js-->
<script src="/js/jquery-ui.min.js"></script>
<!--Countdown-->
<script src="/js/jquery.countdown.min.js"></script>
<!--Counterup-->
<script src="/js/jquery.counterup.min.js"></script>
<!--ScrollUp-->
<script src="/js/jquery.scrollUp.min.js"></script>
<!--Chosen js-->
<script src="/js/chosen.jquery.js"></script>
<!--Meanmenu js-->
<script src="/js/jquery.meanmenu.min.js"></script>
<!--Instafeed-->
<script src="/js/instafeed.min.js"></script>
<!--EasyZoom-->
<script src="/js/easyzoom.min.js"></script>
<!--Fancybox-->
<script src="/js/jquery.fancybox.pack.js"></script>
<!--Nivo Slider-->
<script src="/js/jquery.nivo.slider.js"></script>
<!--Waypoints-->
<script src="/js/waypoints.min.js"></script>
<!--Carousel-->
<script src="/js/owl.carousel.min.js"></script>
<!--Slick-->
<script src="/js/slick.min.js"></script>
<!--Wow-->
<script src="/js/wow.min.js"></script>
<!--Plugins-->
<script src="/js/plugins.js"></script>
<!--Main Js-->
<script src="/js/main.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.urun-adet-artir, .urun-adet-azalt').on('click', function () {
            var id = $(this).attr('data-id');

            var adet = $(this).attr('data-adet');

            $.ajax({
                type: 'PATCH',
                url: '/sepet/guncelle/' + id,
                data: { adet: adet },
                success: function success(result) {
                    window.location.href = '/sepet';
                }
            });
        });
    </script>
</body>
</html>
