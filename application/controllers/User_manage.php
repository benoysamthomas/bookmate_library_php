<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {
   function __construct()
	{	
        parent::__construct();	
		$this->load->library('session');
		$this->load->helper('cookie');
	    $this->load->model('admin_model');
		//$this->load->library('encrypt');
	}

	public function index()
	{
		$data["menu"]=3;
		$data["submenu"]=0;
		$data["user_list"] = $this->admin_model->get_admin_users();
		$this->load->view('admin/user_manage',$data);
	}
	public function save_admin_user(){
		
			$data=array(
				'first_name'=>$this->input->post("first_name"),
				'last_name'=>$this->input->post("last_name"),
				'user_name'=>$this->input->post("user_name"),
				'password'=>$this->input->post("password"),
				'user_role_id'=>$this->input->post("user_role_id"),
				'user_email'=>$this->input->post("user_email"),
				);
		$save_status=$this->admin_model->save_admin_user($data);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 1);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 2);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('user_manage'));	
	}
	public function edit_user($user_id=0){
			$data["menu"]=3;
		$data["submenu"]=0;
		$data["user_list"] = $this->admin_model->get_admin_users($user_id);
		$this->load->view('admin/user_manage_edit',$data);
	}
	
	public function update_admin_user(){
			$user_id=$this->input->post("user_id");
			$data=array(
				'first_name'=>$this->input->post("first_name"),
				'last_name'=>$this->input->post("last_name"),
				'user_name'=>$this->input->post("user_name"),
				'password'=>$this->input->post("password"),
				'user_role_id'=>$this->input->post("user_role_id"),
				'user_email'=>$this->input->post("user_email"),
				);
			$save_status=$this->admin_model->update_admin_user($data,$user_id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 4);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 8);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('user_manage'));	
	}
			public function delete_admin_user($id){
			$save_status=$this->admin_model->delete_admin_user($id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 6);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 7);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('user_manage'));
	}
}



?>