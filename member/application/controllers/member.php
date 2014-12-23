<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		session_start();

	  	if( isset($_SESSION["username"]) && isset($_SESSION["userid"]) ){
	    	$_user_id = $_SESSION["userid"];
	  	}else{
			header("Location: ".base_url()."../");
			die();
		}

		$this->loadMemberModels();
		$this->loadMenuModels();

		//member data
		$member_data 					= $this->member_model->get( $_user_id );
		$member_data->keywords 			= $this->keywords_lu_model->get( $_user_id );
		$member_data->companies 		= $this->employers_lu_model->get( $_user_id );
		$member_data->prior_projects 	= $this->prior_projects_lu_model->get( $_user_id );
		$member_data->specialties		= $this->specialty_lu_model->get( $_user_id );
		$member_data->project_links		= $this->project_link_lu_model->get( $_user_id );

		//menus
		$menus 							= (object) 'menus';
		$menus->countries 				= $this->country_model->getAll();
		$menus->states 					= $this->state_model->getAll();
		$menus->team_sizes 				= $this->team_size_model->getAll();
		$menus->work_statuses 			= $this->work_status_model->getAll();
		$menus->work_styles 			= $this->work_style_model->getAll();
		$menus->bandwidths 				= $this->bandwidth_model->getAll();
		$menus->shifts 					= $this->shift_model->getAll();
		$menus->platforms 				= $this->platform_model->getAll();
		$menus->industries 				= $this->industry_model->getAll();
		$menus->creative_fields 		= $this->creative_field_model->getAll();
		$menus->specialties 			= $this->specialty_model->getAll();
		$menus->specialty_details 		= $this->specialty_detail_model->getAll();
		$menus->specialty_applications 	= $this->specialty_application_model->getAll();
		$menus->im_account_types	 	= $this->im_account_types_model->getAll();

		// print_r($member_data);
	
		$this->load->view('member_view', array( 
			"member_data"	=>$member_data, 
			"menus"			=>$menus,
			"user_id"		=>$_user_id
		));
	}

	public function update(){
		session_start();

	  	if( isset($_SESSION["username"]) && isset($_SESSION["userid"]) ){
	    	$_user_id = $_SESSION["userid"];
	  	}else{
			header("Location: ".base_url()."../");
			die();
		}

		$this->loadMemberModels();
		$this->loadMenuModels();

		$post = $this->input->post();

		//update member table
		$member_data = array();

		foreach ($post as $key => $value) {
		 	if( isset($value["type"]) && isset($value["value"]) ){
		 		switch( $value["type"] ){
		 			case "dropdown-menu":
		 			case "textarea" :
		 			case "textinput" :
		 			case "multi-select" :
		 				if($key != "creative_field" && $key != "industry")
		 				$member_data[$key] = is_array( $value["value"] ) ? implode(",", $value["value"]) : $value["value"];
		 				break;
		 			case "tags":
		 				$this->{$key."_lu_model"}->add_update( $_user_id, $value["value"] );
		 				break;
		 			case "specialties":
		 				$this->specialty_lu_model->add_update( $_user_id, $value["value"] );
		 				break;
		 			case "project_links":
		 				$this->project_link_lu_model->add_update( $_user_id, $value["value"] );
		 				break;
		 		}
		 	}
		}

		$this->member_model->add_update( $_user_id, $member_data );

		echo true;
	}

	private function loadMenuModels(){
		//menus
		$this->load->model("country_model");
		$this->load->model("state_model");
		$this->load->model("team_size_model");
		$this->load->model("work_status_model");
		$this->load->model("bandwidth_model");
		$this->load->model("work_style_model");
		$this->load->model("shift_model");
		$this->load->model("platform_model");
		$this->load->model("industry_model");
		$this->load->model("specialty_model");
		$this->load->model("specialty_detail_model");
		$this->load->model("specialty_application_model");
		$this->load->model("creative_field_model");
		$this->load->model("im_account_types_model");
	}
	private function loadMemberModels(){
		//member data
		$this->load->model("member_model");

		$this->load->model("lookup/keywords_lu_model");
		$this->load->model("lookup/employers_lu_model");
		$this->load->model("lookup/prior_projects_lu_model");
		$this->load->model("lookup/specialty_lu_model");
		$this->load->model("lookup/project_link_lu_model");
	}
}