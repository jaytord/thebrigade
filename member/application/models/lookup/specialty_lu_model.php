<?php

class Specialty_Lu_Model extends CI_Model
{
	public function Specialty_Lu_Model()
	{
		$this->load->database();
	}

	function get( $_userid ){
		$this->db->select('
			industry_id,
			creative_id as creative_field,
			specialty_id,
			professional_level_id as details,
			applications_id as applications,
			years_id as years_experience,
			day_rates_id as day_rate,
			hour_rates_id as hourly_rate,
			specialty.name as specialty_name
		');

		$this->db->from('member_specialty');
		$this->db->where('member_id',$_userid);
		$this->db->join('specialty','member_specialty.specialty_id = specialty.id');
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('member_specialty', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'				=>$member_id,
				'specialty_id'			=>$value["id"],
				'professional_level_id'	=>is_array($value["fields"]["details"]["value"]) ? implode(",", $value["fields"]["details"]["value"]) : "",
				'applications_id'		=>is_array($value["fields"]["applications"]["value"]) ? implode(",", $value["fields"]["applications"]["value"]) : "",
				'years_id'				=>$value["fields"]["years_experience"]["value"],
				'day_rates_id'			=>$value["fields"]["day_rate"]["value"],
				'hour_rates_id'			=>$value["fields"]["hourly_rate"]["value"]
				)
			);
		}

    	$query = $this->db->insert_batch('member_specialty', $data);

	    if ($this->db->affected_rows() > 0) {
	      return TRUE;
	    }

	    return FALSE;
	} 
}

?>