<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Notifiable;
	use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'name',
		'email',
		'password',
		'api_token'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


	public function getApiTokenAttribute($value) : string
	{
		if( empty( $value ) ){
			$value = str_random( 21 );
		}

		return $value;
	}

	public function setApiTokenAttribute($value) : string
	{
		return $this->getApiTokenAttribute($value);
	}
}
