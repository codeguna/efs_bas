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

Route::middleware(['auth'])->group(function () {
    Route::get('/inbox/list','InboxController@index');
    Route::get('/inbox/create','InboxController@create');
    Route::post('/inbox/store', 'InboxController@store');
    Route::get('/inbox/delete/{id}','InboxController@delete');
    Route::get('/inbox/restore/{id}','InboxController@restore');
    Route::get('/inbox/delete_permanent/{id}','InboxController@delete_permanent');
    Route::get('/inbox/trash', 'InboxController@trash');
    Route::get('/inbox/edit/{id}','InboxController@edit');
    Route::get('/inbox/report','InboxController@report');
    Route::get('/inbox/search','InboxController@search');
    Route::get('/inbox/proceedReport','InboxController@proceedReport');
    Route::get('/inbox/printReport','InboxController@printReport');
    Route::put('/inbox/update/{id}','InboxController@update');
    Route::get('/inbox/inboxTrashSearch','InboxController@inboxTrashSearch');

    Route::get('/outbox/outboxTrashSearch','OutboxController@outboxTrashSearch');
    Route::get('/outbox/create','OutboxController@create');
    Route::get('/outbox/list','OutboxController@index');
    Route::post('/outbox/store', 'OutboxController@store');
    Route::get('/outbox/delete/{id}','OutboxController@delete');
    Route::get('/outbox/edit/{id}','OutboxController@edit');
    Route::put('/outbox/update/{id}','OutboxController@update');
    Route::get('/outbox/trash', 'OutboxController@trash');
    Route::get('/outbox/restore/{id}','OutboxController@restore');
    Route::get('/outbox/delete_permanent/{id}','OutboxController@delete_permanent');
   /*  Route::get('/outbox/json','OutboxController@json');
    Route::get('/outbox/jsonIndex','OutboxController@jsonIndex'); */
    Route::get('/outbox/search','OutboxController@search');
    Route::get('/outbox/report','OutboxController@report');
    Route::get('/outbox/proceedReport','OutboxController@proceedReport');
    Route::get('/outbox/printReport','OutboxController@printReport');

    Route::get('/upload', 'UploadController@upload');
    Route::post('/upload/proses', 'UploadController@proses_upload');
    Route::get('/upload/hapus/{id}','UploadController@hapus');

});


