<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/logout','Auth\LoginController@logout');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::post('/post/create','PostsController@create');
Route::post('/post/update','PostsController@update');
Route::get('/post/delete','PostsController@delete');

Route::get('/profile','UsersController@profile');
Route::get('/profile/{id}','UsersController@otherProfile');
Route::post('/profile/update','UsersController@profileUpdate');

Route::get('/search','UsersController@search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
Route::post('/follow/create','FollowsController@create');
Route::post('/follow/delete','FollowsController@delete');

Route::get('/test','PostsController@test');
