<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   function __construct()
	{	
        parent::__construct();	
        $this->load->model('login_model');
		$this->load->library('session');
		$this->load->helper('cookie');
		//$this->load->library('encrypt');
	}
	public function index()
	{
		       $data["active_class"]=1;
			   
					$data["msg"]=0;
	$this->form_validation->set_error_delimiters('<div class="u_error">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE)
			{
			
			  
			}
			else
			{		
				$username = $this->input->post('username');
				
				$password = $this->input->post('password');

				/*echo $password;
				echo "<br/>";
				 echo $hashed=$this->hash_password($password); exit;*/
				/*if($this->input->post('remember_me')==TRUE){
					setcookie("username", $this->input->post('username'));
				} 		*/
				
				$getuser = $this->login_model->get_user($username,$password);
				//print_r($getuser); exit;
				if($getuser==true)
				{
					foreach ($getuser as $guser)
					{
						$userid = $guser->user_id  ;		
						$username = $guser->user_name ;
						$uRole	= $guser->user_role_id;
						$active	= $guser->user_active;
						$uf_name = $guser->first_name;
						$ul_name = $guser->last_name;
					}
					if($active==1){
						/*$user_privilege_menus= $this->login_model->get_user_privilege_menus($uRole);
						
						foreach($user_privilege_menus as $up){
							
							$user_privileges=$up->web_user_priveleges;	
						}

$user_privi = explode(',', $user_privileges);*/

					$this->session->set_userdata('userid', $userid);
					$this->session->set_userdata('uRole', $uRole);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('uf_name', $uf_name);
					$this->session->set_userdata('ul_name', $ul_name);
					//$this->session->set_userdata('user_priv', $user_privi);
					redirect(site_url('dashboard'));	
					}
				} else{
					
					$data["msg"]=1;
				}
			}
				$this->load->view('login',$data);
	}
	private function hash_password($password){
   return password_hash($password, PASSWORD_DEFAULT);
}
}
?>