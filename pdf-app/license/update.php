<?php

namespace calderawp\fw\pdf\license;


use App\License;

class update {

	/**
	 * @var License
	 */
	protected  $license;
	public function __construct( License $license ) {
		$this->license = $license;

	}

	public function changeMonthly( $uses )
	{
		$this->license->per_month = intval( $uses );
		return $this->license->save();
	}

	public function resetUses(){

		$this->license->uses_month = 0;
		return $this->license->save();
	}

	public function incrementUse(){
		$this->license->all_uses++;
		$this->license->uses_month++;
		return $this->license->save();
	}



}