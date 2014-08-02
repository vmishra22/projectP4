@extends('_master')

@section('title')
	Welcome to To Do Task Master
@stop

@section('content')

	<h1>Welcome to Task Master</h1>
	
	<br><br>
	
	@if(Auth::check())
		<a href='/list'>View all Tasks</a> | <a href='/IncompleteList'>View Incomplete Tasks</a> | <a href='/CompleteList'>View Completed Tasks</a>
	@endif

	<br><br>

	
@stop

