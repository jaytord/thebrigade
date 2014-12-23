<?php

class Bandwidth_Model extends CI_Model
{
	public function Bandwidth_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('bandwidth_access');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>