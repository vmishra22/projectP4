<!doctype html>
<html>
<head>

	<title>@yield('title','TaskSheet')</title>
	
<!-- 	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> -->
	<link rel="stylesheet" href="styles/taskStyle.css" type="text/css">
	
	@yield('head')
	
</head>

<body>

	@if(Auth::check())
    <a href='/logout'>Log out {{ Auth::user()->username; }}</a>
	@else 
	    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
	@endif

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<!-- <a href='/'><img class='logo' src='<?php echo URL::asset('/images/TDL.png'); ?>' alt='TDL Logo'></a> -->

	@yield('content')
	
	@yield('body')
		
</body>

</html>