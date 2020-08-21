<?php


// FOR Any Unauthenticated Users
Auth::routes();
// Route::get('/',['uses' =>'\App\Http\Controllers\Auth\LoginController@login', 'as' => 'index']); 
// Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('bar-chart', 'ChartsController@index');

//FOR Any Unauthenticated Users

// *********************

Route::get('404',['as'=>'404', 'uses'=>'ErrorHandlerController@errorCode404']);

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::group(['middleware'=> 'auth'], function() { 
// ***********************

// Authenticated Administrators

Route::group(['middleware' => 'admin' ], function(){
Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');

            // Admin Dashboard
    Route::get('/dashboard',['uses' =>'DashboardController@adminDashboard', 'as' => 'dashboard']); 
    Route::get('user/admin/{id}',['uses' => 'UsersController@admin','as' => 'user.admin']);
    Route::get('user/not-admin/{id}',['uses' => 'UsersController@not_admin','as' => 'user.not.admin']);
    Route::get('/users',['uses'=>'UsersController@index', 'as' =>'users']);
    Route::get('/user/create',['uses' => 'UsersController@create','as' => 'user.create']);
    Route::get('delete-user/{id}','UsersController@destroy')->middleware('admin');

        //Task Routes

    Route::get('/create_task',['uses'=>'TaskController@create', 'as'=>'task.create'])->middleware('admin');
    Route::get('/all_tasks',['uses'=>'TaskController@index', 'as'=>'task.all'])->middleware('admin');
    Route::post('/save_task',['uses'=>'TaskController@store', 'as'=>'task.store'])->middleware('admin');
    Route::get('/trash_task/{id}',['uses'=>'TaskController@trash', 'as'=>'task.trash'])->middleware('admin');
    Route::get('/restore_task/{id}',['uses'=>'TaskController@restore', 'as'=>'task.restore'])->middleware('admin');
    Route::get('/trashed_tasks',['uses'=>'TaskController@showTrash', 'as'=>'task.showTrash'])->middleware('admin');
    Route::get('/destroy_task/{id}',['uses'=>'TaskController@destroy', 'as'=>'task.destroy'])->middleware('admin');
    Route::get('/complete_task/{id}',['uses'=>'TaskController@markAsCompleted', 'as'=>'task.complete'])->middleware('admin');
    Route::get('/verify_task/{id}',['uses'=>'TaskController@markAsVerified', 'as'=>'task.verify'])->middleware('admin');
    Route::get('/taskCalender_view',['uses'=>'TaskController@calenderView', 'as'=>'task.calender'])->middleware('admin');


        //Project Routes

    Route::get('/create_project',['uses'=>'ProjectController@create', 'as'=>'project.create'])->middleware('admin');
    Route::post('/save_project',['uses'=>'ProjectController@store', 'as'=>'project.store'])->middleware('admin');
    Route::get('/all_projects',['uses'=>'ProjectController@index', 'as'=>'project.all'])->middleware('admin');
    Route::get('/project_details/{id}',['uses'=>'ProjectController@show', 'as'=>'project.showDetail'])->middleware('admin');
    Route::get('/completed_projects',['uses'=>'ProjectController@showCompleted', 'as'=>'project.completeList'])->middleware('admin');
    Route::get('/ongoing_projects',['uses'=>'ProjectController@showOngoing', 'as'=>'project.ongoingList'])->middleware('admin');
    Route::get('/stuck_projects',['uses'=>'ProjectController@showStuck', 'as'=>'project.stuckList'])->middleware('admin'); 
    Route::post('/update_project/{id}',['uses'=>'ProjectController@update', 'as'=>'project.update'])->middleware('admin');
    Route::get('/edit_project/{id}',['uses'=>'ProjectController@edit', 'as'=>'project.edit'])->middleware('admin');
    Route::get('/trash_project/{id}',['uses'=>'ProjectController@trash', 'as'=>'project.trash'])->middleware('admin');
    Route::get('/restore_project/{id}',['uses'=>'ProjectController@restore', 'as'=>'project.restore'])->middleware('admin');
    Route::get('/trashed_projects',['uses'=>'ProjectController@showTrash', 'as'=>'project.showTrash'])->middleware('admin');
    Route::get('/destroy_project/{id}',['uses'=>'ProjectController@destroy', 'as'=>'project.destroy'])->middleware('admin');
    Route::get('/complete_project/{id}',['uses'=>'ProjectController@markAsCompleted', 'as'=>'project.complete'])->middleware('admin');
    Route::get('/projectCalender_view',['uses'=>'ProjectController@calenderView', 'as'=>'project.calender'])->middleware('admin');


});
// Authenticated Administrators

//  ********************


// **************************

// Commen for User and Admin
Route::get('/home', 'DashboardController@mydashboard')->name('admin_home'); 
Route::get('delete-profile/{id}','ProfilesController@destroy');
Route::get('/edit_task/{id}',['uses'=>'TaskController@edit', 'as'=>'task.edit']);
Route::post('/update_task/{id}',['uses'=>'TaskController@update', 'as'=>'task.update']);
Route::get('/task_details/{id}',['uses'=>'TaskController@show', 'as'=>'task.showDetail']);
Route::get('/my_tasks',['uses'=>'TaskController@mytasks', 'as'=>'task.mytasks']);
Route::get('delete-file/{id}','BookController@deleteFile');
Route::get('user/profile',['uses' => 'ProfilesController@index','as' => 'user.profile']);
Route::post('/user/profile/update',['uses' => 'ProfilesController@update','as' => 'user.profile.update']);

// Commen for User and Admin

    

});




});//Prevent
