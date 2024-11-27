<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return redirect('/sign-in');
});

Route::view('/sign-in', 'pages.sign-in');
Route::post('/auth', [AuthController::class, 'auth_user']);
Route::get('/logout', [AuthController::class, 'logout_user']);

Route::middleware('login')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'view_dashboard']);
        Route::get('/report/{id_event}', [DashboardController::class, 'view_report_tasks']);
        Route::get('/report/task/{id_event}/{id_tasks}', [DashboardController::class, 'view_report_tasks']);
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'view_profile']);
        Route::post('/change/{id}', [UserController::class, 'profile_change']);
    });

    // Rute untuk admin
    Route::middleware('admin')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'view_user']);
            Route::get('/create', [UserController::class, 'view_user_create']);
            Route::get('/update/{id}', [UserController::class, 'view_user_update']);
            Route::get('/delete/{id}', [UserController::class, 'view_user_delete']);
            Route::post('/create', [UserController::class, 'user_create']);
            Route::post('/update/{id}', [UserController::class, 'user_update']);
        });
    });

    // Rute untuk member
    Route::middleware('member')->group(function () {
        Route::prefix('member')->group(function () {
            Route::get('/', [MemberController::class, 'member']);
            Route::get('/create', [MemberController::class, 'view_member_create']);
            Route::get('/update/{id}', [MemberController::class, 'view_member_update']);
            Route::get('/delete/{id}', [MemberController::class, 'member_delete']);
            Route::post('/create', [MemberController::class, 'member_create']);
            Route::put('/update/{id}', [MemberController::class, 'member_update']);
        });

        Route::prefix('member/task')->group(function () {
            Route::get('/', [MemberController::class,'view_task_member']);
            Route::get('{id_user}/{id_task}', [MemberController::class,'view_task_member_detail']);
        });
    });

    // Rute untuk event dan task (bisa diakses oleh admin dan member)
    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'view_event']);
        Route::get('/create', [EventController::class, 'view_event_create']);
        Route::get('/update/{id}', [EventController::class, 'view_event_update']);
        Route::get('/delete/{id}', [EventController::class, 'view_event_delete']);
        Route::post('/create', [EventController::class, 'event_create']);
        Route::post('/update/{id}', [EventController::class, 'event_update']);
    });

    // Rute untuk task
    Route::prefix('task')->group(function () {
        Route::get('{id_event}', [TaskController::class, 'view_task']);
        Route::get('create/{id}', [TaskController::class, 'view_task_create']);
        Route::get('{id_event}/update/{id}', [TaskController::class, 'view_task_update']);
        Route::get('{id_event}/delete/{id}', [TaskController::class, 'view_task_delete']);
        Route::post('create/{id}', [TaskController::class, 'task_create']);
        Route::post('{id_event}/update/{id}', [TaskController::class, 'task_update']);

        Route::prefix('{id_event}/sub-task')->group(function () {
            Route::get('{id_task}', [TaskController::class, 'view_sub_task']);
            Route::get('{id_task}/create', [TaskController::class, 'view_sub_task_create']);
            Route::get('{id_task}/update/{id}', [TaskController::class, 'view_sub_task_update']);
            Route::get('{id_task}/delete/{id}', [TaskController::class, 'view__sub_task_delete']);
            Route::post('{id_task}/create', [TaskController::class, 'sub_task_create']);
            Route::post('{id_task}/update/{id}', [TaskController::class, 'sub_task_update']);
        });
    });

    // Rute untuk report
    Route::prefix('report')->group(function () {
        Route::get('/', [ReportController::class, 'view_report']);
        Route::get('task/{id_event}/{id_task}', [ReportController::class, 'view_report_task']);
        Route::get('create/{id_event}/{id_task}', [ReportController::class, 'view_report_create']);
        Route::get('update/{id_event}/{id_task}/{id_report}', [ReportController::class, 'view_report_update']);
        Route::get('delete/{id_report}', [ReportController::class, 'view_report_delete']);
        Route::get('upload/{id_report}', [ReportController::class, 'view_report_detail']);
        Route::post('upload/{id_report}', [ReportController::class, 'report_detail']);
        Route::post('create/{id_event}/{id_task}', [ReportController::class, 'report_create']);
        Route::post('update/{id_event}/{id_task}/{id_report}', [ReportController::class, 'report_update']);
        // Route::post('{id_event}/{id_task}/create', [ReportController::class, 'report_detail_create']);
    });

    // Rute untuk Export Excel
    Route::prefix('export-excel')->group(function () {
        Route::get('/', [ExportExcelController::class, 'view_export']);
        Route::get('tasks/{id_event}', [ExportExcelController::class, 'view_export_tasks']);
        Route::get('tasks/{id_event}', [ExportExcelController::class, 'view_export_tasks']);
        Route::get('tasks/{id_event}/export', [ExportExcelController::class, 'exportTasksToExcel']);
    });
});
