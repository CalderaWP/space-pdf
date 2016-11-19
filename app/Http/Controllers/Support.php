<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class Support extends Controller
{
	protected $name;

	protected  $email;

	public function send(Request $request){
		$user = Auth::user();
		$support_message = $request->input( 'message' );
		if( ! empty( $request->input( 'name' ) ) ){
			$this->name  = $request->input( 'name' );
		}else{
			$this->name = $user->name;
		}
		$this->email = $user->email;
		$data = [
			'email' => $user->email,
			'name' => $this->name,
			'support_message' => $support_message
		];

		//send to helpscout
		Mail::send('emails.support', $data, function ($message)
		{

			$message->from( $this->email, $this->name );
			$message->replyTo( $this->email, $this->name );
			$message->subject( 'Caldera Forms Space PDF Support Request' );
			$message->to('support.43374.13f73e4159a0ae63@helpscout.net' );

		});

		//send auto-response
		Mail::send('emails.support-thanks', $data, function ($message)
		{

			$message->from( 'no-reply@calderaWP.com', 'CalderaWP Support (no reply)' );
			$message->replyTo('no-reply@calderaWP.com', '' );
			$message->subject( 'Your Caldera Forms PDF Support Request Has Been Recieved' );
			$message->to($this->email, $this->name );

		});

		return redirect( '/support/thanks' );
	}

	public function form()
	{
		$user = Auth::user();
		return view( 'support.request', [
			'email' => $user->email,
			'name' => $user->name
		] );
	}

	public function thanks()
	{
		return view( 'support.thanks', [] );
	}
}
