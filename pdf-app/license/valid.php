<?php

namespace calderawp\fw\pdf\license;


use App\License;

class valid {

	/**
	 * @var License
	 */
	protected  $license;

	public function __construct( License $license ) {
		$this->license = $license;
	}

	public function needsReset(){
		if(strtotime( $this->license->updated_at ) < strtotime('-1 Months')){
			return true;
		} else {
			return false;
		}
	}


	public function overUsed(){
		if(  $this->license->uses_month > $this->license->per_month ){
			return true;
		}

	}

}