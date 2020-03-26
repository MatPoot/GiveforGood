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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'ViewController@indexView');
Route::get('/post', 'ViewController@PostView');
Route::get('/list', 'ViewController@ListView');
Route::get('/login', 'ViewController@LoginView');
//Route::get('login/google', 'Auth\LoginController@redirectToProvider');
//Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('redirect/{driver}', 'LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('{driver}/callback', 'LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));


