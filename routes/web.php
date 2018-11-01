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
Route::get('/posts', 'PostController@index')->name('posts');
Route::resource('posts', 'PostController')->only('show');
Route::get('/media', 'MediaLibraryController@index')->name('media');
Route::resource('media', 'MediaLibraryController')->only('show');
Route::get('/media-card/{id}', 'MediaLibraryController@showCard');
Route::post('/contact-us', 'ContactUsController@mailToAdmin')->name('mail-to-admin');
Route::resource('users', 'UserController')->only('show');

Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');
