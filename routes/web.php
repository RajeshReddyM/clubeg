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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group( ['middleware' => 'auth' ], function() {
	Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));

	Route::post('/register', array('as' => 'register', 'uses' => 'UsersController@store'));
});
