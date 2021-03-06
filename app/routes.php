<?php


// Bind route parameters.
Route::model('task', 'Task');

// Show pages.
Route::get('/list', array('before' => 'auth', 'uses' => 'TasksController@listTasks'));
Route::get('/IncompleteList', array('before' => 'auth', 'uses' => 'TasksController@listIncompleteTasks'));
Route::get('/CompleteList', array('before' => 'auth', 'uses' => 'TasksController@listCompleteTasks'));
//Route::get('/', 'TasksController@list');
Route::get('/create', 'TasksController@create');
Route::get('/edit/{task}', 'TasksController@edit');
Route::get('/delete/{task}', 'TasksController@delete');

// Handle form submissions.
Route::post('/create', 'TasksController@handleCreate');
Route::post('/edit', 'TasksController@handleEdit');
Route::post('/delete', 'TasksController@handleDelete');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});


/*-------------------------------------------------------------------------------------------------
// !get signup
-------------------------------------------------------------------------------------------------*/
Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);


/*-------------------------------------------------------------------------------------------------
// !post signup
-------------------------------------------------------------------------------------------------*/
Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

        	$data = Input::all();

			// Build the validation constraint set.
        	$rules = array(
        		'username' => 'alpha_num|unique:users,username|required|min:3|max:32',
        		'email' => 'email|required|unique:users,email',
        		'password' => 'required|min:3'
    		);

        	// Create a new validator instance.
    		$validator = Validator::make($data, $rules);

    		if ($validator->passes()) {
	            $user = new User;
	            $user->email    = Input::get('email');
	            $user->password = Hash::make(Input::get('password'));
	            $user->username    = Input::get('username');
	            $user->firstname    = Input::get('firstname');
	            $user->lastname    = Input::get('lastname');

	            # Try to add the user 
	            try {
	                $user->save();
	            }
	            # Fail
	            catch (Exception $e) {
	                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
	            }

	            # Log the user in
	            Auth::login($user);

	            return Redirect::to('/')->with('flash_message', 'Welcome to Task Master!');
        	}
        	else
        		return Redirect::to('/signup')->withErrors($validator);

        }
    )
);

/*-------------------------------------------------------------------------------------------------
// !get logout
-------------------------------------------------------------------------------------------------*/
Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});


/*-------------------------------------------------------------------------------------------------
// !get login
-------------------------------------------------------------------------------------------------*/
Route::get('/login',
	array(
		'before' => 'guest',
		function() {
			return View::make('login');
		}
	)
);

/*-------------------------------------------------------------------------------------------------
// !post login
-------------------------------------------------------------------------------------------------*/
Route::post('/login', array('before' => 'csrf', function() {
	
	$credentials = Input::only('username', 'password');

	$remember = Input::get('remember_token');
	
	if (Auth::attempt($credentials, $remember = true)) {
		return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
	}
	else {
		return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
	}
	
	return Redirect::to('login');
	
}));

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

// Route::get('mysql-test', function() {

//     # Use the DB component to select all the databases
//     $results = DB::select('SHOW DATABASES;');

//     # If the "Pre" package is not installed, you should output using print_r instead
//     return Pre::render($results);

// });

// Route::get('/trigger-error',function() {

//     # Class Foobar should not exist, so this should create an error
//     $foo = new Foobar;

// });


/*-------------------------------------------------------------------------------------------------
// !Debug
-------------------------------------------------------------------------------------------------*/
// Route::get('/debug', function() {
	
// 	echo '<pre>';
		
// 	echo '<h1>environment.php</h1>';
// 	$path   = base_path().'/environment.php';
	
// 	try {
// 		$contents = 'Contents: '.File::getRequire($path);
// 		$exists = 'Yes';
// 	}
// 	catch (Exception $e) {
// 		$exists = 'No. Defaulting to `production`';
// 		$contents = '';
// 	}
	
// 	echo "Checking for: ".$path.'<br>';
// 	echo 'Exists: '.$exists.'<br>';
// 	echo $contents;
// 	echo '<br>';
	
// 	echo '<h1>Environment</h1>';
// 	echo App::environment().'</h1>';
	
// 	echo '<h1>Debugging?</h1>';
// 	if(Config::get('app.debug')) echo "Yes"; else echo "No";

// 	echo '<h1>Database Config</h1>';
// 	print_r(Config::get('database.connections.mysql'));
	
// 	echo '<h1>Test Database Connection</h1>';
// 	try {
// 		$results = DB::select('SHOW DATABASES;');
// 		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
// 		echo "<br><br>Your Databases:<br><br>";
// 		print_r($results);
// 	} 
// 	catch (Exception $e) {
// 		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
// 	}
	
// 	echo '</pre>';
	
// });

// Route::get('/truncate', function() {

//     # Clear the tables to a blank slate
//     DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
//     DB::statement('TRUNCATE users');
//     DB::statement('TRUNCATE tasks');
   
// });