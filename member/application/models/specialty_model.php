<?php

class Specialty_Model extends CI_Model
{
	public function Specialty_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			specialty.id as id, 
			specialty.name as name,
			creativeID as creative_field_id,
			creative.industryID as industry_id
		');

		$this->db->from( 'specialty' );
		$this->db->join('creative','specialty.creativeID = creative.id');
		$this->db->order_by('name','asc');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>