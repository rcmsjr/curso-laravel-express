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

Route::get('/',  ['as' => 'home', 'uses' => 'SiteController@home']);

Route::get('/category/{id}',  ['uses' => 'SiteController@postsByCategory'])->where(['id' => '[0-9]+']);
Route::get('/post/{id}',  ['uses' => 'SiteController@post'])->where(['id' => '[0-9]+']);