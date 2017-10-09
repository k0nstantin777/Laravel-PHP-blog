<?php

Route::group(['prefix' => '/user'], function(){
    Route::get('/', 'UserController@index')
        ->name('admin.user.index');
    Route::get('/{id}', 'UserController@one')
        ->name('admin.user.one')
        ->where('id', '[0-9]+');
    Route::match(['get', 'post'], '/add', 'UserController@add')
        ->name('admin.user.add');
    Route::match(['get', 'post'], '/edit/{id}', 'UserController@edit')
        ->name('admin.user.edit')
        ->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'UserController@delete')
        ->name('admin.user.delete')
        ->where('id', '[0-9]+');
});

Route::group(['prefix' => '/post'], function(){
    Route::get('/', 'PostController@index')
        ->name('admin.post.index');
    Route::get('/{id}', 'PostController@one')
        ->name('admin.post.one')
        ->where('id', '[0-9]+');
    Route::match(['get', 'post'], '/add', 'PostController@add')
        ->name('admin.post.add');
    Route::match(['get', 'post'], '/edit/{id}', 'PostController@edit')
        ->name('admin.post.edit')
        ->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'PostController@delete')
        ->name('admin.post.delete')
        ->where('id', '[0-9]+');
});

