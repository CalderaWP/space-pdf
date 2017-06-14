<?php


namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Subscription;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class Users extends Manage {

	protected $downloadData;

	public function all() {
		if( ! $this->canManage() ){
			return redirect( 'login' );
		}


		$users = User::all();

		return view( 'manage.users', [ 'users' => $users] );
	}


}
