<?php

class Prior_Projects_Lu_Model extends CI_Model
{
	public function Prior_Projects_Lu_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			prior_project
		');

		$this->db->from('member_prior_projects');
		$this->db->where('member_id',$_userid);
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('member_prior_projects', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'=>$member_id,
				'prior_project'=>$value
				)
			);
		}

    	$query = $this->db->insert_batch('member_prior_projects', $data);

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>