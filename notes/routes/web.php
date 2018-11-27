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
Route::get('/', 'NotesMainController@index');

Route::post('/add_note', 'NotesMainController@addNote');
Route::post('/add_list', 'NotesMainController@addList');

Route::get('/delete/{id}', 'NotesMainController@deleteRecord')->name('delete.record');

Route::get('/edit_note/{id}', 'NotesMainController@editNote')->name('edit.record');
Route::post('/update_note/{id}', 'NotesMainController@updateNote')->name('update.record');
