<?php

namespace App\Http\Controllers;

use ConsoleTVs\Charts\Charts;
use Illuminate\Support\Facades\Input;
use MathPHP\Statistics\Average;

class Plugin extends Controller
{

	protected $root = 'https://api.wordpress.org/stats/plugin/1.0/downloads.php';

	public function downloads( $slug )
	{
		if( 'shawn' != Input::get( 'hi-roy' ) ){
			return redirect( '/' );
		}

		$r = file_get_contents( $this->downloads_url( $slug ) );


		$stats = json_decode( $r );

		$sorted = $this->sort( $stats );
		$labels = [
			'week',
			'month'
		];
		$chart_data = [
			'week',
			'month',
			'week_avg' => [
				'mean' =>[],
				'iqm' => []
			]
		];
		foreach ( $sorted as $year => $data ) {
			foreach ( $data[ 'weeks'] as $week => $downloads ){
				$labels[ 'week' ][] = $year . '-' . $week;
				$chart_data[ 'week' ][] = $downloads[ 'total'];
			}
			foreach ( $data[ 'months' ] as $month => $downloads ){
				$labels[ 'month' ][] = $year . '-' . $month;
				$chart_data[ 'month' ][] = $downloads;
			}
			foreach( $data[ 'averages' ][ 'weekly' ] as $week => $averages ){
				$chart_data[ 'week_avg' ][ 'mean' ][] = $averages[ 'mean' ];
				$chart_data[ 'week_avg' ][ 'iqm' ][] = $averages[ 'iqm' ];
			}
		}




		$weekly = Charts::multi('line', 'highcharts')
		               ->setTitle('Downloads Per Week')
		               ->setLabels( $labels[ 'week' ] )
		               ->setDataset( 'Downloads', $chart_data[ 'week' ] )
		               ->setDimensions(1000,500)
		               ->setResponsive(true);
		$weekly_avg = Charts::multi('line', 'highcharts')
		                ->setTitle('Average Daily Downloads Per Week')
		                ->setLabels( $labels[ 'week' ] )
		                ->setDataset( 'Mean', $chart_data[ 'week_avg' ][ 'mean' ] )
		                ->setDataset( 'Interquartile Mean( IQM )', $chart_data[ 'week_avg' ][ 'iqm' ] )
		                ->setDimensions(1000,500)
		                ->setResponsive(true);
		$montly = Charts::multi('line', 'highcharts')
		                ->setTitle('Downloads Per Month')
		                ->setLabels( $labels[ 'month' ] )
		                ->setDataset( 'Monthly Total', $chart_data[ 'month'] )
		                ->setDimensions(1000,500)
		                ->setResponsive(true);

		return view('plugin.downloads', ['charts' => [ $weekly, $weekly_avg, $montly ]]);

	}


	protected function downloads_url( $slug, $limit = 730 ) : string
	{
		return $this->root . '?' . http_build_query( [
			'slug' => $slug,
			'limit' => $limit
		]);
	}

	/**
	 * @param $stats
	 *
	 * @return array
	 */
	protected function sort( $stats ) : array
	{
		$sorted = [ ];
		foreach ( $stats as $day => $downloads ) {
			$time = strtotime( $day );
			$week = date( 'W', $time );
			$year = date( 'Y', $time );
			$month = date( 'M', $time );
			if ( ! isset( $sorted[ $year ] ) ) {
				$sorted[ $year ] = [ ];
			}

			if( ! isset( $sorted[ $year ][ 'months' ])){
				$sorted[ $year ][ 'months' ] = [];
			}

			if( ! isset( $sorted[ $year ][ 'weeks' ])){
				$sorted[ $year ][ 'weeks' ] = [];
			}

			if( ! isset( $sorted[ $year ][ 'months' ][ $month ] ) ){
				$sorted[ $year ][ 'months' ][ $month ] = 0;
			}



			if ( ! isset( $sorted[ $year ][ 'weeks' ][ $week ] ) ) {
				$sorted[ $year ][ 'weeks' ][ $week ][ 'total' ] = 0;
				$sorted[ $year ][ 'weeks' ][ $week ][ 'daily' ] = [];
			}

			$sorted[ $year ][ 'weeks' ][ $week ][ 'total' ] += $downloads;
			$sorted[ $year ][ 'weeks' ][ $week ][ 'daily' ][] = $downloads;
			$sorted[ $year ][ 'months' ][ $month ] +=  $downloads;

		}

		foreach ( $sorted as $year => $d ) {
			ksort( $d[ 'weeks'] );
			$sorted[ $year ][ 'weeks' ] = $d[ 'weeks'];
		}

		foreach ( $sorted as $year => $d ) {
			$sorted[ $year ][ 'averages' ] = [ 'weekly' => [] ];
			foreach ( $d[ 'weeks' ] as $week => $wd ){
				$sorted[ $year ][ 'averages' ][ 'weekly' ][ $week ] =  Average::describe( $wd[ 'daily' ] );
			}

		}

		return $sorted;
	}


}
