<?php


Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('departments/{department}/tasks', 'TaskController@index');
    Route::get('projects/{project}/tasks', 'TaskController@index');
    Route::get('tasks/{task}', 'TaskController@show')->name('tasks.show');

    Route::get('tasks/{task}?c={reply}', 'ReplyController@show')->name('replies.show');

    Route::get('tasklists/{list}', 'TaskListController@show')->name('task_lists.show');

    Route::get('departments/{department}', 'DepartmentController@show');

    Route::get('projects', 'projectController@index');
    Route::get('projects/{project}', 'projectController@show');


    
    Route::prefix('api')->group(function () {
        Route::get('departments/{department}/tasks', 'Api\TaskController@index');
        Route::get('projects/{project}/tasks', 'Api\TaskController@index');

        Route::get('tasks/{task}', 'Api\TaskController@show')->name('api.tasks.show');

        Route::get('tasklists/{list}', 'Api\TaskListController@show')->name('api.task_lists.show');

        Route::post('tasks/{task}/complete', 'Api\TaskCompleteController@store');
        Route::delete('tasks/{task}/complete', 'Api\TaskCompleteController@destroy');

        Route::get('tasks/{task}/replies', 'Api\ReplyController@index')->name('api.replies');
        Route::post('tasks/{task}/replies', 'Api\ReplyController@store');
        Route::patch('tasks/{task}/replies/{reply}', 'Api\ReplyController@show')->name('api.replies.show');
        Route::patch('tasks/{task}/replies/{reply}', 'Api\ReplyController@update')->name('api.replies.update');
        Route::delete('tasks/{task}/replies/{reply}', 'Api\ReplyController@destroy');

        Route::post('tags', 'Api\TagItemController@store');
        Route::delete('tags/{tag}', 'Api\TagItemController@delete');

        Route::post('tasks/{task}/tag/{tag}', 'Api\TagController@store');
        Route::delete('tasks/{task}/tag/{tag}', 'Api\TagController@delete');
    });

});
