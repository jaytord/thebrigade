<?php

class Industry_Lu_Model extends CI_Model
{
	var $field_types;

	public function Industry_Lu_Model()
	{
		$this->load->database();

		$field_types = array();
		$field_types["industry_id"] 				= "dropdown-menu";
		$field_types["creative_id"] 				= "dropdown-menu";
		$field_types["specialty_id"] 				= "dropdown-menu";
		$field_types["details"] 					= "dropdown-menu";
		$field_types["applications"] 				= "dropdown-menu";
		$field_types["years_experience"] 			= "dropdown-menu";
		$field_types["day_rate"] 					= "dropdown-menu";
		$field_types["hourly_rate"] 				= "dropdown-menu";
	}

	function fieldtypes(){
		return $this->field_types;
	}

	function get( $_userid ){
		$this->db->select('
			industry_id,
			creative_id as creative_field,
			specialty_id as specialty,
			professional_level_id as details,
			applications_id as applications,
			years_id as years_experience,
			day_rates_id as day_rate,
			hour_rates_id as hourly_rate,
			industry.name as industry_name
		');

		$this->db->from('member_specialty');
		$this->db->where('member_id',$_userid);
		$this->db->join('industry','member_specialty.industry_id = industry.id');
		$query = $this->db->get(); 

		return $query->result();
	}

	function add_update($member_id, $list) {
		$query = $this->db->delete('member_specialty', array("member_id"=>$member_id) );

		$data = array();
		foreach ($list as $key => $value) {
			array_push($data, array(
				'member_id'				=>$member_id,
				'industry_id'			=>$value["id"],
				'creative_id'			=>$value["fields"]["creative_field"]["value"],
				'specialty_id'			=>$value["fields"]["specialty"]["value"],
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