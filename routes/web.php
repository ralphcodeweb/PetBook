<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'PagesController@home');
Route::get('blog/{post}', 'PostsController@show')->name('post.show');

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth'
], function(){

	Route::get('/', 'AdminController@index')->name('dashboard');
	Route::get('posts', 'PostsController@index')->name('admin.posts.index');
	Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
	Route::post('posts', 'PostsController@store')->name('admin.posts.store');

	Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
	Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');

	Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');

	Route::delete('/posts/{photo}' ,'PhotosController@destroy')->name('admin.photos.destroy');

});

Auth::routes();
