<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Poligon extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MData');
	}

	public function index_get(){

		$x = array('3','5','12','9','5','3');
		$y = array('4','11','8','5','6','4');

		$i = 1;
		$j = 0;
		$max = count($x)-1;
		for($i = 1; $i <= $max; $i++){

				$kirimax = $x[$i] * $y[0];
				$kananmax = $y[$i] * $x[0];

				$kiri[$j] = $x[$i] * $y[$j];
				$kanan[$j] = $y[$i] * $x[$j];

			$j++;

		}
		$hasilkiri = array_sum($kiri);

		$hasilkanan = array_sum($kanan);

		$total = abs(($hasilkiri - $hasilkanan))/2;

		$response['Header']= 'Polygon`s area calculated using shoelace formula:' ;
		for($i = 0; $i <= $max; $i++){
			$response['x'][$i]=$x[$i];
			$response['y'][$i]=$y[$i];
			$j++;
		}
		$response['Answer'] = $total;
			// tampilkan response
		$this->response($response);

	}

}
