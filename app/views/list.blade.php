@extends('_master')

@section('title')
	View all tasks
@stop

@section('content')

	<h1>Tasks List</h1>

	<a href='/create'>+ Add New Task</a> | <a href='/CompleteList'>View Completed Tasks</a> | <a href='/IncompleteList'>View Incomplete Tasks</a>
	
	@if ($tasks->isEmpty())
        <p>There are no tasks!</p>
    @else
        <table border="5" bordercolor="maroon" bgcolor="silver" cellpadding="10" >
            <thead>
                <tr>
                    <th>Completed?</th>
                    <th>Task</th>
                    <th>Created Date</th>
                    <th>Completed Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td align="center">{{ $task->completion_status ? 'Yes' : 'No' }}</td>
                  

                    <td>{{ $task->taskname }}</td>
                    <td align="center">{{ $task->creation_date }}</td>
                   
                    @if($task->completion_status)
                        <td align="center">{{ $task->completion_date }}</td>
                    @else
                        <td align="center"> ----------- </td>
                    @endif
 
                    <td align="center" >
                        <a href="{{ action('TasksController@edit', $task->id) }}" >Edit</a>
                        <a href="{{ action('TasksController@delete', $task->id) }}" >Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
	
@stop
