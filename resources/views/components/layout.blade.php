<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <meta charset="utf-8" />
    <title>I&CA Book Store | {{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}">
    <!-- plugin css -->
    <link href="{{ asset('assets/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- Bootstrap Css -->
    <link  id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}"  rel="stylesheet" type="text/css" />
    <link  id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
{{-- Added by tapas 05-12-2023 --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('include.header')
        @include('include.sidebar')
        {{ $body }}
        @include('include.footer')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/alertify.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/js/rater.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
        <!-- apexcharts -->
        <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
        <!-- for basic area chart -->
        <script src="{{ asset('assets/js/stock-prices.js') }}"></script>
        <!-- for github style chart -->
        <script src="{{ asset('assets/js/github-data.js') }}"></script>
        <!-- for irregular timeseries chart -->
        <script src="{{ asset('assets/js/irregular-data-series.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <!-- Vector map-->
        <script src="{{ asset('assets/js/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/js/world-merc.js') }}"></script>
        <!-- swiper js -->
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/all.init.js') }}"></script>
        <script src="{{ asset('assets/js/pages/apexcharts-boxplot.init.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/method.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>


</body>

</html>
