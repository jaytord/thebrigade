<?php

class Country_Model extends CI_Model
{
	public function Country_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			country_id as id, 
			name
		');

		$this->db->from('countries');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>