<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 10/26/16
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Manage;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserSwitch extends Manage{

	public function start( $new_user )
	{
		if( ! $this->canManage() ){
			return redirect( 'login' );
		}

		$new_user = User::find( $new_user );
		Session::put( 'orig_user', Auth::id() );
		Auth::login( $new_user );
		return Redirect::back();
	}

	public function stop()
	{
		if( ! $this->canManage() ){
			return redirect( 'login' );
		}
		$id = Session::pull( 'orig_user' );
		$orig_user = User::find( $id );
		Auth::login( $orig_user );
		return Redirect::back();
	}
}