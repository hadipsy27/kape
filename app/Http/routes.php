<?php
Route::get('/', 'HomeController@index')->name('home');
Route::get('register', function(){ return View::make('register')->with('pTitle', "Register"); })->name('register');
Route::get('login', function(){ return View::make('login')->with('pTitle', "Login"); })->name('login');
Route::get('faq', function(){ return View::make('faq')->with('pTitle', "FAQ"); })->name('faq');

//----------------- User routes
Route::resource('users', 'UsersController', array('only' => array('show')));
Route::post('login', 'UsersController@login');
Route::post('make', 'UsersController@register');
Route::get('logout', 'UsersController@logout')->name('logout');
Route::post('resetPassword/{id}','UsersController@resetPassword');

//----------------- Auth routes
Route::group(array('before' => 'auth'), function()
{
	Route::get('hud', 'HomeController@index')->name('hud');
	Route::get('search', 'HomeController@search')->name('search');
	Route::get('profile', 'UsersController@index')->name('profile');
	Route::get('courses', 'CoursesController@index')->name('courses');
	Route::delete('courses/{id}', 'CoursesController@destroy');
    Route::resource('projects', 'ProjectsController', array('only' => array('show')));


});

//----------------- API routes
Route::group(['prefix' => '/api/'], function()
{	
	// USER 
    Route::get('user', 'UsersController@getUser');
    Route::post('user/{id}', 'UsersController@updateUser');
	Route::delete('user/', 'UsersController@deleteUser');

	// CLIENT
	Route::get('courses/{withWeight?}', 'CoursesController@getAllUserCourses');
	Route::put('courses/{id}', 'CoursesController@updateCourse');
	Route::post('courses', 'CoursesController@storeCourse');
	Route::delete('courses/{id}', 'CoursesController@removeCourse');

	// PROJECT
    Route::get('projects/', 'ProjectsController@getAllUserProjects');
    Route::get('projects/shared', 'ProjectsController@getAllMemberProjects');
    Route::get('projects/{id}','ProjectsController@getProject');
    Route::get('projects/{id}/owner','ProjectsController@getOwner');
    Route::get('projects/{id}/members','ProjectsController@getMembers');
	Route::post('projects', 'ProjectsController@storeProject');
    Route::put('projects/{id}', 'ProjectsController@updateProject');
    Route::post('projects/{id}/{email}/invite', 'ProjectsController@invite');
    Route::delete('projects/{id}/{member_id}/remove', 'ProjectsController@removeMember' );

	// TASK
    Route::get('tasks', 'TasksController@getAllUserOpenTasks');
    Route::post('tasks/{course_id}/{project_id}', 'TasksController@storeTask');
    Route::delete('tasks/{id}', 'TasksController@removeTask');
    Route::put('tasks/{id}', 'TasksController@updateTask');

	// CREDENTIALS
    Route::get('credentials/{id}','CredentialsController@getProjectCredentials');
    Route::post('credentials', 'CredentialsController@storeCredential');
    Route::put('credentials/{id}', 'CredentialsController@updateCredential');
    Route::delete('credentials/{id}', 'CredentialsController@removeCredential');
});

//----------------- Admin routes
Route::get('admin','AdminController@index');


// ---- Upload File
// Route::group(['middleware' => 'web '], function(){
    Route::get('fileUpload', function(){
        return view('projects/partials/upload');
    });
    Route::post('fileUpload',['as'=> 'fileUpload', 'uses'=>'UploadController@fileUpload']);
// });

Route::get('projects/{id}/files', function(){
    return view('projects/partials/files');
});
Route::post('projects/{id}/files', array('uses' => 'FilesController@store', 'as' => 'files.store'));