<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\License;
use App\PDFFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class PDFController
 *
 * Base class for PDF creation and downloading
 *
 * @package App\Http\Controllers
 */
abstract class PDFController extends Controller{

	/**
	 * Root for storage
	 *
	 * @var string
	 */
	protected $disk = 'local';

	/**
	 * Check if we have a valiud PDFFile object representing a PDF that exists
	 *
	 * @param \App\PDFFile $pdf
	 *
	 * @return bool
	 */
	protected function exists( $pdf ) : bool
	{
		if( is_object( $pdf ) && is_a( $pdf, 'App\PDFFile') && $this->pdfExists( $pdf ) ){
			return true;
		}

		return false;
	}

	/**
	 * Store a PDF
	 *
	 * @param  PDFFile $PDFFile
	 * @param string $contents
	 *
	 * @return bool
	 */
	protected function storePDF( PDFFile $PDFFile, $contents ) : bool
	{
		$file_name = $this->getFileName( $PDFFile );
		$created = Storage::disk( $this->disk  )->put( $file_name, $contents );

		return $created;
	}

	/**
	 * Get PDF contents
	 *
	 * @param string $file_name
	 *
	 * @return mixed
	 */
	protected function getPdfContents( string $file_name )
	{
		return Storage::disk( $this->disk )->get( $file_name );
	}

	/**
	 * Check if a PDF exists in storage
	 *
	 * @param  PDFFile $PDFFile
	 *
	 * @return bool
	 */
	protected function pdfExists( PDFFile $PDFFile) : bool
	{
		$file_name = $this->getFileName( $PDFFile );
		return Storage::disk( $this->disk )->exists( $file_name );
	}

	/**
	 * Get file path for a PDF
	 *
	 * @param  PDFFile $PDFFile
	 *
	 * @return string
	 */
	protected function getPDFLocation( PDFFile $PDFFile ) : string
	{
		$file_name = $this->getFileName( $PDFFile );
		return $this->getFilePath() . $file_name;
	}

	protected function getFilePath() : string
	{
		return Storage::disk( $this->disk )->getDriver()->getAdapter()->getPathPrefix();
	}

	/**
	 * Get PDFFile model by hash
	 *
	 * @param string $hash
	 *
	 * @return PDFFile|void
	 */
	public function findByHash( string $hash )
	{
		$pdf = PDFFile::where( 'hash', 'LIKE', $hash )->get();
		if( $pdf &&  0 < $pdf->count() ){
			return $pdf[0];
		}
	}

	/**
	 * Get PDFFile model by entry and form IDs
	 *
	 * @param int $entry_id
	 * @param string $form_id
	 *
	 * @return mixed
	 */
	public function findByIDs( int $entry_id, string $form_id )
	{
		$pdf = PDFFile::where( 'entry_id', $entry_id )->where( 'form_id', $form_id )->get();
		if( $pdf &&  0 < $pdf->count() ){
			return $pdf[0];
		}

	}

	/**
	 * @param PDFFile $PDFFile
	 *
	 * @return string
	 */
	protected function getFileName( PDFFile $PDFFile ) : string
	{
		$file_name = 'pdfs/' . $PDFFile->license_id . '/' . $PDFFile->form_id . '/' . $PDFFile->entry_id . '/' . $PDFFile->name;

		return $file_name;
	}


	protected function findLicenseByCode( string  $code ){

		$licenses = License::where( 'code', $code )->get();
		if( 0 < $licenses->count() ){
			$license = $licenses->first();
			return $license;
		}else{
			throw new \Exception( 'License not found' );
		}
	}
}