<?php

class Specialty_Detail_Model extends CI_Model
{
	public function Specialty_Detail_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name,
			specialtyID as specialty_id
		');

		$this->db->from( 'details' );
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>