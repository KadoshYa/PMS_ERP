    <?php

    use App\Notifications\NewTaskNotification;
    use Spatie\Activitylog\Models\Activity;
    use Illuminate\Notifications\Notifiable;
    use App\User;
 

    // FOR Any Unauthenticated Users
    Auth::routes();
    // Route::get('/',['uses' =>'\App\Http\Controllers\Auth\LoginController@login', 'as' => 'index']); 
    // Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');
    Route::get('/', function()
{
    return view('auth.login');
});

    Route::post('/', '\App\Http\Controllers\Auth\LoginController@login')->name('login');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

        Route::get('markAsRead', function()
        {
            Auth::user()->unreadNotifications->markAsRead();
            return redirect()->back();
        })->name('markRead');


    //FOR Any Unauthenticated Users

    // *********************

    // Route::get('404',['as'=>'404', 'uses'=>'ErrorHandlerController@errorCode404']);

    Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::group(['middleware'=> 'auth'], function() { 
    // ***********************

    // Authenticated Administrators

    Route::group(['middleware' =>['admin']], function(){

                // Admin Dashboard
        Route::post('/Admin_Dashboard',['uses' =>'DashboardController@adminDashboard', 'as' => 'dashboard']); 
        Route::get('/project-chart', 'ChartsController@getProjectMonthlyData')->name('chartShow');
        Route::get('/task-chart', 'ChartsController@getTasksMonthlyData')->name('chartTasksShow');
        Route::get('user/admin/{id}',['uses' => 'UsersController@admin','as' => 'user.admin']);
        Route::get('user/not-admin/{id}',['uses' => 'UsersController@not_admin','as' => 'user.not.admin']);
        Route::get('/users',['uses'=>'UsersController@index', 'as' =>'users']);
        Route::get('/user/create',['uses' => 'UsersController@create','as' => 'user.create']);
        Route::get('delete-user/{id}','UsersController@destroy');
        Route::get('/systemlog',['uses' => 'LogsController@index', 'as' => 'logs']);
        Route::get('/log_details/{id}',['uses' => 'LogsController@showDetail', 'as' => 'log.detail']);

            //Task Routes

        Route::get('/create_task',['uses'=>'TaskController@create', 'as'=>'task.create']);
        Route::get('/all_tasks',['uses'=>'TaskController@index', 'as'=>'task.all']);
        Route::post('/save_task',['uses'=>'TaskController@store', 'as'=>'task.store']);
        Route::get('/trash_task/{id}',['uses'=>'TaskController@trash', 'as'=>'task.trash']);
        Route::get('/restore_task/{id}',['uses'=>'TaskController@restore', 'as'=>'task.restore']);
        Route::get('/trashed_tasks',['uses'=>'TaskController@showTrash', 'as'=>'task.showTrash']);
        Route::get('/destroy_task/{id}',['uses'=>'TaskController@destroy', 'as'=>'task.destroy']);
        Route::get('/complete_task/{id}',['uses'=>'TaskController@markAsCompleted', 'as'=>'task.complete']);
        Route::get('/verify_task/{id}',['uses'=>'TaskController@markAsVerified', 'as'=>'task.verify']);
        Route::get('/taskCalender_view',['uses'=>'TaskController@calenderView', 'as'=>'task.calender']);


            //Project Routes

        Route::get('/create_project',['uses'=>'ProjectController@create', 'as'=>'project.create']);
        Route::post('/save_project/{id}',['uses'=>'ProjectController@store', 'as'=>'project.store']);
        Route::get('/all_projects',['uses'=>'ProjectController@index', 'as'=>'project.all']);
        Route::get('/project_details/{id}',['uses'=>'ProjectController@show', 'as'=>'project.showDetail']);
        Route::get('/completed_projects',['uses'=>'ProjectController@showCompleted', 'as'=>'project.completeList']);
        Route::get('/ongoing_projects',['uses'=>'ProjectController@showOngoing', 'as'=>'project.ongoingList']);
        Route::get('/stuck_projects',['uses'=>'ProjectController@showStuck', 'as'=>'project.stuckList']); 
        Route::post('/update_project/{id}',['uses'=>'ProjectController@update', 'as'=>'project.update']);
        Route::get('/edit_project/{id}',['uses'=>'ProjectController@edit', 'as'=>'project.edit']);
        Route::get('/trash_project/{id}',['uses'=>'ProjectController@trash', 'as'=>'project.trash']);
        Route::get('/restore_project/{id}',['uses'=>'ProjectController@restore', 'as'=>'project.restore']);
        Route::get('/trashed_projects',['uses'=>'ProjectController@showTrash', 'as'=>'project.showTrash']);
        Route::get('/destroy_project/{id}',['uses'=>'ProjectController@destroy', 'as'=>'project.destroy']);
        Route::get('/complete_project/{id}',['uses'=>'ProjectController@markAsCompleted', 'as'=>'project.complete']);
        Route::get('/projectCalender_view',['uses'=>'ProjectController@calenderView', 'as'=>'project.calender']);


        Route::get('/verify_report/{id}',['uses'=>'ReportController@verifyReport', 'as'=>'report.verify']);
        Route::get('/my reports',['uses'=>'ReportController@showMine', 'as'=>'report.showMine']);
        Route::get('/all reports', ['uses'=>'ReportController@index', 'as'=>'reports.index']);



    });
    //  ********************


        // Authenticated Super Adminstrators

        Route::group(['middleware' =>['superAdmin']], function(){

            Route::get('/Super_Dashboard', ['uses'=>'DashboardController@superDashboard', 'as' => 'superUserDashboard']);
            Route::get('/all_projects',['uses'=>'ProjectController@index', 'as'=>'project.all']);

            Route::get('/project-chart', 'ChartsController@getProjectMonthlyData')->name('chartShow');
            Route::get('/task-chart', 'ChartsController@getTasksMonthlyData')->name('chartTasksShow');


                      // Admin Dashboard
        Route::get('/Admin_Dashboard',['uses' =>'DashboardController@adminDashboard', 'as' => 'dashboard']); 
        Route::get('user/admin/{id}',['uses' => 'UsersController@admin','as' => 'user.admin']);
        Route::get('user/not-admin/{id}',['uses' => 'UsersController@not_admin','as' => 'user.not.admin']);
        Route::get('/users',['uses'=>'UsersController@index', 'as' =>'users']);
        Route::get('/user/create',['uses' => 'UsersController@create','as' => 'user.create']);
        Route::get('delete-user/{id}','UsersController@destroy');
        Route::get('/systemlog',['uses' => 'LogsController@index', 'as' => 'logs']);
        Route::get('/log_details/{id}',['uses' => 'LogsController@showDetail', 'as' => 'log.detail']);

            //Task Routes

        Route::get('/create_task',['uses'=>'TaskController@create', 'as'=>'task.create']);
        Route::get('/all_tasks',['uses'=>'TaskController@index', 'as'=>'task.all']);
        Route::post('/save_task',['uses'=>'TaskController@store', 'as'=>'task.store']);
        Route::get('/trash_task/{id}',['uses'=>'TaskController@trash', 'as'=>'task.trash']);
        Route::get('/restore_task/{id}',['uses'=>'TaskController@restore', 'as'=>'task.restore']);
        Route::get('/trashed_tasks',['uses'=>'TaskController@showTrash', 'as'=>'task.showTrash']);
        Route::get('/destroy_task/{id}',['uses'=>'TaskController@destroy', 'as'=>'task.destroy']);
        Route::get('/complete_task/{id}',['uses'=>'TaskController@markAsCompleted', 'as'=>'task.complete']);
        Route::get('/verify_task/{id}',['uses'=>'TaskController@markAsVerified', 'as'=>'task.verify']);
        Route::get('/taskCalender_view',['uses'=>'TaskController@calenderView', 'as'=>'task.calender']);


            //Project Routes

        Route::get('/create_project',['uses'=>'ProjectController@create', 'as'=>'project.create']);
        Route::post('/save_project/{id}',['uses'=>'ProjectController@store', 'as'=>'project.store']);
        Route::get('/all_projects',['uses'=>'ProjectController@index', 'as'=>'project.all']);
        Route::get('/project_details/{id}',['uses'=>'ProjectController@show', 'as'=>'project.showDetail']);
        Route::get('/completed_projects',['uses'=>'ProjectController@showCompleted', 'as'=>'project.completeList']);
        Route::get('/ongoing_projects',['uses'=>'ProjectController@showOngoing', 'as'=>'project.ongoingList']);
        Route::get('/stuck_projects',['uses'=>'ProjectController@showStuck', 'as'=>'project.stuckList']); 
        Route::post('/update_project/{id}',['uses'=>'ProjectController@update', 'as'=>'project.update']);
        Route::get('/edit_project/{id}',['uses'=>'ProjectController@edit', 'as'=>'project.edit']);
        Route::get('/trash_project/{id}',['uses'=>'ProjectController@trash', 'as'=>'project.trash']);
        Route::get('/restore_project/{id}',['uses'=>'ProjectController@restore', 'as'=>'project.restore']);
        Route::get('/trashed_projects',['uses'=>'ProjectController@showTrash', 'as'=>'project.showTrash']);
        Route::get('/destroy_project/{id}',['uses'=>'ProjectController@destroy', 'as'=>'project.destroy']);
        Route::get('/complete_project/{id}',['uses'=>'ProjectController@markAsCompleted', 'as'=>'project.complete']);
        Route::get('/projectCalender_view',['uses'=>'ProjectController@calenderView', 'as'=>'project.calender']);

        Route::get('/all reports', ['uses'=>'ReportController@index', 'as'=>'reports.index']);



        });
        //  ********************
    

        // Common for User and Admin 
    Route::get('/User_Dashboard', 'DashboardController@mydashboard')->name('userDashboard'); 
    Route::get('delete-profile/{id}','ProfilesController@destroy');
    Route::get('/create_report', ['uses'=>'ReportController@create', 'as'=>'report.create']);
    Route::get('/create_p_report/{id}', ['uses'=>'ReportController@projectcreate', 'as'=>'report.projectcreate']);
    Route::post('/save_report/{id}',['uses'=>'ReportController@store', 'as'=>'report.store']);
    Route::post('/project_report/{id}/{pid}',['uses'=>'ReportController@ProjectStore', 'as'=>'report.projectstore']);
    Route::get('/edit_task/{id}',['uses'=>'TaskController@edit', 'as'=>'task.edit']);
    Route::post('/update_task/{id}',['uses'=>'TaskController@update', 'as'=>'task.update']);
    Route::get('/task_details/{id}',['uses'=>'TaskController@show', 'as'=>'task.showDetail']);
    Route::get('/my_tasks',['uses'=>'TaskController@mytasks', 'as'=>'task.mytasks']);
    Route::get('user/profile',['uses' => 'ProfilesController@index','as' => 'user.profile']);
    Route::post('/user/profile/update',['uses' => 'ProfilesController@update','as' => 'user.profile.update']);

        
        //Super User Dashboard
       

    });




    });//Prevent

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
