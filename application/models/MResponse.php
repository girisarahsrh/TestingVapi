<?php

class MResponse extends CI_Model{

	public function response_200($data){
		$response['status']=200;
		$response['error']=false;
		$response['Response']='Response success';
		$response['Key']='Valid';
		$response['data']=$data;
		return $response;
	}

	public function response_notfound(){
		$response['status']=9999;
		$response['error']=true;
		$response['message']='NOT FOUND!';
		return $response;
	}

}
?>
