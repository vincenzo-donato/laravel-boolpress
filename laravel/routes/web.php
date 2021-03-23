<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// COLLEGAMENTO HOME 
Route::get('/','HomeController@index')->name('home.page');

// COLLEGAMENTO TAGS DA ADMIN
Route::get('/tags','Admin\HomeController@show')->name('tag.page');

// COLLEGAMENTO USERS DA ADMIN
Route::get('/users','Admin\HomeController@user')->name('user.page');

// COLLEGAMENTO INDEX POSTS 
Route::get('/posts','PostController@index')->name('index.guest.post');

// COLLEGAMENTO TAG LATO LOG OUT 
Route::get('/tagslogout','PostController@tag')->name('tags.guest.post');

// COLLEGAMENTO USER LATO LOG OUT 
Route::get('/userslogout','PostController@user')->name('users.guest.post');

// COLLEGAMENTO SHOW POST 
Route::get('/posts{slug}','PostController@show')->name('show.guest.post');

// COLLEGAMENTO EMAIL 
Route::get('/emailRequest','PostController@request')->name('request.guest.post');

// COLLEGAMENTO INVIO EMAIL 
Route::post('/emailRequest','PostController@requestSend')->name('send.email');

Auth::routes();

// ROTTE PER ADMIN 
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile','HomeController@profile')->name('profile');
    Route::post('/genera-token','HomeController@generaToken')->name('genera-token');
    Route::resource('/post', 'PostController');
});
