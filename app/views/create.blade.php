@extends('_master')

@section('title')
	Create new task
@stop

@section('content')
    <a href='/'>Home</a>

    <h1>Create Task and someday finish it!</h1>

    <form action="{{ action('TasksController@handleCreate') }}" method="post" role="form">
    
        <label for="taskname">Task</label>
        <input type="text" name="taskname" /> <br> <br>

        <label for="creation_date">Creation Date</label>
        <input type="date" name="creation_date" /> <br> <br>

     <!--    <label for="completion_date">Completion Date</label>
        <input type="date"  name="completion_date" /> <br> <br> -->

        <input type="submit" value="Save!" />
        <a href="{{ action('TasksController@listTasks') }}" >Cancel</a>    
    </form>
    
@stop