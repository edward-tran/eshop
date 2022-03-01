<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap5.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/product_detail.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/cart.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/checkout.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/user-detail.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/js/checkout.js') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap5.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
</head>
<body style="background-color: #a8abc1;">
    @include('layouts.inc.home_nav')
    @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
    @endif
    <div class="content" style="height:100%; position:relative;">
        @yield('content')
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    @yield('scripts')
    <script>
        var data = [];
        $.ajax({
            type: "GET",
            url: "/product-list",
            success: function (response) {
                //console.log(response);
                startAutoComplete(response);
            }
        });
        function startAutoComplete(data){
            $("#search-product").autocomplete({
            source: data
            });
        }
    </script>
</body>
</html>
