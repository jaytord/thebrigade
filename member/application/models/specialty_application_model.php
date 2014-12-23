<?php

class Specialty_Application_Model extends CI_Model
{
	public function Specialty_Application_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name,
			specialtyID as specialty_id
		');

		$this->db->from( 'applications' );
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>