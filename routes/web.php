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

Route::post('/language-chooser',  'LanguageController@changeLanguage');
Route::post('/language', array(
	'before' =>  'csrf',
	'as' => 'language-chooser',
	'uses' => 'LanguageController@changeLanguage'
	)
);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));
Route::post('/register', array('as' => 'register', 'uses' => 'UsersController@store'));
Route::group( ['middleware' => 'auth' ], function() {
	Route::get('/users', array('as' => 'users', 'uses' => 'UsersController@index'));
});

//Routes to TournamentController
//TODO: Since all requests for tournament pages should be done via post requests - we should remove the Route::get once the tournaments table is up and running - Michel Tremblay - 2017-02-17
Route::get('/tournaments/', 'TournamentController@view');
//TODO: add logic to fetch the requested tournament info to display on the tournament page - Michel Tremblay - 2017-02-17
Route::post('/tournaments/', array('as' => 'tournaments', 'uses' => 'TournamentController@view'));

//Routes to ProfileController
Route::get('/profile/', 'ProfileController@view');
