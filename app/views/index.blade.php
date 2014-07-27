@extends('_master')

@section('title')
	Welcome to To Do Task Master
@stop

@section('content')

	<h1>Welcome to To Do Task Master</h1>
	
	<br><br>
	
	<a href='/list'>View all Tasks</a> | 
	

	<br><br>
	
	<!-- {{ Form::open(array('url' => '/list', 'method' => 'GET')) }}

		{{ Form::label('query','Search for a book:') }} &nbsp;
		{{ Form::text('query') }} &nbsp;
		{{ Form::submit('Search!') }}
	
	{{ Form::close() }} -->
	
	
@stop

