<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 10/15/16
 * Time: 7:27 PM
 */

namespace App\Http\Controllers\Manage;


use App\Http\Controllers\Controller;
use App\License;
use App\User;

class Manage  extends Controller {
	use \App\Http\manage;


	/**
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
	 */
	protected function check()
	{
		if( ! $this->canManage() ){
			return redirect( 'login' );
		}

	}

	public function links()
	{
		if( ! $this->canManage() ){
			return redirect( 'login' );
		}
		return view( 'manage.links' );
	}

	public function give( $id ){
		$license = new License([ 'subscription_id' => 'x' . $id, 'code' => $this->generateCode() ] );
		$license->save();
		var_dump( $license->code );
		exit;
	}
}