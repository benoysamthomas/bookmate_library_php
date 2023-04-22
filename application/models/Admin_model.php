<?php 
class Admin_Model extends CI_Model {
	
	function __construct(){
		$this->load->database();
    }	
	
		 function get_user_list($user_role_id=0){
	
		if($user_role_id!=0){
				$this->db->select("SQL_CALC_FOUND_ROWS usr.*,reg_usr.*",false);
		$this->db->from("bm_user usr");
		$this->db->join("bm_user_registration reg_usr","reg_usr.user_reg_userid=usr.user_id","left");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		$this->db->where("usr.user_active ",1);
		$this->db->where("reg_usr.user_reg_status ",1);
			$this->db->where("usr.user_role_id ",$user_role_id);	
		} else{
					$this->db->select("SQL_CALC_FOUND_ROWS usr.*",false);
		$this->db->from("bm_user usr");
		//$this->db->where("sc.web_cat_id ",$cat_id);
		$this->db->where("usr.user_active ",1);
			
		}
		$query = $this->db->get();
		return $query->result_array();  
		   
	   }
	   
	   function get_admin_users($user_id=0){
			$this->db->select("SQL_CALC_FOUND_ROWS usr.*",false);
		$this->db->from("bm_user usr");
		$this->db->where("usr.user_active ",1);
		$this->db->where("usr.user_role_id !=",ROLE_REGUSER);
		if($user_id!=0){
		$this->db->where("usr.user_id",$user_id);
		}
		$query = $this->db->get();
		return $query->result_array();   
	   }
	   function get_book_categories($cat_id=0){
		$this->db->select("SQL_CALC_FOUND_ROWS bc.*",false);
		$this->db->from("bm_book_category bc");
		$this->db->where("bc.book_category_status",1);
        if($cat_id!=0){		
		$this->db->where("bc.book_category_id",$cat_id);	
		}		
	    $query = $this->db->get();
		return $query->result_array();  		
	   }
	   function get_book_details($book_id=0){
		 $this->db->select("SQL_CALC_FOUND_ROWS b.*,bc.*",false);
		$this->db->from("bm_book_store b");
		$this->db->join("bm_book_category bc","bc.book_category_id=b.book_catogory_id","left");
		$this->db->where("bc.book_category_status",1);
		$this->db->where("b.book_status",1);
        if($book_id!=0){		
		$this->db->where("b.book_id",$book_id);	
		}		
	    $query = $this->db->get();
		return $query->result_array();    
	   }
	   function save_book_details($data){
		 
			$dquery=$this->db->get_where('bm_book_store',$data);
			if($dquery->num_rows()>0){
				return 2;
			}else{
		   $this->db->insert('bm_book_store', $data);
			return 1;
			}
	   }
	    function update_book_details($data,$book_id){
		   $this->db->where('book_id', $book_id);
		   $this->db->update('bm_book_store', $data);
			return 1;
	   }
	     function delete_book($book_id){
		   $this->db->where('book_id', $book_id);
		   $this->db->update('bm_book_store', array("book_status"=>0));
			return 1;
	   }
	   function save_book_category($data){
		   	$dquery=$this->db->get_where('bm_book_category',$data);
			if($dquery->num_rows()>0){
				return 2;
			}else{
		    $this->db->insert('bm_book_category', $data);
					return 1; 
			}					
	   }
	    function update_book_category($data,$cat_id){
		   $this->db->where('book_category_id', $cat_id);
		   $this->db->update('bm_book_category', $data);
			return 1;
	   }
	       function delete_book_category($cat_id){
			   $dquery=$this->db->where('book_catogory_id',$cat_id);
			   $dquery=$this->db->get('bm_book_store');
			if($dquery->num_rows()>0){
				return 2;
			}else{
		   $this->db->where('book_category_id', $cat_id);
		   $this->db->update('bm_book_category', array("book_category_status"=>0));
			return 1;
			}
	   }
	   
	   function save_admin_user($data){
		      	$dquery=$this->db->get_where('bm_user',$data);
			if($dquery->num_rows()>0){
				return 2;
			}else{
		    $this->db->insert('bm_user', $data);
					return 1; 
			}	
	   }
	   function update_admin_user($data,$user_id){
		   
		   $this->db->where('user_id', $user_id);
		   $this->db->update('bm_user', $data);
			return 1;  
	   }
 function delete_admin_user($user_id){
		
		   $this->db->where('user_id', $user_id);
		   $this->db->update('bm_user', array("user_active"=>0));
			return 1;
			
	   }
}