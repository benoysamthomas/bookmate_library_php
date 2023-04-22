<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {

	function __construct(){
		 parent::__construct();	
	}
	
	public function index()
	{

	$this->session->unset_userdata('userid');
		$this->session->unset_userdata('uRole');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		
			redirect(site_url(''), 'refresh');
	
	 
	}
	public function home_logout()
	{

	$this->session->unset_userdata('userid');
		$this->session->unset_userdata('uRole');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		
			redirect(site_url(''), 'refresh');
	
	 
	}
	
	
	}