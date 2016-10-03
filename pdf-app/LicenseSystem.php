<?php

namespace calderawp\fw\pdf;


use App\License;
use calderawp\fw\pdf\license\find;
use calderawp\fw\pdf\license\update;
use calderawp\fw\pdf\license\valid;

class LicenseSystem {

	/**
	 * @var License
	 */
	protected $license;

	/**
	 * @var update
	 */
	protected $updater;

	/**
	 * @var valid
	 */
	protected $validator;

	/**
	 * @var bool
	 */
	protected $valid = false;

	public function __construct( License $license  ){
		$this->license = $license;

	}

	/**
	 * @return string|void
	 */
	public function getID()
	{
		return $this->license->id;
	}

	/**
	 * @return bool
	 */
	public function isValid(){
		return $this->valid;
	}

	public function run(){

		$this->setUpdater();
		$this->set_validator();
		$this->valid = $this->validate();

	}

	public function isOverUsed() :bool
	{
		return  $this->validator->overUsed();
	}



	/**
	 * @return mixed
	 */
	public function increment(){
		return $this->updater->incrementUse();
	}


	protected function setUpdater(){
		$this->updater = new update( $this->license );
	}

	/**
	 * @return bool
	 */
	protected function validate(){

		if( $this->validator->needsReset() ){
			$this->updater->resetUses();
			return true;

		}elseif( $this->validator->overUsed() ){
			return false;
		}else{
			return true;
		}
	}

	/**
	 * @return valid
	 */
	protected function set_validator() {
		$this->validator = new valid( $this->license );
	}


}