<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

/**
 * Class PDFFileController
 *
 * Downloading PDFs via HTTP GET request
 *
 * @package App\Http\Controllers
 */
class PDFFileController extends PDFController
{

	/**
	 * Download a PDF by hash
	 *
	 * GET /pdf/{hash}
	 *
	 * @param $hash
	 *
	 * @return Response
	 */
	public function show( $hash )
	{
		$pdf = $this->findByHash( $hash );
		if( $this->exists( $pdf ) ) {
			return response()->download(
				$this->getPDFLocation( $pdf),
				$pdf->name,
				$this->pdfHeaders()
			);

		}

		return new Response( 'File not found', 404 );

	}

	/**
	 * Get headers for a PDF response
	 *
	 * @return array
	 */
	protected function pdfHeaders() : array
	{
		return [
			'Content-Type: application/pdf',
		];
	}
}
