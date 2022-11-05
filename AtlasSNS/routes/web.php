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
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ

Route::group(['middleware' => 'auth'],function (){
Route::get('/index','PostsController@index');
Route::post('/index/store','PostsController@store');

Route::post('/index/update','PostsController@update');
Route::post('/index/delete','PostsController@delete');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@searchResult');

Route::post('/search/follow','UsersController@follow');
Route::post('/search/unfollow','UsersController@unfollow');

Route::get('/profile','UsersController@profileEdit');
Route::post('/profile/update','UsersController@profileUpdate');
Route::post('/profile','UsersController@profile');


Route::get('/follow_list','FollowsController@followList');
Route::get('/follower_list','FollowsController@followerList');


});
