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

	Route::get('/author/{author}', 'PageController@getByAuthor')->name('author');

	Route::get('/category/{category}', 'PageController@getByCategory')->name('category');

	Route::get('/post/like/{id}', 'PageController@incrementLikes')->name('likePost');
	
	Route::get('/post/{id}', 'PageController@getSinglePost')->name('getSinglePost');

	Route::get('/post/hide/{id}', 'PostController@hiddenToggle')->name('hidePost')->middleware('auth');

	Route::get('/about', 'PageController@about');

	Route::get('/parts', 'PageController@parts');

	Route::get('/', 'PageController@index');

	Auth::routes();

	// Route::get('/home', 'HomeController@index')->name('home');

	// Route::get('/posts', 'PostController@index')->middleware('auth');
	
	Route::resource('posts', 'PostController')->middleware('auth');
});

