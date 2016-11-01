<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('meta')

    <title>
        @section('title')
            Laravel
        @show
        {{--@yield('title', 'Laravel')--}}

    </title>

    <!-- Bootstrap Core CSS -->
    {{--<link href="assests/css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="assests/css/font-awesome.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="assests/css/bootstrap-theme.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="assests/css/jquery.validate.css" rel="stylesheet" type="text/css">--}}

    {{--{!! HTML::style( asset('assests/css/bootstrap.min.css')) !!}--}}




    {!! Html::style('assests/css/bootstrap.min.css') !!}
    {!! Html::style('assests/css/bootstrap-theme.css') !!}
    {!! Html::style('assests/css/font-awesome.min.css') !!}
    {!! Html::style('assests/css/jquery.validate.css') !!}


    {{--{{ Html::style('laravelfiles/assests/css/bootstrapValidator.min.css') }}--}}

    @yield('styles')

    <!-- Custom CSS -->
    {{--<link href="assests/css/simple-sidebar.css" rel="stylesheet" type="text/css">--}}

    {!! Html::style('assests/css/simple-sidebar.css') !!}


    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->

    {{--<![endif]-->--}}


    {!! Html::script('assests/js/respond.min.js') !!}
    {!! Html::script('assests/js/html5shiv.js') !!}


    <!-- jQuery -->

    {{--<script src="assests/js/jquery.js"></script>--}}


    {{--<script src="assests/js/jquery-1.11.0.min.js" type="text/javascript" ></script>--}}
    {{--<script src="assests/js/jquery.validate.js" type="text/javascript" ></script>--}}
    {{--<script src="assests/js/jquery.validation.functions.js" type="text/javascript" ></script>--}}

    {{--{{ Html::script('laravelfiles/assests/js/jquery.js') }}--}}
    {!! Html::script('assests/js/jquery.min.js') !!}
    {!! Html::script('assests/js/jquery.validate.js') !!}
    {!! Html::script('assests/js/jquery.validation.functions.js') !!}
    {!! Html::script('assests/js/audio.js') !!}

    @yield('scripts')


    <!-- Bootstrap Core JavaScript -->

    {{--<script src="assests/js/bootstrap.min.js" type="text/javascript" ></script>--}}

    {!! Html::script('assests/js/bootstrap.min.js') !!}

    {{--{{ Html::script('laravelfiles/assests/js/bootstrapValidator.min.js') }}--}}

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>





</head>


