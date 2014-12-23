<?php

class Keywords_Lu_Model extends CI_Model
{
	public function Keywords_Lu_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			keyword
		');

		$this->db->from('member_keyword');
		$this->db->where('member_id',$_userid);
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('member_keyword', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'=>$member_id,
				'keyword'=>$value
				)
			);

		}

    	$query = $this->db->insert_batch('member_keyword', $data);

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>