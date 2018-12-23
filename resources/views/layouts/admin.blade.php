<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>{{ config('app.name', 'Mandan Bismarck Homes for Sale') }}</title>
    <link rel="apple-touch-icon" href="{{asset('club_admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('club_admin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/checkboxes-radios.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/gallery.css')}}">
    <!-- END STACK CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    @yield('add_css')

</head>
<body class="horizontal-layout horizontal-menu 2-columns menu-expanded" data-open="click" data-menu="horizontal-menu" data-col="2-columns">

@include('includes.admin_header')

@include('includes.admin_searchbox')
@yield('content')

@include('includes.admin_footer')


<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->

{{--<script src="https://cdn.logrocket.io/LogRocket.min.js" crossorigin="anonymous"></script>--}}
{{--<script>window.LogRocket && window.LogRocket.init('kfxfxq/gardner-real-estate');</script>--}}

@yield('add_custom_script')

</body>
</html>