<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="{{ asset('frontend/css/product_detail.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/cart.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/checkout.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/user-detail.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css')}}" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
    @include('layouts.inc.navbar')
    <div id="layoutSidenav">
        @include('layouts.inc.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('layouts.inc.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    
</body>
</html>
