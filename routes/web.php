<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
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

Route::middleware('login')->group(function () {
    Route::get('/dashboard',[ViewController::class,'view_dashboard']);
    Route::get('/tables',[ViewController::class,'view_tables']);

    Route::get('/user',[ViewController::class,'view_user']);
    Route::get('/user/create',[ViewController::class,'view_user_create']);
    Route::get('/user/update/{id}',[ViewController::class,'view_user_update']);

    Route::get('/event',[ViewController::class,'view_event']);
    Route::get('/event/create',[ViewController::class,'view_event_create']);

    Route::get('/task/{id}',[ViewController::class,'view_task_create']);

    Route::post('/user', [AddUserController::class, 'user_search']);
    Route::post('/user/create',[AddUserController::class,'user_create']);
    Route::post('/user/edit',[AddUserController::class,'user_create']);

    Route::post('/event/create',[EventController::class,'event_create']);

    Route::post('/task/{id}',[TaskController::class,'task_create']);
});
