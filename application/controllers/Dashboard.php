<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$data["menu"]=1;
		$data["submenu"]=0;
		$data["user_list"] = $this->admin_model->get_user_list(ROLE_REGUSER);
		$this->load->view('admin/dashboard',$data);
	}
}



?>