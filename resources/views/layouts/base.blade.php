<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{ route('mainPage')}}">
    <title>{{$title}}</title>
    
    <link rel="stylesheet" type="text/css" media="screen" href="/css/coolblue.css" />

    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>

    <script src="js/scrollToTop.js"></script>
    @section('head_styles')
    @show
    
    @section('head_scripts')
    @show
    
</head>

<body id="top">

<!--header -->
@section('header')
@show
<!--/header-->

	
<!-- content-wrap -->
@section('content')
@show

<!-- /content-out -->

<!-- extra -->
@section('footer_first')
@show
<!-- /extra -->

<!-- footer -->
@section('footer_second')
@show

<!-- /footer -->
</body>
</html>


