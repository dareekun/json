<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/option', [App\Http\Controllers\HomeController::class, 'option']);
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account']);

Route::post('/export', [App\Http\Controllers\HomeController::class, 'export']);
Route::post('/schedule', [App\Http\Controllers\HomeController::class, 'schedule']);
Route::post('/password', [App\Http\Controllers\HomeController::class, 'password']);

Route::post('/post', [App\Http\Controllers\NoLoginController::class, 'post']);
Route::get('/download', [App\Http\Controllers\NoLoginController::class, 'download']);
Route::get('/schedule', [App\Http\Controllers\NoLoginController::class, 'schedule']);
