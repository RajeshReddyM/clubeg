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
    Route::resource('users', 'UsersController', ['only' => ['index', 'edit', 'update', 'destroy']]);
    Route::resource('clubs', 'GolfclubsController');
    Route::resource('golfcourses', 'GolfcoursesController');
    Route::get('images/clubs/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/clubs/' . $filename)->response();
    });
    Route::get('images/golfcourses/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/golfcourses/' . $filename)->response();
    });
});

//Routes to TournamentController
Route::get('/tournaments/view{id}', 'TournamentController@view');
Route::post('/tournaments/view{id}', 'TournamentController@view');
Route::get('/tournaments', 'TournamentController@index');
Route::post('/tournaments', 'TournamentController@index');
Route::get('/tournaments/create', 'TournamentController@create');
Route::post('/tournaments/create', 'TournamentController@create');
Route::get('/tournaments/cancelRegistration{id}', 'TournamentController@cancelRegistration');
Route::post('/tournaments/cancelRegistration{id}', 'TournamentController@cancelRegistration');
Route::get('/tournaments/register{id}', 'TournamentController@register');
Route::post('/tournaments/register{id}', 'TournamentController@register');
//Routes to ProfileController
Route::get('/profile/', 'ProfileController@view');
