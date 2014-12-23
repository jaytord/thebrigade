<?php

class Employers_Lu_Model extends CI_Model
{
	public function Employers_Lu_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			company
		');

		$this->db->from('company_experience');
		$this->db->where('member_id',$_userid);
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('company_experience', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'=>$member_id,
				'company'=>$value
				)
			);
		}

    	$query = $this->db->insert_batch('company_experience', $data);

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>