<?php

Route::get('dashboard', 'ShowDashboard')->name('dashboard');
Route::resource('posts', 'PostController');
Route::delete('/posts/{post}/thumbnail', 'PostThumbnailController@destroy')->name('posts_thumbnail.destroy');
Route::resource('users', 'UserController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('contacts', 'ContactController')->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('customize-site', 'CustomizeSiteController')->only(['index']);
Route::put('/customize-site/{id}', 'CustomizeSiteController@update')->name('customize-site.update');
