<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Register extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MData');
		$this->load->model('MError');
		$this->load->model('MResponse');
		$this->load->library('unit_test');
	}

	function index_get() {
		$apikeytoken = $this->get('email');
		//$cek = ['tokenemail' =>'test@gmail.com'];

		if($apikeytoken == NULL){
			$Data = $this->MData->getAll();
		} else {
			$Data = $this->MData->getAll($apikeytoken);
		}


		if($apikeytoken != NULL){

			if($Data){
				//$apiKeyemail = $this->MKey->verifyApiKeyBy($apiKey);
				$response = $this->MResponse->response_200($Data);
				$this->response($response);
				


			} else {
				//$apiKeyemail = $this->MKey->verifyApiKeyBy($apiKeyemail);
				$apiKeyemailError = $this->MError->errorkey();
				$this->response($apiKeyemailError);

			}

		}else{
			$apiKeyemailError = $this->MError->error_401();
			$this->response($apiKeyemailError);

		}

	}

	function testGetAut(){

		$test = $this->index_get();

		$expected_result = ;

		$test_name = 'TEST';

		$this->unit->run($test, $expected_result, $test_name);
	}


    //Mengirim atau menambah data kontak baru
	function index_post() {
		$data = array(
			'id'         	=> $this->post('id'),
			'email'      	=> $this->post('email'),
			'password'   	=> $this->post('password'),
			'phone'   		=> $this->post('phone'),
			'status'   		=> $this->post('status'),
			'kodetoken'			=> date("Ymd").$this->post('status').$this->post('id')

		);
		$insert = $this->db->insert('regist', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

    //Masukan function selanjutnya disini
}
