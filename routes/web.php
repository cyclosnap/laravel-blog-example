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

Auth::routes();

// display recent blog posts here
Route::get('/', 'HomeController@welcome')->name('welcome');

// after successfull login:
Route::get('/home', 'HomeController@index')->name('home');

//show the posts for a specific user
Route::get('user/{id}', 'UserController@show')->name('user');

Route::resource('posts', 'PostController');