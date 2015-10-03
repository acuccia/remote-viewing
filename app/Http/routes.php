<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');

Route::post('/home', 'TrialsController@walkthrough');

Route::get('/trials/setStage/{id}/{stage}', 'TrialsController@setStage');
Route::post('/trials/{id}/savenotes', 'TrialsController@saveNotes');
Route::post('/trials/{id}/savechoices', 'TrialsController@saveChoices');
Route::get('/trials/{id}/score', 'TrialsController@score');
Route::get('/trials/{id}/edit', 'TrialsController@edit');
Route::get('/trials/{id}/confirm', 'TrialsController@confirm');
Route::get('/trials/{id}/next', 'TrialsController@next');

Route::resource('locations', 'LocationsController');
Route::resource('experiments', 'ExperimentsController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

