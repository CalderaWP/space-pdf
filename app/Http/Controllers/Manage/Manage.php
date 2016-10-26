<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 10/15/16
 * Time: 7:27 PM
 */

namespace App\Http\Controllers\Manage;


use App\Http\Controllers\Controller;

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
		$this->check();
		return view( 'manage.links' );
	}

}