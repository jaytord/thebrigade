<?php

class Project_Link_Lu_Model extends CI_Model
{
	public function Project_Link_Lu_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			member_project_links_id,
			project_title,
			project_url
		');

		$this->db->from('member_project_links');
		$this->db->where('member_id',$_userid);
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('member_project_links', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'				=>$member_id,
				'project_title'			=>$value["fields"]["title"]["value"],
				'project_url'			=>$value["fields"]["url"]["value"]
				)
			);
		}

    	$query = $this->db->insert_batch('member_project_links', $data);

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>