
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0e3c85">
    <link rel="icon" href="{{asset('frontend/')}}gallery/Logo-Option-fav.png">
    <title>@yield('title')</title>

    <!-- materailizeicon -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

    <!-- bootstrap icon -->

    <link rel="stylesheet" href="{{asset('frontend/node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">

    <!-- animate -->
    <!-- <link rel="stylesheet" href="./css/animate.css"> -->

    <!-- slick -->
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick/slick.css')}}">


    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/node_modules/bootstrap/dist/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>

    <!-- style -->

    @if(Request::is('/'))
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @else
        {{--<link rel="stylesheet" href="{{asset('frontend/css/otherstyle.css')}}">--}}
        <link rel="stylesheet" href="{{asset('frontend/css/otherpage.css')}}">
    @endif



    @stack('css')

</head>


<body>


@include('frontend.layouts.ggg-header')
@include('frontend.layouts.header')


    @yield('content')

@include('frontend.layouts.gggfooter')



<!--jquery  -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="https://kit.fontawesome.com/021b940a03.js" crossorigin="anonymous"></script>

<!-- slick -->
<script type="text/javascript" src="{{asset('frontend/css/slick/slick.min.js')}}"></script>


<!-- bootstrap -->
<script type="text/javascript" src="{{asset('frontend/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- commom js -->



<script type="text/javascript" src="{{asset('frontend/js/commonjs.js')}}"></script>
@stack('script')

</body>
</html>
