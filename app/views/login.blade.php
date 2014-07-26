@extends('_master')

@section('title')
	Log in
@stop

@section('content')

	<h1>Log in</h1>
	
	{{ Form::open(array('url' => '/login')) }}
				
		{{-- Username field. ------------------------}}
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username') }}<br><br>
	
		{{-- Password field. ------------------------}}
	    {{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}<br><br>
		
		{{-- Password field. ------------------------}}
	    {{ Form::label('remember_token', 'Keep me signed in') }}
		{{Form::checkbox('remember_token', '1') }} <br><br>
		
		{{ Form::submit('Submit') }}
	
	{{ Form::close() }}
	
@stop
