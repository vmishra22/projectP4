@extends('_master')

@section('title')
	Sign up
@stop

@section('content')

	<a href='/'>Home</a>
	<h1>Sign up</h1>
	
	{{ Form::open(array('url' => '/signup')) }}

	    {{-- Username field. ------------------------}}
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username') }}
		{{ $errors->first('username', '<span class="error">:message</span>') }}<br><br>

		{{ Form::label('firstname', 'First') }}
		{{ Form::text('firstname') }}<br><br>

		{{ Form::label('lastname', 'Last') }}
		{{ Form::text('lastname') }}<br><br>

		{{-- Email address field. -------------------}}
	    {{ Form::label('email', 'Email address') }}
		{{ Form::text('email') }}
		{{ $errors->first('email', '<span class="error">:message</span>') }}<br><br>
	
		{{-- Password field. ------------------------}}
	    {{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
		{{ $errors->first('password', '<span class="error">:message</span>') }}<br><br>
		
		{{ Form::submit('Submit') }}
	
	{{ Form::close() }}

@stop
