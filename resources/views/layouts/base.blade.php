<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{ route('mainPage')}}">
    <title>{{$title}}</title>
    
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/coolblue.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>-->
    
    
    @yield('head_styles')
        
    @yield('head_scripts')
   
</head>

<body id="top">
    <div class="container">
        <div class="row col-sm-12">
        <!--header -->
        @yield('header')
        <!--/header-->
        </div>
        <div class="row col-sm-12">
        <!-- content-wrap -->
        @yield('content')
        <!-- /content-out -->
        </div>
        <div class="row col-sm-12">
        <!-- extra -->
        @yield('footer_first')
        <!-- /extra -->
        </div>
        <div class="row col-sm-12">
        <!-- footer -->
        @yield('footer_second')
        <!-- /footer -->
        </div>
    </div>

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/script.js"></script>
</body>
</html>


