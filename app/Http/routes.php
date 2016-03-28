<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     //return view('welcome');
//     //return 'Hi there!';
//     $people = ['Taylor', 'Boda', 'Jeffrey'];
//     return view('welcome', compact('people'));
//     //return view('welcome')->with('people', $people);
//     //return view('welcome')->with(['people'=>$people]);
// });

Route::get('/', 'PagesController@home');

// Route::get('about', function () {
//     //return view('welcome');
//     return view('pages.about');
// });


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('about', 'PagesController@about');

    Route::get('cards', 'CardsController@index');
    Route::get('cards/{card}', 'CardsController@show');
    Route::post('cards/{card}/notes', 'NotesController@store');

    Route::get('notes/{note}/edit', 'NotesController@edit');
    Route::patch('notes/{note}', 'NotesController@update');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
