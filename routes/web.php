<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AuthController;
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
    Route::get('/add-user',[ViewController::class,'view_add_user']);
    Route::get('/add-user/create',[ViewController::class,'view_user_create']);

    Route::post('/add-user',[AddUserController::class,'user_search']);
    Route::post('/add-user/create',[AddUserController::class,'user_create']);
});
