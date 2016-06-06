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
Route::pattern('id', '[0-9]+');

Route::get('/',  ['as' => 'home', 'uses' => 'SiteController@home']);

Route::get('/author/{id}',  ['as' => 'author', 'uses' => 'SiteController@postsByAuthor']);
Route::get('/tag/{id}',  ['as' => 'tag', 'uses' => 'SiteController@postsByTag']);
Route::get('/category/{id}',  ['as' => 'category', 'uses' => 'SiteController@postsByCategory']);
Route::get('/post/{id}',  ['as' => 'post', 'uses' => 'SiteController@post']);
Route::get('/authors',  ['as' => 'authors', 'uses' => 'SiteController@authors']);
Route::post('/post/comment/save/{id}',  ['as' => 'post.comment.save', 'uses' => 'SiteController@postCommentSave']);


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::get('/',  ['as' => 'index', 'uses' => 'Sys\Auth\AuthController@getLogin']);
    Route::get('/login',  ['as' => 'login', 'uses' => 'Sys\Auth\AuthController@getLogin']);
    Route::post('/login',  ['as' => 'postLogin', 'uses' => 'Sys\Auth\AuthController@postLogin']);
    Route::get('/logout',  ['as' => 'logout', 'uses' => 'Sys\Auth\AuthController@getLogout']);
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function(){
        Route::get('/', ['as' => 'main', 'uses' => 'Sys\DashboardController@main']);
    });

    Route::group(['as' => 'author.', 'prefix' => 'author'], function(){
        Route::get('/', ['as' => 'main', 'uses' => 'Sys\AuthorController@main']);
        Route::get('list', ['as' => 'list', 'uses' => 'Sys\AuthorController@showList']);
        Route::get('form/{id?}', ['as' => 'form', 'uses' => 'Sys\AuthorController@form']);
        Route::post('save/{id?}', ['as' => 'save', 'uses' => 'Sys\AuthorController@save']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Sys\AuthorController@destroy']);
    });

    Route::group(['as' => 'category.', 'prefix' => 'category'], function(){
        Route::get('/', ['as' => 'main', 'uses' => 'Sys\CategoryController@main']);
        Route::get('list', ['as' => 'list', 'uses' => 'Sys\CategoryController@showList']);
        Route::get('form/{id?}', ['as' => 'form', 'uses' => 'Sys\CategoryController@form']);
        Route::post('save/{id?}', ['as' => 'save', 'uses' => 'Sys\CategoryController@save']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Sys\CategoryController@destroy']);
    });

    Route::group(['as' => 'post.', 'prefix' => 'post'], function(){
        Route::get('/', ['as' => 'main', 'uses' => 'Sys\PostController@main']);
        Route::get('list', ['as' => 'list', 'uses' => 'Sys\PostController@showList']);
        Route::get('form/{id?}', ['as' => 'form', 'uses' => 'Sys\PostController@form']);
        Route::post('save/{id?}', ['as' => 'save', 'uses' => 'Sys\PostController@save']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Sys\PostController@destroy']);

        Route::group(['as' => 'comment.', 'prefix' => 'comment'], function(){
            Route::get('/{post_id}', ['as' => 'main', 'uses' => 'Sys\CommentController@main'])->where(['post_id' => '[0-9]+']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'Sys\CommentController@destroy']);
        });
    });

    Route::group(['as' => '', 'prefix' => 'tag'], function(){
        Route::get('/', ['as' => 'tag.main', 'uses' => 'Sys\TagController@main']);
        Route::get('list', ['as' => 'tag.list', 'uses' => 'Sys\TagController@showList']);
        Route::get('form/{id?}', ['as' => 'tag.form', 'uses' => 'Sys\TagController@form']);
        Route::post('save/{id?}', ['as' => 'tag.save', 'uses' => 'Sys\TagController@save']);
        Route::get('destroy/{id}', ['as' => 'tag.destroy', 'uses' => 'Sys\TagController@destroy']);
    });

    Route::group(['as' => '', 'prefix' => 'user'], function(){
        Route::get('/', ['as' => 'user.main', 'uses' => 'Sys\UserController@main']);
        Route::get('list', ['as' => 'user.list', 'uses' => 'Sys\UserController@showList']);
        Route::get('form/{id?}', ['as' => 'user.form', 'uses' => 'Sys\UserController@form']);
        Route::post('save/{id?}', ['as' => 'user.save', 'uses' => 'Sys\UserController@save']);
        Route::get('destroy/{id}', ['as' => 'user.destroy', 'uses' => 'Sys\UserController@destroy']);
    });

});