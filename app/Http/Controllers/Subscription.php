<?php

namespace App\Http\Controllers;

use App\License;
use App\User;
use Braintree\ClientToken;


use App\Http\Requests;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class Subscription extends Controller
{


	public function join() {

		$data = [
			'paymentMethodNonce' => Input::get( 'payment_method_nonce' ),
		];
		/** @var User $user */
		$user = Auth::user();
		try {

			$subscription = $user->newSubscription( 'pdf', Input::get( 'plan' ) )->create( Input::get( 'payment_method_nonce' ), [
				'email' => $user->email
			] );
		} catch ( \ Exception $e ) {
			$message = $e->getMessage();

			return redirect( '/subscription?success=false&message=' . urlencode( $message ) );

		}

		$license_attrs = [
			'user_id'         => $user->id,
			'code'            => str_random( 21 ),
			'uses_month'      => 0,
			'all_uses'        => 0,
			'subscription_id' => $subscription->id,
		];

		if ( Input::get( 'plan' ) == 'caldera-space-pdf-two' ) {
			$per_month = 5000;
		} else {
			$per_month = 1000;
		}

		$license_attrs[ 'per_month' ] = $per_month;
		$license = new License( $license_attrs );
		try {
			$license->save();
		} catch ( \Exception $e ) {
			$message = $e->getMessage();

			return redirect( '/subscription?success=false&message=' . urlencode( $message ) );
		}

		return redirect( '/subscription?success=true' );
	}

	public function index()
	{


		$clientToken = ClientToken::generate();

		return view('subscription-join', ['clientToken' => $clientToken ]);
	}

	public function manage()
	{
		/** @var User $user */
		$user = Auth::user();
		$subscription = $user->subscription( 'pdf' );
		if( $subscription ){
			/** @var Collection $licenses */
			$licenses = License::where( 'subscription_id', $subscription->id )->get();
			if( 0 < $licenses->count() ){
				$license = $licenses->first();
				$code = $license->code;
			}else{
				$code = 'Not Found';
			}

			$subscriptions = [ $subscription ];
		}else{
			$code = 'No Active Subscription';
			$subscriptions = [];
		}


		return view('subscription-manage', ['subscriptions' => $subscriptions, 'code' => $code ]);

	}


	protected function getLicense( $id )
	{
		return new License([ 'subscription_id' => $id ] );
	}
}
