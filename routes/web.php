<?php

Route::get('/', function () {
    return view('sessions.login');
});

Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');

//System Admin Middleware
Route::group(['prefix' => 'dashboard','middleware' => 'sysadmin', 'as'=>'dashboard.'], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('users', 'UsersController');
    Route::get('/documents', 'DocumentsController@index')->name('documents');
});

// LPTSI Middleware
Route::group(['prefix'=>'lptsi','middleware'=>'lptsi','as'=>'lptsi.'], function () {
    Route::get('/', 'Lptsicontroller@index')->name('home');
    Route::resource('users', 'UsersController');
    Route::get('/documents', 'DocumentsController@index')->name('documents');
    Route::resource('tickets', 'TicketsController');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
    Route::get('/comments', 'CommentsController@postComment')->name('comments');
    Route::post('/comments', 'CommentsController@postComment')->name('comments');
});

//Web Admin Middleware
Route::group(['prefix'=>'webadmin','middleware'=>'webadmin','as'=>'webadmin.'], function () {
    Route::get('/', 'WebAdmincontroller@index')->name('home');
    Route::resource('tickets', 'TicketsController');
    Route::get('/tickets', 'TicketsController@userTickets')->name('usertickets');
    Route::get('/comments', 'CommentsController@postComment')->name('comments');
    Route::post('/comments', 'CommentsController@postComment')->name('comments');
    Route::resource('documents', 'DocumentsController');
});

//Asisten Praktikum Middleware
Route::group(['prefix'=>'asprak','middleware'=>'asprak','as'=>'asprak.'], function () {
    Route::get('/', 'Asprakcontroller@index')->name('home');
    Route::resource('users', 'UsersController');
    Route::resource('documents', 'DocumentsController');
    Route::resource('reports', 'ReportsController');
});

//Default User Middleware (Praktikan)
Route::group(['prefix'=>'praktikan','middleware'=>'auth','as'=>'praktikan.'], function () {
    Route::get('/', 'Praktikancontroller@index')->name('home');
    Route::resource('documents', 'DocumentsController');
    Route::resource('reports', 'ReportsController');
    // Route::get('/submit', 'ReportsController@create')->name('submit');
});
