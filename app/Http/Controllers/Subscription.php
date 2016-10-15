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
	/** @var User $user */
	protected $user;

	public function __construct()
	{


	}



	public function join() {
		$this->user = Auth::user();
		$data = [
			'paymentMethodNonce' => Input::get( 'payment_method_nonce' ),
		];

		try {
			$subscription = $this->user->newSubscription( 'pdf', Input::get( 'plan' ) )->create( Input::get( 'payment_method_nonce' ), [
				'email' => $this->user->email
			] );
		} catch ( \ Exception $e ) {
			$message = $e->getMessage();

			return redirect( '/subscription/join?success=false&message=' . urlencode( $message ) );

		}

		$license_attrs = [
			'user_id'         => $this->user->id,
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

		$this->user = Auth::user();
		$clientToken = ClientToken::generate();

		return view('subscription-join', ['clientToken' => $clientToken ]);
	}

	public function manage()
	{
		$this->user = Auth::user();

		$subscription = $this->getSubscription();
		if( $subscription && ! $this->cancelled( $subscription ) ){
			/** @var Collection $licenses */
			$licenses = $this->getLicense( $subscription );
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

	public function cancel()
	{
		$this->user = Auth::user();

		$subscription =  $this->user->subscription('pdf')->cancel();
		if( ! $this->cancelled( $subscription ) ){
			return redirect( '/subscription?success=false' );
		}
		$licenses = $this->getLicenseBySubscription( $subscription );

		if( 0 < $licenses->count() ){
			foreach ( $licenses as $license ){
				$license->destroy( $license->id );
			}
		}


		return redirect( '/subscription?success=true' );
	}

	public function invoices()
	{
		$this->user = Auth::user();
		$invoices = $this->user->invoicesIncludingPending();

	}
	
	public function invoice( $id )
	{
		$this->user = Auth::user();
		return $this->user->downloadInvoice( $id, []);
	}


	protected function getLicense( $id )
	{

		return new License([ 'subscription_id' => $id ] );
	}

	/**
	 * @return \Laravel\Cashier\Subscription|null
	 */
	protected function getSubscription() {
		$subscription = $this->user->subscription( 'pdf' );

		return $subscription;
	}

	/**
	 * @param $subscription
	 *
	 * @return License
	 */
	protected function getLicenseBySubscription( $subscription ) {
		$licenses = License::where( 'subscription_id', $subscription->id )->get();

		return $licenses;
	}

	protected  function cancelled( \Laravel\Cashier\Subscription $subscription) :bool
	{
		if(  $subscription->cancelled() || strtotime( $subscription->ends_at ) < time() ){
			return true;
		}

		return false;
	}
}
