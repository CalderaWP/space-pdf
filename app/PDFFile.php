<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDFFile extends Model
{
	protected $table = 'pdfs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'user_id',
		'hash',
		'entry_id',
		'form_id',
		'license_id'
	];


	public function user()
	{
		return $this->hasOne( 'App\User' );
	}

	public function license()
	{
		return $this->hasMany( 'App\License' );
	}
}
