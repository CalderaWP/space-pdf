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
Route::get('/privacy', function(){
	return view( 'privacy' );
});


Route::post(
	'braintree/webhook',
	'\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::group(['middleware' => 'auth'], function () {
	Route::get( '/subscription', 'Subscription@manage' );
	Route::get( '/subscription/join', 'Subscription@index' );
	Route::get( '/subscription/cancel', 'Subscription@cancel' );
	Route::get( '/subscription/invoices', 'Subscription@invoices' );
	Route::get( '/subscription/invoices/{id}', 'Subscription@invoice' );
	Route::post( '/subscription', 'Subscription@join' );
});

Route::get('/hiroy', function(){
	$loaded = extension_loaded('ssh2' );
	$exists =function_exists( 'ssh2_connect' );
	return new \Illuminate\Http\Response( var_export( array( 'exists' => $exists, 'lodaded' => $loaded ), true ) );
});


Route::get( 'manage/subscriptions', 'Manage\Subscriptions@all' );
Route::get( 'manage/users', 'Manage\Users@all' );
Route::get( 'manage/', 'Manage\Manage@links' );
Route::get( 'manage/switch/{id}', 'Manage\UserSwitch@start' );
Route::get( 'manage/switch/stop', 'Manage\UserSwitch@start' );
