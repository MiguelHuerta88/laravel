<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', 'UserController@find');


/* RESTful bookstrore route*/
Route::group(['prefix' => 'books'], function(){
    //list all
    Route::get('/', 'BookStoreController@index')->name('books.index');

    // create
    Route::get('create', 'BookStoreController@create')->name('books.create');

    // store
    Route::post('/', 'BookStoreController@store')->name('books.store');

    // url for this will be books/{id} since we have the prefix
    Route::get('{id}', 'BookStoreController@show')->name('books.view');

    Route::get('{id}/edit', 'BookStoreController@edit')->name('books.edit');

    Route::put('{id}', 'BookStoreController@update')->name('books.update');

    Route::delete('{id}', 'BookStoreController@destroy')->name('books.delete');
});
