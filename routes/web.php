<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/media', 'MediaLibraryController@index')->name('media');
Route::get('/contact', 'ContactUsController@show')->name('contact');
Route::post('/contact', 'ContactUsController@store')->name('contact.store');

Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');
