<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 7/29/16
 * Time: 8:39 PM
 */

namespace calderawp\fw\pdf;


class make {

	protected $html;

	protected $size;

	protected $file_name;

	protected $orientation;

	protected $pdf;

	public function __construct( $html, $file_name, $args  )
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		$config = base_path('vendor/dompdf/dompdf/dompdf_config.inc.php');
		if( file_exists( $config  ) ){
			require_once $config;
		}else{
			var_dump( 'FUCK' );exit;
		}

		$this->html = $html;
		if ( isset( $args[ 'size'] ) ) {
			$this->size = $args[ 'size' ];
		}else{
			$this->size = 'A4';
		}

		if ( isset( $args[ 'orientation'] ) ) {
			$this->orientation = $args[ 'orientation' ];
		}else{
			$this->orientation = 'portrait';
		}

		$this->file_name = $file_name;

	}

	public function get_pdf(){
		return $this->pdf;
	}


	public function create( $stream = true )
	{
		$dompdf = new \DOMPDF();

		$dompdf->load_html( $this->html );

		$dompdf->set_paper( $this->size, $this->orientation );

		$dompdf->render();
		if ( $stream ) {
			$dompdf->stream( $this->file_name );
		}else{
			$this->pdf = $dompdf->output();
		}

	}



}