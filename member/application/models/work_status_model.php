<?php

class Work_Status_Model extends CI_Model
{
	public function Work_Status_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('employment_status');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>