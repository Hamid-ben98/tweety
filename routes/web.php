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
    return view('welcome');
});

Auth::routes();
Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('home')->middleware('auth');
Route::post('/tweets', 'App\Http\Controllers\TweetController@store')->middleware('auth');
Route::get('/profiles/{user}','App\Http\Controllers\ProfileController@show')->name('profile');
Route::post('/profiles/{user}','App\Http\Controllers\ProfileController@followMe')->middleware('auth');
Route::get('/profiles/{user}/edit','App\Http\Controllers\ProfileController@edit')->middleware('can:edit,user');
Route::patch('/profiles/{user}/edit','App\Http\Controllers\ProfileController@update')->middleware('can:edit,user');
Route::get('/explore','App\Http\Controllers\ExploreController@index')->middleware('auth');
