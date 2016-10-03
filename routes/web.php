<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::post(
	'braintree/webhook',
	'\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);
Route::group(['middleware' => 'auth'], function () {
	Route::get( '/subscription', 'Subscription@manage' );
	Route::get( '/subscription/join', 'Subscription@index' );
	Route::post( '/subscription', 'Subscription@join' );
});
