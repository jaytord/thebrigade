<?php

class Member_Model extends CI_Model
{
	public function Member_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			FirstName,
			LastName,
			preferred_shift_id,
			city, 	
			state_id,
			country_id,
			bio_desc,
			comments,
			company,
			email, 	
			phone, 	
			team_size_id,
			website,
			work_style_id,
			employment_status_id,
			bandwidth_id,
			platform_id,
			im_username,
			im_account_type_id,
			skype_username
		');

		$this->db->from('members');
		$this->db->where('members.id',$_userid);
		$this->db->order_by('LastName','asc');

		$query = $this->db->get(); 

		return $query->row(0);
	}

	function add_update($member_id, $data) {
		$this->db->select("*");
		$this->db->from('members');
	    $this->db->where('id',$member_id);

	    if ($this->db->count_all_results() == 0) {
	    	$data["id"] = $member_id;
	    	$query = $this->db->insert('members', $data);
	    } else {
	     	$query = $this->db->update('members', $data, array('id'=>$member_id) );
	    }

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>