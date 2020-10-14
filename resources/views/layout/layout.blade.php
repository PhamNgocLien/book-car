<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Cardoor - Car Rental HTML Template</title>

    <!--=== Bootstrap CSS ===-->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{asset('template/css/plugins/slicknav.min.css')}}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{asset('template/css/plugins/magnific-popup.css')}}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{asset('template/css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{asset('template/css/plugins/gijgo.css')}}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{asset('template/css/font-awesome.css')}}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{asset('template/css/reset.css')}}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{asset('template/css/responsive.css')}}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

<!--== Preloader Area Start ==-->
@include('layout/preloader')
<!--== Preloader Area End ==-->

<!--== Header Area Start ==-->
@include('layout/header')
@yield('menu-bar')
<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
@include('layout/content')
<!--== Page Title Area End ==-->

<!--== Content ==-->
@yield('content')
<!--== Content ==-->

<!--== Footer Area Start ==-->
@include('layout/footer')
<!--== Footer Area End ==-->

<!--== Scroll Top Area Start ==-->
@include('layout/scroll')
<!--== Scroll Top Area End ==-->

<!--=======================Javascript============================-->
<!--=== Jquery Min Js ===-->
<script src="{{asset('template/js/jquery-3.2.1.min.js')}}"></script>
<!--=== Jquery Migrate Min Js ===-->
<script src="{{asset('template/js/jquery-migrate.min.js')}}"></script>
<!--=== Popper Min Js ===-->
<script src="{{asset('template/js/popper.min.js')}}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<!--=== Gijgo Min Js ===-->
<script src="{{asset('template/js/plugins/gijgo.js')}}"></script>
<!--=== Vegas Min Js ===-->
<script src="{{asset('template/js/plugins/vegas.min.js')}}"></script>
<!--=== Isotope Min Js ===-->
<script src="{{asset('template/js/plugins/isotope.min.js')}}"></script>
<!--=== Owl Caousel Min Js ===-->
<script src="{{asset('template/js/plugins/owl.carousel.min.js')}}"></script>
<!--=== Waypoint Min Js ===-->
<script src="{{asset('template/js/plugins/waypoints.min.js')}}"></script>
<!--=== CounTotop Min Js ===-->
<script src="{{asset('template/js/plugins/counterup.min.js')}}"></script>
<!--=== YtPlayer Min Js ===-->
<script src="{{asset('template/js/plugins/mb.YTPlayer.js')}}"></script>
<!--=== Magnific Popup Min Js ===-->
<script src="{{asset('template/js/plugins/magnific-popup.min.js')}}"></script>
<!--=== Slicknav Min Js ===-->
<script src="{{asset('template/js/plugins/slicknav.min.js')}}"></script>

<!--=== Mian Js ===-->
<script src="{{asset('template/js/main.js')}}"></script>

</body>

</html>
