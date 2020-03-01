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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tags', 'TagController@index')->name('tag.index');
    Route::get('/tags/{id}/edit', 'TagController@edit')->name('tag.edit');
    Route::get('/tags/create', 'TagController@create')->name('tag.create');
    Route::post('/tags', 'TagController@store')->name('tag.store');
    Route::put('/tags/{id}', 'TagController@update')->name('tag.update');
    Route::delete('/tags/{id}', 'TagController@destroy')->name('tag.destroy');

    Route::get('/repositories', 'ApiController@index')->name('repository.index');


});