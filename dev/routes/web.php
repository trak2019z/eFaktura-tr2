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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('/klienci', 'ClientsController@index')->name('clients.index');
	Route::get('/klienci.create', 'ClientsController@create')->name('clients.create');
	
	Route::get('faktury', [
        'uses' => 'InvoiceController@index',
        'as' => 'invoice.index'
    ]);

    Route::get('faktury/create', [
        'uses' => 'InvoiceController@create',
        'as' => 'invoice.create'
    ]);

    Route::post('faktury/store', [
        'uses' => 'InvoiceController@store',
        'as' => 'invoice.store'
    ]);

    Route::get('faktury/edit/{id}', [
        'uses' => 'InvoiceController@edit',
        'as' => 'invoice.edit'
    ]);

    Route::put('faktury/{id}', [
        'uses' => 'InvoiceController@update',
        'as' => 'invoice.update'
    ]);

    Route::delete('faktury/{id}', [
        'uses' => 'InvoiceController@destroy',
        'as' => 'invoice.destroy'
    ]);

    Route::get('faktury/pdf/{invoice}', [
        'uses' => 'InvoiceController@generatePDFInvoice',
        'as' => 'invoice.generatePDF',
    ]);

    Route::get('uzytkownik/{id}/faktury/{invoice}', [
        'uses' => 'InvoiceController@show',
        'as' => 'invoice.show',
    ]);


     Route::get('klienci', [
        'uses' => 'ClientsController@index',
        'as' => 'client.index'
    ]);
     Route::get('klienci/create', [
        'uses' => 'ClientsController@create',
        'as' => 'client.create'
    ]);

    Route::post('klienci/store', [
        'uses' => 'ClientsController@store',
        'as' => 'client.store'
    ]);

    Route::get('klienci/edit/{id}', [
        'uses' => 'ClientsController@edit',
        'as' => 'client.edit'
    ]);

    Route::put('klienci/{id}', [
        'uses' => 'ClientsController@update',
        'as' => 'client.update'
    ]);

    Route::delete('klienci/{id}', [
        'uses' => 'ClientsController@destroy',
        'as' => 'client.destroy'
    ]);
});
