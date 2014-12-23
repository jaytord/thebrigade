<?php

class Platform_Model extends CI_Model
{
	public function Platform_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('platform');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>