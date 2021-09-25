<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/chat', [ChatController::class, 'chat']);
});


Route::post("login", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'register']);

Route::get('login/google/redirect', [UserController::class, 'googleredirect'])->name("googlelogin");
Route::get('login/google/callback', [UserController::class, 'googlecallback']);