<?php

use Illuminate\Support\Facades\Route;

use App\Mail\newUserWelcomeMail;
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

//Temporary
Route::get('/email', function(){
    return new newUserWelcomeMail();
});

//Profiles routes
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{id}/edit', 'ProfilesController@edit');
Route::patch('/profile/{id}', 'ProfilesController@update');

//Posts routes
Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

//API ROUTE
Route::post('/follow/{user}', 'FollowsController@store');


