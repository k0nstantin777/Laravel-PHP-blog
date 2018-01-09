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

Route::get('/', 'PostController@index')
        ->name('mainPage');

Route::get('/feedback', 'PageController@feedBack')
        ->name('feedBackPage');
Route::post('/feedback', 'PageController@feedBackPost')
        ->name('feedBackPagePost');

Route::get('/contacts', 'PageController@contacts')
        ->name('contactsPage');

Route::get('/about', 'PageController@about')
        ->name('aboutPage');
        
Route::get('/login', 'UserController@login')
    ->name('login');
Route::post('/login', 'UserController@loginPost')
    ->name('loginPost');

Route::get('/registration', 'UserController@registration')
    ->name('register');
Route::post('/registration', 'UserController@registrationPost')
    ->name('registerPost');

Route::get('/logout', 'UserController@logout')
    ->name('logout');

Route::group(['prefix' => '/post'], function(){
    Route::get('/', 'PostController@index')
        ->name('post.index');
    Route::get('/create', 'PostController@create')
        ->name('post.create')
        ->middleware('auth');
    Route::get('/{post}', 'PostController@show')
        ->name('post.show')
        ->where('slug', '[a-zA-Z0-9-]+');
    Route::get('/tag/{name}', 'PostController@postsByTag')
        ->name('post.tag.show')
        ->where('name', '[а-яА-Яa-zA-Z0-9- ]+');
    Route::get('/archive/{date}', 'PostController@postsByDate')
        ->name('post.archive.show')
        ->where('data', '[а-яА-Яa-zA-Z0-9- ]+');
    Route::get('/create', 'PostController@create')
        ->name('post.create')
        ->middleware('auth');
    Route::post('/create', 'PostController@createPost')
        ->name('post.createPost')
        ->middleware('auth');
    Route::get('/edit/{post}', 'PostController@edit')
        ->name('post.edit')
        ->where('slug', '[a-zA-Z0-9-]+')
        ->middleware('auth');
    Route::post('/edit/{post}', 'PostController@editPost')
        ->name('post.editPost')
        ->where('slug', '[a-zA-Z0-9-]+')
        ->middleware('auth');
    Route::get('/delete/{post}', 'PostController@delete')
        ->name('post.delete')
        ->where('slug', '[a-zA-Z0-9-]+')
        ->middleware('auth');
    Route::post('/{slug}/comment/create', 'PostController@createComment')
        ->name('post.createComment')
        ->where('slug', '[a-zA-Z0-9-]+');
    
      
});

Route::group(['prefix' => '/category'], function(){
        Route::get('/', 'PageController@categories'            
        )->name('post.categories');
        Route::get('/{category}', 'PostController@postsByCat')
            ->name('category.show')
            ->where('slug', '[a-zA-Z0-9-]+');
});  

Route::get('/vue', 'PageController@vueTest');
