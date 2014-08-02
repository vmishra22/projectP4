@extends('_master')

@section('title')
	Delete task
@stop

@section('content')

    <h1>Delete "{{ $task->taskname }}"" <small>Are you sure?</small></h1>

    <form action="{{ action('TasksController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="task" value="{{ $task->id }}" />
        <input type="submit" value="Yes" />
        <a href="{{ action('TasksController@listTasks') }}" class="btn btn-default">No way!</a>
    </form>
    
@stop