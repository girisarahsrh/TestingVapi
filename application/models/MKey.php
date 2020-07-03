<?php
// extends class Model
class MKey extends CI_Model{

	public function verifyApiKeyBy($email){
		$values = false;
		$apikey_decode=decode($email);
		if($apikey_decode==encryption_key())
		{
			$values=true;
		}
		else{
			$values=false;
		}
		return $values;
	}

}
?>