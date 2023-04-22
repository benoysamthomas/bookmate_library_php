<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
   function __construct()
	{	
        parent::__construct();	
       // $this->load->model('login_model');
		$this->load->library('session');
		$this->load->helper('cookie');
		 $this->load->model('home_model');
		//$this->load->library('encrypt');
	}

	public function index()
	{
		$data["menu"]=2;
		$data["submenu"]=3;
	
		//$data["technical"] = $this->admin_model->get_course_log_inst_count(ARC_TECH_SCHOOL);
		//$data["media"] = $this->admin_model->get_course_log_inst_count(ARC_MEDIA_SCHOOL);
		//$data["competitive"] = $this->admin_model->get_course_log_inst_count(ARC_COMP_SCHOOL);
		$this->load->view('registration',$data);
	}
	public function save_reg_user(){
		$user_role_id=ROLE_REGUSER;
				$user_data= array(
		"first_name"=>$this->input->post('first_name'),
		"last_name"=>$this->input->post('last_name'),
		"user_email"=>$this->input->post('user_email'),
		"user_name"=>$this->input->post('user_name'),
		"password"=>$this->input->post('password'),
		"user_role_id"=>$user_role_id
		);
		$user_id=$this->home_model->save_user($user_data);
		if($user_id>0){
			$reg_user_data= array(
		"user_contact_number"=>$this->input->post('user_contact'),
		"user_address"=>$this->input->post('user_address'),
		"user_reg_userid"=>$user_id
		);
		$this->home_model->save_reg_user($reg_user_data);
		}
		redirect(site_url('login'));
	}
}



?>