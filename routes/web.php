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



// user Register
Route::get('/register', 'AuthController@registerView')->name('auth-index');
Route::post('/register/store', 'AuthController@store')->name('auth-store');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginAuth')->name('auth-login');


Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/posts', 'postController@index')->name('index');
Route::get('/posts/show/{post}', 'PostController@show')->name('show');

Route::get('/verifyemail/{token}', 'AuthController@verify')->name('verify');
// ======================================================
Route::middleware(['auth'])->group(function () {
	
	// =========================================================

	Route::get('/posts/create', 'PostController@create');

	Route::post('/posts/store', 'PostController@store')->name('store');

	// Comment
	Route::post('/posts/comment/{post}', 'CommentController@store')->name('comment');

	// Comment
	Route::post('/posts/comment/replay/{reply}', 'ReplyController@store')->name('reply');

});