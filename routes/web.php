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
	Route::get( 'manage/subscriptions', 'Manage\Subscriptions@all' );
	Route::get( 'manage/users', 'Manage\Users@all' );
	Route::get( 'manage/give/license/{id}', 'Manage\Users@give' );


	Route::get( 'manage/', 'Manage\Manage@links' );
	Route::get( 'manage/switch/{id}', 'Manage\UserSwitch@start' );
	Route::get( 'manage/switch/stop', 'Manage\UserSwitch@stop' );
	Route::post('/support/send', 'Support@send');

	Route::get('/support', 'Support@form');
	Route::get('/support/thanks', 'Support@thanks');

});

Route::get('/hiroy', function(){
	$loaded = extension_loaded('ssh2' );
	$exists =function_exists( 'ssh2_connect' );
	return new \Illuminate\Http\Response( var_export( array( 'exists' => $exists, 'lodaded' => $loaded ), true ) );
});


Route::get( 'wp/plugins/{slug}', 'Plugin@downloads' );

Route:get( '/manage/in', function(){
	$user = Auth::user();
	if( 1 == $user->id ){
		return false;
	}

	$x = [];
	foreach( [ 83, 96 ] as $uID ){
		$user = \App\User::find( $uID );
		$x[ $uID ] = $user->invoicesIncludingPending();
	}

	var_export( $x );
	exit;

});