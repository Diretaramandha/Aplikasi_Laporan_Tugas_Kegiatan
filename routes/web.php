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

Route::get('/', function () {
    return redirect('/sign-in');
});

Route::get('/sign-in', function () {
    return view('pages.sign-in');
});

Route::post('/auth',[AuthController::class,'auth_user']);
Route::get('/logout',[AuthController::class,'logout_user']);

Route::middleware('admin')->group(function () {

    //get

    Route::get('/dashboard',[ViewController::class,'view_dashboard']);
    //--profile
    Route::get('/profile',[ViewController::class,'view_profile']);
    //--user
    Route::get('/user',[ViewController::class,'view_user']);
    Route::get('/user/create',[ViewController::class,'view_user_create']);
    Route::get('/user/update/{id}',[ViewController::class,'view_user_update']);
    Route::get('/user/delete/{id}',[ViewController::class,'view_user_delete']);
    //--event
    Route::get('/event',[ViewController::class,'view_event']);
    Route::get('/event/create',[ViewController::class,'view_event_create']);
    Route::get('/event/update/{id}',[ViewController::class,'view_event_update']);
    Route::get('/event/delete/{id}',[ViewController::class,'view_event_delete']);
    //--task
    Route::get('/task/{id}',[ViewController::class,'view_task']);
    Route::get('/task/create/{id}',[ViewController::class,'view_task_create']);
    Route::get('/task/{id_event}/update/{id}',[ViewController::class,'view_task_update']);
    Route::get('/task/{id_event}/delete/{id}',[ViewController::class,'view_task_delete']);
    //--sub task
    Route::get('/task/{id_event}/sub-task/{id}',[ViewController::class,'view_sub_task']);
    Route::get('/task/{id_event}/sub-task/{id}/create',[ViewController::class,'view_sub_task_create']);
    Route::get('/task/{id_event}/sub-task/{id_task}/update/{id_sub_task}',[ViewController::class,'view_sub_task_update']);
    Route::get('/task/{id_event}/sub-task/{id_tas}/delete/{id_sub_task}',[ViewController::class,'view_sub_task_delete']);
    //--report
    Route::get('/report',[ViewController::class,'view_report']);
    Route::get('/report/task/{id_event}/{id_task}',[ViewController::class,'view_report_task']);
    Route::get('/report/create/{id_task}',[ViewController::class,'view_report_create']);
    //--detail report
    Route::get('/report/all/{id}',[ViewController::class,'view_report_all']);
    Route::get('/report/upload/{id_report}',[ViewController::class,'view_report_detail']);

    //--POST

    //--profile
    Route::post('/profile/change/{id}',[AddUserController::class,'profile_change']);
    //--user
    Route::post('/user', [AddUserController::class, 'user_search']);
    Route::post('/user/create',[AddUserController::class,'user_create']);
    Route::post('/user/update/{id}',[AddUserController::class,'user_update']);
    //---event
    Route::post('/event/create',[EventController::class,'event_create']);
    Route::post('/event/update/{id}',[EventController::class,'event_update']);
    //--task
    Route::post('/task/create/{id}',[TaskController::class,'task_create']);
    Route::post('/task/{id_event}/update/{id}',[TaskController::class,'task_update']);
    //--sub task
    Route::post('/task/{id_event}/sub-task/{id}/create',[TaskController::class,'sub_task_create']);
    Route::post('/task/{id_event}/sub-task/{id}/update',[TaskController::class,'sub_task_update']);
    //--report
    Route::post('/report/create/{id_task}',[ReportController::class,'report_create']);
    //--detail report
    Route::post('/report/upload/{id_report}',[ReportController::class,'report_detail_create']);

});


