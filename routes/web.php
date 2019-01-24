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


Route::get('/books', [
    'uses' => 'BooksController@index',
    'as' => 'books'
]);

Route::get('/books/edit/{id}', [
    'uses' => 'BooksController@edit',
    'as' => 'book.edit'
]);

Route::post('/books/store', [
    'uses' => 'BooksController@store',
    'as' => 'book.store'
]);


Route::get('/books/delete/{id}', [
    'uses' => 'BooksController@delete',
    'as' => 'book.delete'
]);

Route::post('/books/update/{id}', [
    'uses' => 'BooksController@update',
    'as' => 'book.update'
]);

Route::get('/books/create', [
    'uses' => 'BooksController@create',
    'as' => 'book.create'
]);
