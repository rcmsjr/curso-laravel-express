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

Route::get('/author/{id}',  ['as' => 'author', 'uses' => 'SiteController@postsByAuthor'])->where(['id' => '[0-9]+']);
Route::get('/tag/{id}',  ['as' => 'tag', 'uses' => 'SiteController@postsByTag'])->where(['id' => '[0-9]+']);
Route::get('/category/{id}',  ['as' => 'category', 'uses' => 'SiteController@postsByCategory'])->where(['id' => '[0-9]+']);
Route::get('/post/{id}',  ['as' => 'post', 'uses' => 'SiteController@post'])->where(['id' => '[0-9]+']);
Route::get('/authors',  ['as' => 'authors', 'uses' => 'SiteController@authors']);
Route::post('/post/comment/save/{id}',  ['as' => 'post.comment.save', 'uses' => 'SiteController@postCommentSave'])->where(['id' => '[0-9]+']);


Route::get('/logout', function() {
    Auth::logout();
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',  ['as' => 'admin', 'uses' => 'Sys\Auth\AuthController@getLogin']);
    Route::get('/login',  ['as' => 'login', 'uses' => 'Sys\Auth\AuthController@getLogin']);
    Route::post('/login',  ['as' => 'postLogin', 'uses' => 'Sys\Auth\AuthController@postLogin']);
    Route::get('/logout',  ['as' => 'logout', 'uses' => 'Sys\Auth\AuthController@getLogout']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', ['as' => 'dashboard.main', 'uses' => 'Sys\DashboardController@main']);
    });

    Route::group(['prefix' => 'author'], function(){
        Route::get('/', ['as' => 'author.main', 'uses' => 'Sys\AuthorController@main']);
        Route::get('list', ['as' => 'author.list', 'uses' => 'Sys\AuthorController@showList']);
        Route::get('form/{id?}', ['as' => 'author.form', 'uses' => 'Sys\AuthorController@form'])->where(['id' => '[0-9]+']);
        Route::post('save/{id?}', ['as' => 'author.save', 'uses' => 'Sys\AuthorController@save'])->where(['id' => '[0-9]+']);
        Route::get('destroy/{id}', ['as' => 'author.destroy', 'uses' => 'Sys\AuthorController@destroy'])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'category'], function(){
        Route::get('/', ['as' => 'category.main', 'uses' => 'Sys\CategoryController@main']);
        Route::get('list', ['as' => 'category.list', 'uses' => 'Sys\CategoryController@showList']);
        Route::get('form/{id?}', ['as' => 'category.form', 'uses' => 'Sys\CategoryController@form'])->where(['id' => '[0-9]+']);
        Route::post('save/{id?}', ['as' => 'category.save', 'uses' => 'Sys\CategoryController@save'])->where(['id' => '[0-9]+']);
        Route::get('destroy/{id}', ['as' => 'category.destroy', 'uses' => 'Sys\CategoryController@destroy'])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'post'], function(){
        Route::get('/', ['as' => 'post.main', 'uses' => 'Sys\PostController@main']);
        Route::get('list', ['as' => 'post.list', 'uses' => 'Sys\PostController@showList']);
        Route::get('form/{id?}', ['as' => 'post.form', 'uses' => 'Sys\PostController@form'])->where(['id' => '[0-9]+']);
        Route::post('save/{id?}', ['as' => 'post.save', 'uses' => 'Sys\PostController@save'])->where(['id' => '[0-9]+']);
        Route::get('destroy/{id}', ['as' => 'post.destroy', 'uses' => 'Sys\PostController@destroy'])->where(['id' => '[0-9]+']);

        Route::group(['prefix' => 'comment'], function(){
            Route::get('/{post_id}', ['as' => 'post.comment.main', 'uses' => 'Sys\CommentController@main'])->where(['post_id' => '[0-9]+']);
            Route::get('destroy/{id}', ['as' => 'post.comment.destroy', 'uses' => 'Sys\CommentController@destroy'])->where(['id' => '[0-9]+']);
        });
    });

    Route::group(['prefix' => 'tag'], function(){
        Route::get('/', ['as' => 'tag.main', 'uses' => 'Sys\TagController@main']);
        Route::get('list', ['as' => 'tag.list', 'uses' => 'Sys\TagController@showList']);
        Route::get('form/{id?}', ['as' => 'tag.form', 'uses' => 'Sys\TagController@form'])->where(['id' => '[0-9]+']);
        Route::post('save/{id?}', ['as' => 'tag.save', 'uses' => 'Sys\TagController@save'])->where(['id' => '[0-9]+']);
        Route::get('destroy/{id}', ['as' => 'tag.destroy', 'uses' => 'Sys\TagController@destroy'])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', ['as' => 'user.main', 'uses' => 'Sys\UserController@main']);
        Route::get('list', ['as' => 'user.list', 'uses' => 'Sys\UserController@showList']);
        Route::get('form/{id?}', ['as' => 'user.form', 'uses' => 'Sys\UserController@form'])->where(['id' => '[0-9]+']);
        Route::post('save/{id?}', ['as' => 'user.save', 'uses' => 'Sys\UserController@save'])->where(['id' => '[0-9]+']);
        Route::get('destroy/{id}', ['as' => 'user.destroy', 'uses' => 'Sys\UserController@destroy'])->where(['id' => '[0-9]+']);
    });

});