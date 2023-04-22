<?php 
class Home_Model extends CI_Model {
	
	function __construct(){
		$this->load->database();
    }	
	
		 function get_book_categories($cat_id=0){
		$this->db->select("SQL_CALC_FOUND_ROWS b.*",false);
		$this->db->from("bm_book_category b");
		//$this->db->join("arc_categories c","c.web_cat_id=sc.web_cat_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		$this->db->where("b.book_category_status ",1);
		$this->db->where("b.book_privilage_status ",1);
		if($cat_id!=0){
			$this->db->where("b.book_category_id ",$cat_id);
		}
	if((($this->session->userdata('username') && (($this->session->userdata('uRole') == ROLE_REGUSER)) ))){
		$this->db->or_where("b.book_privilage_status ",2);
	}
		$query = $this->db->get();
		return $query->result_array();  
		   
	   }
	   
	   function get_book_details($cat_id=0){
		   $this->db->select("SQL_CALC_FOUND_ROWS b.*",false);
		$this->db->from("bm_book_store b");
		//$this->db->join("arc_categories c","c.web_cat_id=sc.web_cat_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		$this->db->where("b.book_status ",1);
	if($cat_id!=0){
		$this->db->where("b.book_catogory_id ",$cat_id);
	}
		$query = $this->db->get();
		return $query->result_array();  
		   
	   }
	   function get_book_info($book_id=0){
		     $this->db->select("SQL_CALC_FOUND_ROWS b.*,bc.*",false);
		$this->db->from("bm_book_store b");
		$this->db->join("bm_book_category bc","b.book_catogory_id=bc.book_category_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		//$this->db->where("b.book_status ",1);
	if($book_id!=0){
		$this->db->where("b.book_id ",$book_id);
	}
		$query = $this->db->get();
		return $query->result_array();  
	   }
	      function get_book_search_info($book_name=""){
		     $this->db->select("SQL_CALC_FOUND_ROWS b.*,bc.*",false);
		$this->db->from("bm_book_store b");
		$this->db->join("bm_book_category bc","b.book_catogory_id=bc.book_category_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		//$this->db->where("b.book_status ",1);
		$this->db->where("bc.book_privilage_status ",1);
	if((($this->session->userdata('username') && (($this->session->userdata('uRole') == ROLE_REGUSER)) ))){
		$this->db->or_where("bc.book_privilage_status ",2);
	}
	if($book_name!=""){
		$this->db->like("b.book_name ",$book_name);
	}
		$query = $this->db->get();
		return $query->result_array();  
	   }
	function save_user($data){
		   	$dquery=$this->db->get_where('bm_user', $data);
		if($dquery->num_rows()>0){
				return 0;
				}else{
				 $this->db->insert('bm_user', $data); 
				if($this->db->affected_rows() > 0){
                return $this->db->insert_id();
				}else{
				return 0;	
				}
			}
		
	}
	function save_reg_user($data){
		   	$dquery=$this->db->get_where('bm_user_registration', $data);
		if($dquery->num_rows()>0){
				return 0;
				}else{
				 $this->db->insert('bm_user_registration', $data); 
				if($this->db->affected_rows() > 0){
                return $this->db->insert_id();
				}else{
				return 0;	
				}
			}
		
	}
	
		 function get_user_details($user_id=0){
	 if($user_id!=0){
		
				$this->db->select("SQL_CALC_FOUND_ROWS usr.*,reg_usr.*",false);
		$this->db->from("bm_user usr");
		$this->db->join("bm_user_registration reg_usr","reg_usr.user_reg_userid=usr.user_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		$this->db->where("usr.user_active ",1);
		$this->db->where("reg_usr.user_reg_status ",1);
			$this->db->where("usr.user_id ",$user_id);	
			
		$query = $this->db->get();
		return $query->result_array();
	 }else{
		 
		 return 0;
	 }
	 
		   
	   }
	   
	   	function update_user($data,$user_id){
		   	$dquery=$this->db->get_where('bm_user', $data);
		if($dquery->num_rows()>0){
				return 0;
				}else{
				 $this->db->where('user_id', $user_id); 
				 $this->db->update('bm_user', $data); 
				
                return 1;
				
			}
		
	}
	function update_reg_user($data,$user_id){
		   	$dquery=$this->db->get_where('bm_user_registration', $data);
		if($dquery->num_rows()>0){
				return 0;
				}else{
					 $this->db->where('user_reg_userid', $user_id); 
				 $this->db->update('bm_user_registration', $data); 
				return 1;
			}
		
	}
}