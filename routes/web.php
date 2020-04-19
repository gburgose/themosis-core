<?php

/**
 * Application routes.
 */

Route::get('front', 'Web\WelcomeController@index');

Route::get('template', ['about', 'uses' => 'Web\AboutController@index']);
Route::get('template', ['contact', 'uses' => 'Web\ContactController@index']);
Route::post('contact', 'Web\ContactController@store');

Route::get('postTypeArchive', ['services', 'uses' => 'Web\ServiceController@index']);
Route::get('singular', ['services', 'uses' => 'Web\ServiceController@show']);

Route::get('postTypeArchive', ['projects', 'uses' => 'Web\ProjectController@index']);
Route::get('singular', ['projects', 'uses' => 'Web\ProjectController@show']);
