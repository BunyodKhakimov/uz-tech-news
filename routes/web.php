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
Route::group(['middleware'=>['web']], function(){

	// PageController

	Route::get('/author/{author}', 'PageController@getByAuthor')
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

	// PostController & Resources

	Route::get('/post/hide/{id}', 'PostController@hiddenToggle')
		->name('hidePost')
		->middleware('auth');

	Route::resource('posts', 'PostController')
		->middleware('auth');

	// Resources

	Route::resource('categories', 'CategoryController', ['except' => ['create']])
		->middleware('auth');

	Route::resource('tags', 'TagController', ['except' => ['create']])
		->middleware('auth');

	// Auth

	Auth::routes();
	
});

