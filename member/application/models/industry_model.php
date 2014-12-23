<?php

class Industry_Model extends CI_Model
{
	public function Industry_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('industry');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>