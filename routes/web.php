<?php

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

	// PageController

	Route::get('/author/{id}', 'PageController@getByAuthor')
		->name('author');

	Route::get('/category/{category_id}', 'PageController@getByCategory')
		->name('category');

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

	Route::get('/profile', function()
	{ return view('users.profile'); })
	->name('profile')
	->middleware('auth');

	// PostController & Resources

	Route::get('/post/hide/{id}', 'PostController@hiddenToggle')
		->name('hidePost')
		->middleware('auth');

	Route::resource('posts', 'PostController')
		->middleware('admin');

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

	Route::resource('users', 'UserController', ['except' => ['create']])
		->middleware('admin');

	// Auth

	Auth::routes();

	// Language switcher

	Route::get('/{lang}', 'PageController@switchLanguage')->name('switch-lang');

});

