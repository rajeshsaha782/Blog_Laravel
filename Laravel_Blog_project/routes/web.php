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
Route::get('/', 'HomeController@index');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/signup', 'SignupController@index')->name('signup');
Route::post('/signup', 'SignupController@verify');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search', 'HomeController@search')->name('search');


Route::get('/user/viewprofile/{id}', 'UserController@viewprofile')->name('user.viewprofile')->middleware('CheckSession');
Route::get('/user/setfollower/{follower}/{following}', 'UserController@setfollower')->name('user.setfollower')->middleware('CheckSession');
Route::get('/user/removefollower/{id}', 'UserController@removefollower')->name('user.removefollower')->middleware('CheckSession');


Route::post('/post/postcreate', 'PostController@postCreate');
Route::get('/post/postdetail/{id}', 'PostController@postdetail')->name('post.postdetail');
Route::get('/post/postedit/{id}', 'PostController@postedit')->name('post.postedit')->middleware('CheckSession');
Route::post('/post/postedit/{id}', 'PostController@savepostedit');
Route::get('/post/postdelete/{id}', 'PostController@postdelete')->name('post.postdelete')->middleware('CheckSession');

Route::post('/comment/commentCreate', 'CommentController@commentCreate');
Route::get('/comment/commentDelete/{id}', 'CommentController@commentDelete')->name('comment.commentDelete')->middleware('CheckSession');