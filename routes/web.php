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

Route::get('/', 'MainController@index')
        ->name('mainPage');

Route::get('/404', 'MainController@notFoundPage')
        ->name('notFoundPage');

Route::get('/feedback', 'PageController@feedBack')
        ->name('feedBackPage');

Route::get('/contacts', 'PageController@contacts')
        ->name('contactsPage');

Route::get('/about', 'PageController@about')
        ->name('aboutPage');
        
Route::group(['prefix' => '/user'], function(){
    Route::get('/login', 'UserController@login')
        ->name('user.login');
    Route::post('/login', 'UserController@loginPost')
        ->name('user.loginPost');
    Route::get('/registration', 'UserController@registration')
        ->name('user.register');
    Route::post('/registration', 'UserController@registrationPost')
        ->name('user.registerPost');
    Route::get('/logout', 'UserController@logout')
        ->name('user.logout');
    
});

Route::group(['prefix' => '/post'], function(){
    Route::get('/', 'PostController@index')
        ->name('post.index');
    Route::get('/categories', 'PostController@categories')
        ->name('post.categories');
    Route::get('/{id}', 'PostController@show')
        ->name('post.show')
        ->where('id', '[0-9]+');
    Route::match(['get', 'post'], '/add', 'PostController@add')
        ->name('post.add');
    Route::match(['get', 'post'], '/edit/{id}', 'PostController@edit')
        ->name('post.edit')
        ->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'PostController@delete')
        ->name('post.delete')
        ->where('id', '[0-9]+');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
