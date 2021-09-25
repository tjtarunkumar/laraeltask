<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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
    return view('index');
});

Route::get('/chat/{token?}', function ($token=null) {
    return view('chat',['token' => $token]);
});



Route::get('login/facebook/redirect', [UserController::class, 'facebookredirect'])->name("fblogin");
Route::get('login/facebook/callback', [UserController::class, 'facebookcallback']);