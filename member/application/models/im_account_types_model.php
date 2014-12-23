<?php

class Im_Account_Types_Model extends CI_Model
{
	public function Im_Account_Types_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('im_account_types');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>