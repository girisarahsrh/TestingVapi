<?php

class MError extends CI_Model{

	public function error_404(){
		$response['status']=404;
		$response['error']=true;
		$response['message']='Data Not Found / Empty';
		$response['data']=[];
		return $response;
	}

	public function error_401(){
		$response['status']=401;
		$response['error']=false;
		$response['message']='Unauthorized, wrong authentication key';
		return $response;
	}

	public function errorkey(){
		$response['status']=402;
		$response['error']=false;
		$response['API']='Unknown API Key';
		$response['message']='Please check and try again';
		return $response;
	}

}
?>