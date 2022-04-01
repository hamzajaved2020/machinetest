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

Route::get('/', [\App\Http\Controllers\AuthController::class,'index'])->middleware(\App\Http\Middleware\LoginMiddleware::class);
Route::post('/login', [\App\Http\Controllers\AuthController::class,'login']);
Route::get('/questions', [\App\Http\Controllers\QuestionController::class,'index'])->middleware(\App\Http\Middleware\UserMiddleware::class);
Route::get('/getData', [\App\Http\Controllers\QuestionController::class,'getData'])->middleware(\App\Http\Middleware\UserMiddleware::class);
Route::get('/answer', [\App\Http\Controllers\AnswerController::class,'index'])->middleware(\App\Http\Middleware\UserMiddleware::class);
