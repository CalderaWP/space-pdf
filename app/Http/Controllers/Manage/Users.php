<?php


namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Subscription;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class Users extends Manage {

	public function all() {
		$this->check();

		$users = User::all();

		return view( 'manage.users', [ 'users' => $users] );
	}
}
