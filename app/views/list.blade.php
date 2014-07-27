@extends('_master')

@section('title')
	View all tasks
@stop

@section('content')

	<h1>Tasks List</h1>

	<a href='/create'>+ Add New Task</a>
	
	@if ($tasks->isEmpty())
        <p>There are no tasks! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Created Date</th>
                    <th>Completed Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->taskname }}</td>
                    <td>{{ $task->creation_date }}</td>
                    <td>{{ $task->completion_date }}</td>
                    <td>
                        <a href="{{ action('TasksController@edit', $task->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('TasksController@delete', $task->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
	
@stop
