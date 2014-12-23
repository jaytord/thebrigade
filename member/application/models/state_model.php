<?php

class State_Model extends CI_Model
{
	public function State_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			country_id,
			state_id as id, 
			name
		');

		$this->db->from('states');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>