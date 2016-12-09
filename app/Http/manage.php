<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 10/15/16
 * Time: 7:24 PM
 */

namespace App\Http;


use Illuminate\Support\Facades\Auth;

trait manage {

	protected $ids = [1,3];

	public function canManage() :bool
	{
		$user = Auth::user();
		if( $user && in_array( $user->id, $this->ids ) ){
			return true;
		}

		return false;
	}

	protected function generateCode() : string
	{
		return str_random( 21 );
	}

}