<?php


namespace App\Http\Controllers\API;
use App\Exceptions\Exception;
use App\License;
use App\PDFFile;
use calderawp\fw\pdf\LicenseSystem;
use calderawp\fw\pdf\make;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PDFCreateController
 *
 * Create PDF via HTTP POST request
 *
 * @package App\Http\Controllers
 */
class PDFCreateController extends PDFController {

	/**
	 * Create PDF
	 *
	 * POST /pdf
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function create(  Request $request ){
		$code =  $request->get( 'code' );
		$html = $request->get( 'html' );
		$name = $request->get( 'name' );
		$entry_id = intval( $request->get( 'entry_id' ) );
		$form_id = $request->get( 'form_id' );

		try{
			$license = $this->findLicenseByCode( $code );
		}catch( \Exception $e ){
			return $e->toResponse();
		}


		$license = new LicenseSystem( $license );
		$license->run();

		if(  $license->isValid() ){
			if( $pdf = $this->findByIDs( $entry_id, $form_id ) ){
				$hash = $pdf->hash;
				$status = 200;
			}else{

				$license->increment();
				$make = new make( $html, $name, [] );

				$make->create( false );
				$file_name = $name . '.pdf';

				$contents = $make->get_pdf();

				$hash = $this->createHash();

				try {
					$pdf = PDFFile::create( [
						'hash'     => $hash,
						'name'     => $file_name,
						'form_id'  => $form_id,
						'entry_id' => $entry_id,
						'license_id' => $license->getID()
					] );
				}catch ( \Exception $e ){
					return new Response( json_encode( [
						'link' => false,
						'error' => 'PDF could not be created. Save fail.',
					]), 500 );
				}

				$created = $this->storePDF( $pdf, $contents );

				if( $created ) {
					$status = 201;
				}else{
					$status = 500;
				}

			}

			if( $pdf ){
				return new Response( json_encode( [
					'link' => url( 'api/pdf/' . $hash ),
				]), $status );
			}else{
				return new Response( json_encode( [
					'link' => false, 'error' => 'PDF could not be created, for some reason.'
				]), 500 );
			}

		}else{
			if( $license->isOverUsed() ){
				return new Response( 'You have exceeded your allowed PDFs per month', 419 );
			}

			return new Response( 'Invalid Auth', 403 );
		}
	}


	/**
	 * Create a file hash for recall
	 *
	 * @return string
	 */
	public function createHash()  :string
	{
		return str_replace( '.', '', uniqid( $this->randomString( 5, 6 ), $this->randomString() ) );

	}

	/**
	 * Create random string for hash uses
	 *
	 * @param int $min
	 * @param int $max
	 *
	 * @return string
	 */
	protected function randomString( int $min = 10, int $max = 12 ) : string
	{
		return bin2hex( random_bytes( rand( $min, $max ) ) );
	}


}

