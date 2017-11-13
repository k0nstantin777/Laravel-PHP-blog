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
    

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>
    @yield('head_styles')
        
    @yield('head_scripts')
   
</head>

<body id="top">

<!--header -->
@yield('header')
<!--/header-->
	
<!-- content-wrap -->
@yield('content')
<!-- /content-out -->

<!-- extra -->
@yield('footer_first')
<!-- /extra -->

<!-- footer -->
@yield('footer_second')
<!-- /footer -->
</body>
</html>


