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
    // Routes to Golfclubs Controller
    Route::resource('clubs', 'GolfclubsController');
    Route::get('/clubs/{id}/register', 'GolfclubsController@register');
    Route::get('/clubs/{id}/unregister', 'GolfclubsController@unregister');
    Route::resource('golfcourses', 'GolfcoursesController');
    // Routes to Tournaments Controller
    Route::resource('tournaments', 'TournamentsController');
    Route::get('/tournaments/{id}/register', 'TournamentsController@register');
    Route::get('/tournaments/{id}/unregister', 'TournamentsController@unregister');
    //Routes to Sponsors Controller
    Route::resource('sponsors', 'SponsorsController');
    Route::get('/sponsors/{id}/edit', 'SponsorsController@edit');

    Route::resource('groups', 'GroupsController');

    Route::resource('teams', 'TeamsController');

    Route::resource('rounds', 'RoundsController');

    Route::resource('scores', 'LivescoresController');

    Route::get('listtournaments', 'LivescoresController@listtournaments');

    Route::get('listscores/{id}', 'LivescoresController@listscores');

    // Fetch Images
    Route::get('images/clubs/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/clubs/' . $filename)->response();
    });
    Route::get('images/golfcourses/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/golfcourses/' . $filename)->response();
    });
    Route::get('images/tournaments/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/tournaments/' . $filename)->response();
    });
    Route::get('images/sponsors/{filename}', function ($filename)
    {
        return Image::make(storage_path() . '/app/sponsors/' . $filename)->response();
    });
});
