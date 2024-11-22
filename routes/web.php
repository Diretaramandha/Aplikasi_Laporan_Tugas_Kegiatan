<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => redirect('/sign-in'));

Route::view('/sign-in', 'pages.sign-in');
Route::post('/auth', [AuthController::class, 'auth_user']);
Route::get('/logout', [AuthController::class, 'logout_user']);

Route::middleware('admin')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [ViewController::class, 'view_dashboard']);
        Route::get('/report/{id}', [ViewController::class, 'view_report_main_tasks']);
        Route::get('/report/task/{id_event}/{id_tasks}', [ViewController::class, 'view_report_tasks']);
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ViewController::class, 'view_profile']);
        Route::post('/change/{id}', [AddUserController::class, 'profile_change']);
    });

    // User routes
    Route::prefix('user')->group(function () {
        Route::get('/', [ViewController::class, 'view_user']);
        Route::get('/create', [ViewController::class, 'view_user_create']);
        Route::get('/update/{id}', [ViewController::class, 'view_user_update']);
        Route::get('/delete/{id}', [ViewController::class, 'view_user_delete']);
        Route::post('/', [AddUserController::class, 'user_search']);
        Route::post('/create', [AddUserController::class, 'user_create']);
        Route::post('/update/{id}', [AddUserController::class, 'user_update']);
    });

    // Event routes
    Route::prefix('event')->group(function () {
        Route::get('/', [ViewController::class, 'view_event']);
        Route::get('/create', [ViewController::class, 'view_event_create']);
        Route::get('/update/{id}', [ViewController::class, 'view_event_update']);
        Route::get('/delete/{id}', [ViewController::class, 'view_event_delete']);
        Route::post('/create', [EventController::class, 'event_create']);
        Route::post('/update/{id}', [EventController::class, 'event_update']);
    });

    // Task routes
    Route::prefix('task')->group(function () {
        Route::get('{id}', [ViewController::class, 'view_task']);
        Route::get('create/{id}', [ViewController::class, 'view_task_create']);
        Route::get('{id_event}/update/{id}', [ViewController::class, 'view_task_update']);
        Route::get('{id_event}/delete/{id}', [ViewController::class, 'view_task_delete']);
        Route::post('create/{id}', [TaskController::class, 'task_create']);
        Route::post('{id_event}/update/{id}', [TaskController::class, 'task_update']);

        // Sub-task routes
        Route::prefix('{id_event}/sub-task')->group(function () {
            Route::get('{id}', [ViewController::class, 'view_sub_task']);
            Route::get('{id}/create', [ViewController::class, 'view_sub_task_create']);
            Route::get('{id_task}/update/{id_sub_task}', [ViewController::class, 'view_sub_task_update']);
            Route::get('{id_task}/delete/{id_sub_task}', [ViewController::class, 'view_sub_task_delete']);
            Route::post('{id}/create', [TaskController::class, 'sub_task_create']);
            Route::post('{id}/update/{id_subtask}', [TaskController::class, 'sub_task_update']);
        });
    });

    // Report routes
    Route::prefix('report')->group(function () {
        Route::get('/', [ViewController::class, 'view_report']);
        Route::get('task/{id_event}/{id_task}', [ViewController::class, 'view_report_task']);
        Route::get('create/{id_task}', [ViewController::class, 'view_report_create']);
        Route::get('upload/{id_report}', [ViewController::class, 'view_report_detail']);
        Route::post('create/{id_task}', [ReportController::class, 'report_create']);
        Route::post('upload/{id_report}', [ReportController::class, 'report_detail_create']);
    });

    // Detail report
});
