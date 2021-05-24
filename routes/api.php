<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Opportunity;
use App\Models\Category;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/opportunity',[OpportunityController::class,'index'])->name('opportunity');

Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/catstore',[CategoryController::class,'store']);
Route::get('/countries',[CategoryController::class,'index']); 