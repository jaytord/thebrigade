<?php

class Team_Size_Model extends CI_Model
{
	public function Team_Size_Model()
	{
		$this->load->database();
	}

	function getAll(){
		$this->db->select('
			id, 
			name
		');

		$this->db->from('team_sizes');
		$query = $this->db->get(); 

		return $query->result();
	}
}

?>