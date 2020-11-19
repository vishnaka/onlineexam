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
    //return view('welcome');
    return redirect('login');
});


use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;

Auth::routes();

//Route::get('/test',[TestController::class, 'hello']);
//Route::post('/services',[TestController::class,'services']);
//Route::post('/booking',[TestController::class,'booking']);
//Route::post('/confirm',[TestController::class,'confirm']);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');
    //Route::get('/test',[OrderController::class,'test']);
    Route::post('/client',[OrderController::class,'clientInfor']);
    Route::post('/booking',[OrderController::class,'booking']);
    Route::post('/confirm',[OrderController::class,'confirmOrder']);
    Route::get('/complete',[OrderController::class,'completeOrder']);

});

