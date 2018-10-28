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
Route::resource('media', 'MediaLibraryController')->only('show');
Route::resource('users', 'UserController')->only('show');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/media', 'MediaLibraryController@index')->name('media');
Route::post('/contact-us', 'ContactUsController@mailToAdmin')->name('mail-to-admin');

Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');
