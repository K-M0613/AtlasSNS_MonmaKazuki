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
//     return view('/auth/login');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function () { //認証済みのユーザーにしか表示できない的なやつ
  Route::get('/top','PostsController@index');
  Route::post('/post', 'PostsController@store');
  Route::get('/post/{id}/delete', 'PostsController@delete');
// Route::get('/post/{id}/edit', 'PostsController@edit');
  Route::post('/post/{id}/update', 'PostsController@update');
  Route::get('/profile','UsersController@profile');
  Route::post('/follow/{id}', 'UsersController@follow')->name('follow');
  Route::post('/profile/update', 'UsersController@profileUpdate');
  Route::get('/userProfile/{id}', 'UsersController@userProfile')->name('userProfile');
  Route::post('/unfollow/{id}', 'UsersController@unfollow')->name('unfollow');
  Route::get('/followList', 'FollowsController@followList')->name('followList');
  Route::get('/followerList', 'FollowsController@followerList')->name('followerList');

  Route::get('/search','UsersController@search');
  Route::post('/search','UsersController@search');

  Route::get('/follow-list','PostsController@index');
  Route::get('/follower-list','PostsController@index');
  Route::get('/logout', 'Auth\LoginController@logout');
});
