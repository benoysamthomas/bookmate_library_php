<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data["menu"]=1;
		$data["submenu"]=0;
		$data["book_categories"]=$this->home_model->get_book_categories();
		$this->load->view('home',$data);
	}
	public function book_search()
	{
		$data["menu"]=3;
		$data["submenu"]=1;
		$book_name=$this->input->post("book_name");
		$data["book_search_name"]=$book_name;
		$data["book_search_info"]=$this->home_model->get_book_search_info($book_name);
		$this->load->view('book_search_details',$data);
	}
		public function book_details($cat_id=0)
	{
		$data["menu"]=3;
		$data["submenu"]=1;
		$data["book_categories"]=$this->home_model->get_book_categories($cat_id);
		$data["book_all"]=$this->home_model->get_book_details($cat_id);
		$this->load->view('book_details',$data);
	}
	public function book_detailed_info($book_id=0)
	{
		$data["menu"]=3;
		$data["submenu"]=1;
		//$data["book_name"]=$this->input->post("book_name");
		//$data["book_categories"]=$this->home_model->get_book_categories($book_id);
		$data["book_info"]=$this->home_model->get_book_info($book_id);
		$this->load->view('book_detailed_info',$data);
	}
	public function profile(){
		
		$data["menu"]=2;
		$data["submenu"]=1;
		$user_id=$this->session->userdata('userid');
		$data["user_details"]=$this->home_model->get_user_details($user_id);
		$this->load->view('profile',$data);
	}
		public function update_user(){
		$user_role_id=ROLE_REGUSER;
		$user_id=$this->input->post('user_id');
				$user_data= array(
		"first_name"=>$this->input->post('first_name'),
		"last_name"=>$this->input->post('last_name'),
		"user_email"=>$this->input->post('user_email'),
		"user_name"=>$this->input->post('user_name'),
		"password"=>$this->input->post('password'),
		"user_role_id"=>$user_role_id
		);
		$this->home_model->update_user($user_data,$user_id);
	
			$reg_user_data= array(
		"user_contact_number"=>$this->input->post('user_contact'),
		"user_address"=>$this->input->post('user_address'),
		"user_reg_userid"=>$user_id
		);
		$this->home_model->update_reg_user($reg_user_data,$user_id);
		$this->session->set_userdata('alert_status', 4);
		redirect(site_url('home/profile'));
	}
}
