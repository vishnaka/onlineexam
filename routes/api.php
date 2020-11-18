<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

//Route::resource('posts', 'PostController');
Route::resource('posts', PostController::class);

//Route::get('posts',[PostController::class, 'index']);

Route::get('test',[TestController::class, 'hello']);
//Route::get('test', [TestController::class, 'hello']);
