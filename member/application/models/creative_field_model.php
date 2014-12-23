<?php

class Creative_Field_Model extends CI_Model
{
	public function Creative_Field_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name,
			industryID as industry_id
		');

		$this->db->from( 'creative' );
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>