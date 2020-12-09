<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['web', 'locale']], function(){

    // Api news

    Route::get('/external', 'ApiNewsController@index')
        ->name('external');

    // SearchController

    Route::get('/author/{id}', 'SearchController@getByAuthor')
        ->name('author');

    Route::get('/category/{category_id}', 'SearchController@getByCategory')
        ->name('category');

    Route::get('/tag/{tag_id}', 'SearchController@getByTag')
        ->name('tag');

	// PageController

	Route::get('/post/like/{id}', 'PageController@incrementLikes')
		->name('likePost');

	Route::get('/post/{id}', 'PageController@getSinglePost')
		->name('getSinglePost');

	Route::get('/about', 'PageController@about')
		->name('about');

	Route::get('/contact', 'PageController@contact')
		->name('contact');

	Route::post('/contact', 'PageController@postContact')
		->name('postContact');

	Route::get('/parts', 'PageController@parts');

	Route::get('/', 'PageController@index')
		->name('home');

	// PostController & Resources

    Route::get('/suggest', 'PostController@create')
        ->name('suggest')
        ->middleware('auth');

	Route::get('/post/hide/{id}', 'PostController@hiddenToggle')
		->name('hidePost')
		->middleware('admin');

	Route::resource('posts', 'PostController');

	// Resources

	// Route::resource('comments', 'CategoryController',
	// 	['except' => ['index', 'show', 'create']])
	// 	->middleware('auth');

	Route::post('/comments/{post_id}', 'CommentController@store')
	    ->name('comments.store')
        ->middleware('auth');

	Route::resource('categories', 'CategoryController', ['except' => ['create', 'show']])
		->middleware('admin');

	Route::resource('tags', 'TagController', ['except' => ['create', 'show']])
		->middleware( 'admin');

	// User

    Route::get('/profile', function()
    { return view('users.profile'); })
        ->name('profile')
        ->middleware('auth');

	Route::resource('users', 'UserController', ['except' => ['create']])
		->middleware('admin');

	Route::get('/new-admin/{id}', 'UserController@makeAdmin')
        ->name('make-admin')
        ->middleware('admin');

	// Auth

	Auth::routes();

	// Language switcher

	Route::get('/{lang}', 'HomeController@switchLanguage')->name('switch-lang');

});

