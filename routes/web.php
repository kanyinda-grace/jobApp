<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains  the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('auth')->group(function(){
   Route::post('/register' ,[AuthController::class,'register']);
   Route::post('/login' ,[AuthController::class,'login']);
   Route::get('/logout' ,[AuthController::class,'logout'])->middleware('auth:api');
   Route::get('/user' ,[AuthController::class,'user'])->middleware('auth:api');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//API resources
