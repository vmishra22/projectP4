<?php

class TasksController extends BaseController {

	public function listTasks()
    {
        // Show a listing of games.
        $tasks = Task::where('user_id', '=', Auth::user()->id)->get();
        return View::make('list', compact('tasks'));
    }

    public function listIncompleteTasks()
    {
        // Show a listing of games.
        $tasks = Task::where('user_id', '=', Auth::user()->id)
        			->where('completion_status', '=', 0)
        			->get();
        return View::make('IncompleteList', compact('tasks'));
    }

    public function listCompleteTasks()
    {
        // Show a listing of games.
        $tasks = Task::where('user_id', '=', Auth::user()->id)
        			->where('completion_status', '=', 1)
        			->get();
        return View::make('CompleteList', compact('tasks'));
    }

    public function create()
    {
        // Show the create game form.
        return View::make('create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
     	$task = new Task;
	    $task->taskname = Input::get('taskname');
	    $task->creation_date = Input::get('creation_date');
	    //$task->completion_date = Input::get('completion_date');
	    $task->user()->associate(Auth::user());
	    $task->save();

	    return Redirect::action('TasksController@listTasks');
    }

    public function edit(Task $task)
    {
        // Show the edit game form.
        return View::make('edit', compact('task'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
          // Handle edit form submission.
		$task = Task::findOrFail(Input::get('id'));
		$task->completion_status = Input::has('completion_status');
		$task->taskname        = Input::get('taskname');
		$task->creation_date = Input::get('creation_date');
	    $task->completion_date = Input::get('completion_date');
		$task->save();

		return Redirect::action('TasksController@listTasks');
    }

    public function delete(Task $task)
    {
        // Show delete confirmation page.
        return View::make('delete', compact('task'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('task');
        $task = Task::findOrFail($id);
        $task->delete();

        return Redirect::action('TasksController@listTasks');
    }

}
