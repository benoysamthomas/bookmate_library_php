<?php 
class Login_Model extends CI_Model {
	
	function __construct(){
		$this->load->database();
    }	
	
			function get_user($uname,$pwd){
			//$hashpass=$this->pass_hash($pwd);
		//echo $hashpass; exit;
			$this->db->where('user_name', $uname);
			$this->db->where('password', $pwd);
			$this->db->where('user_active', 1);
			$dquery=$this->db->get('bm_user');
		  $user = $dquery->result();
return $user;
				
			}
		/*
		public function get_user_privilege_menus($role){
			 $dquery=$this->db->get_where('arc_web_user_privilelge', array("web_user_role_ref_id"=>$role));
		  $priv = $dquery->result();
			return $priv;
		}
		*/
	 /*public function pass_hash($password)
  {
      $hash = password_hash($password,PASSWORD_DEFAULT);
      return $hash;
  }	
  function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }*/

}