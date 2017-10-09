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

Route::get('/', 'MainController@mainPage')
        ->name('mainPage');

Route::get('/404', 'MainController@notFoundPage')
        ->name('notFoundPage');

Route::group(['prefix' => '/user'], function(){
    Route::match(['get', 'post'], '/login', 'Client\UserController@login')
        ->name('user.login');
    Route::match(['get', 'post'], '/reg', 'Client\UserController@reg')
        ->name('user.reg');
    Route::get('/unlogin', 'Client\UserController@unlogin')
        ->name('user.unlogin');
    
});

Route::group(['prefix' => '/post'], function(){
    Route::get('/', 'Client\PostController@index')
        ->name('post.index');
    Route::get('/{id}', 'Client\PostController@one')
        ->name('post.one')
        ->where('id', '[0-9]+');
    Route::match(['get', 'post'], '/add', 'Client\PostController@add')
        ->name('post.add');
    Route::match(['get', 'post'], '/edit/{id}', 'Client\PostController@edit')
        ->name('post.edit')
        ->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'Client\PostController@delete')
        ->name('post.delete')
        ->where('id', '[0-9]+');
});

