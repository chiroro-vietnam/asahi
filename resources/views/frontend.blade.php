<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<title>アサヒ産業株式会社</title>
<meta name="format-detection" content="telephone=no">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

 @yield('style')
    {!! HTML::style('frontend/css/import.css') !!}
    {!! HTML::style('frontend/css/common.css') !!}
    
@yield('script')
{!! HTML::script('frontend/js/jquery.cookie.js'); !!}
{!! HTML::script('frontend/js/jquery.bxslider.min.js'); !!}
{!! HTML::script('frontend/js/function.js'); !!}
{!! HTML::script('frontend/js/jquery.bxslider.min.js'); !!}
{!! HTML::script('frontend/js/top.js'); !!}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body id="ptop">
<!--    begin header-->
 @include('element/header')

<!--end header    -->
    
    
<!-- begin content -->
  @yield('content')
<!-- end content -->   
    
    
    
<!--bengin footer    -->
 @include('element/footer')
<!--end footer-->
</body>
</html>    
