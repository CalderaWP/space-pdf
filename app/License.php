<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription;

class License extends Model
{
	protected $table = 'licenses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'code',
		'uses_month',
		'all_uses',
		'per_month',
		'subscription_id'
	];

	public function subscription()
	{
		return new Subscription( [
			'subscription_id' => $this->subscription_id ]
		);
	}

	public function getUser()
	{
		return new User( [
			'id' => $this->user_id
		] );
	}


}
