<?php
// extends class Model
class MData extends CI_Model{


	public function getAll($apikeytoken){

		if($apikeytoken == NULL && $status == NULL){
			return $this->db->get('regist')->result_array();
		}else {
			return $this->db->get_where('regist',['email'=> $apikeytoken])->result_array();
		}
	}

	function getkodetoken($apikeytoken)
	{


			return $this->db->get_where('regist',['email'=> $apikeytoken])->result_array();
		
	}


	
}
?>
