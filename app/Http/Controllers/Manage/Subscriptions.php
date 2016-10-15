<?php

namespace App\Http\Controllers\Manage;

use App\Http\manage;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laravel\Cashier\Subscription;

class Subscriptions extends \App\Http\Controllers\Manage\Manage
{

	public function all()
	{
		$this->check();
		$subscriptions = Subscription::all();

		return view( 'manage.subscriptions', [ 'subscriptions' => $this->prepareSubscriptions( $subscriptions ) ]);
	}

	protected function prepareSubscriptions( Collection $subscriptions ) :array
	{
		$data = [];
		if( 0 < $subscriptions->count() ){
			foreach ($subscriptions  as $subscription ){
				$data[] = $this->addUser( $subscription );
			}
		}

		return $data;
	}

	protected function addUser( Subscription $subscription ) : \stdClass
	{
		$user = User::find( $subscription->id );
		$data = $subscription->toArray();
		if ( $user  ) {
			$data[ 'user' ] = $user->toArray();
		}else{
			$data[ 'user' ] = [ 'id' => 0 ];
		}
		return (object) $data;
	}
}
