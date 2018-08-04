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
Route::get('/', 'LoginController@index');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/signup', 'SignupController@index')->name('signup');
Route::post('/signup', 'SignupController@verify');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/postdetail/{id}', 'HomeController@postdetail')->name('home.postdetail');
Route::post('/home', 'HomeController@postCreate');
Route::post('/home/commentCreate', 'HomeController@commentCreate');
Route::get('/home/commentDelete/{id}', 'HomeController@commentDelete')->name('home.commentDelete')->middleware('CheckSession');
Route::get('/home/search', 'HomeController@search')->name('search');

Route::get('/user/viewprofile/{id}', 'UserController@viewprofile')->name('user.viewprofile')->middleware('CheckSession');
Route::get('/user/postedit/{id}', 'UserController@postedit')->name('user.postedit')->middleware('CheckSession');
Route::post('/user/postedit/{id}', 'UserController@savepostedit');
Route::get('/user/postdelete/{id}', 'UserController@postdelete')->name('user.postdelete')->middleware('CheckSession');
Route::get('/user/setfollower/{follower}/{following}', 'UserController@setfollower')->name('user.setfollower')->middleware('CheckSession');
Route::get('/user/removefollower/{id}', 'UserController@removefollower')->name('user.removefollower')->middleware('CheckSession');