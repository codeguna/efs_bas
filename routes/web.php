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
    return view('login.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/inbox/list','InboxController@index');
Route::get('/inbox/create','InboxController@create');
Route::post('/inbox/store', 'InboxController@store');

Route::get('/outbox/create','OutboxController@create');
Route::get('/outbox/list','OutboxController@index');
Route::post('/outbox/store', 'OutboxController@store');
Route::get('/outbox/delete/{id}','OutboxController@delete');
Route::get('/outbox/trash', 'OutboxController@trash');
Route::get('/outbox/restore/{id}','OutboxController@restore');
Route::get('/outbox/delete_permanent/{id}','OutboxController@delete_permanent');


Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');
Route::get('/upload/hapus/{id}','UploadController@hapus');

Route::get('/outbox/json','OutboxController@json');