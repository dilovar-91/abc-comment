<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (Request::is('dealer/*')) 
    {$after_title = '';} 
    else {$after_title = 'список автосалонов России';}
    ?>
    <title>@yield('title') | <?=$after_title ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/assets/img/favicon.ico">
  
    <link href="/assets/css/vendors.css" rel="stylesheet">
	<link href="/assets/css/style.css" rel="stylesheet">
</head>

<body> 
<div id="app">   
@include('includes.header')  
@yield('content')
@include('includes.footer')
</div>
<button class="scroll-top"></button>    
@stack('before-scripts')
<script src="/js/app.js"></script>
<script src="/assets/js/vendors.js" type="application/javascript"></script>   
<script src="/assets/js/active.js" type="application/javascript"></script>
@stack('after-scripts')
</body>
</html>