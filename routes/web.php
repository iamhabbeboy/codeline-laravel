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


Auth::routes();

Route::get('/',                 'ApiController@index');
Route::get('/films/home',        'HomeController@index')->name('home');
Route::get('/films/create',      'HomeController@create')->name('create');
Route::get('/films/comment',     'HomeController@comment')->name('comment');

Route::prefix('films')->group(function() {

    Route::get('/',                     'ApiController@listing');
    Route::get('/film-{title}',          'ApiController@single');
    Route::get('/auth',                 'ApiController@authCheck');
    Route::post('/comment/{id}',        'ApiController@addComment');

});

// Route::get('/vue/{vue_capture?}', function () {
//     return view('welcome');
// })->where('vue_capture', '[\/\w\.-]*');