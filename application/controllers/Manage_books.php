<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_books extends CI_Controller {
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
		$data["menu"]=2;
		$data["submenu"]=21;
		$data["book_store"] = $this->admin_model->get_book_details();
		$data["book_categories"] = $this->admin_model->get_book_categories();
		$this->load->view('admin/manage_book_store',$data);
	}
		public function book_store_edit($book_id)
	{
		$data["menu"]=2;
		$data["submenu"]=21;
		$data["book_store"] = $this->admin_model->get_book_details($book_id);
		$data["book_categories"] = $this->admin_model->get_book_categories();
		$this->load->view('admin/manage_book_store_edit',$data);
	}
		public function book_categories()
	{
		$data["menu"]=2;
		$data["submenu"]=22;
	$data["book_categories"] = $this->admin_model->get_book_categories();
		$this->load->view('admin/book_category',$data);
	}
		public function book_categories_edit($cat_id)
	{
		$data["menu"]=2;
		$data["submenu"]=22;
			$data["book_categories"] = $this->admin_model->get_book_categories($cat_id);
		$this->load->view('admin/book_category_edit',$data);
	}
	  public function save_book_details(){
			$file_name="";
       // $image_name_thumb="";
		$image_width=720;
		$image_height=480;
		$image_folder='images';
		//$image_thumb_width=150;
		//$image_thumb_height=150;
		$config['upload_path']   = './images/'; 
     $config['allowed_types'] = 'gif|GIF|JPG|jpg|jpeg|JPEG|PNG|png'; 
      $config['max_size']      = 1024;
	  //$config['overwrite'] = TRUE;
      $this->load->library('upload', $config);
	 // $this->upload->initialize($config);
	 if ($this->upload->do_upload('book_store_image'))

			{
				$upload_data = $this->upload->data();  
				$file_name =   $upload_data['file_name'];
				$uploadedImage = $this->upload->data();
                $this->resizeImageWithoutThumb($uploadedImage['file_name'],$image_width,$image_height,$image_folder);
			}
			
		$data=array(
				"book_name"=>$this->input->post("book_name"),
				"book_author"=>$this->input->post("book_author"),
				'book_catogory_id'=>$this->input->post("book_category"),
				'book_description'=>$this->input->post("book_description"),
				'book_publish_date'=>date("Y-m-d",strtotime($this->input->post("book_publish_date"))),
				'book_store_image'=>$file_name
				);
		$save_status=$this->admin_model->save_book_details($data);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 1);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 2);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books'));	
		
	}
	public function update_book_details(){
		$book_id=$this->input->post("book_id");
		$file_name="";
       // $image_name_thumb="";
		$image_width=720;
		$image_height=480;
		$image_folder='images';
		//$image_thumb_width=150;
		//$image_thumb_height=150;
		$config['upload_path']   = './images/'; 
     $config['allowed_types'] = 'gif|GIF|JPG|jpg|jpeg|JPEG|PNG|png'; 
      $config['max_size']      = 1024;
	  //$config['overwrite'] = TRUE;
      $this->load->library('upload', $config);
	 // $this->upload->initialize($config);
	 if ($this->upload->do_upload('book_store_image'))

			{
				$upload_data = $this->upload->data();  
				$file_name =   $upload_data['file_name'];
				$uploadedImage = $this->upload->data();
                $this->resizeImageWithoutThumb($uploadedImage['file_name'],$image_width,$image_height,$image_folder);
			}
			if($file_name!=""){
		$data=array(
				"book_name"=>$this->input->post("book_name"),
				"book_author"=>$this->input->post("book_author"),
				'book_catogory_id'=>$this->input->post("book_category"),
				'book_description'=>$this->input->post("book_description"),
				'book_publish_date'=>date("Y-m-d",strtotime($this->input->post("book_publish_date"))),
				'book_store_image'=>$file_name
				);
			}else{
			$data=array(
				"book_name"=>$this->input->post("book_name"),
				"book_author"=>$this->input->post("book_author"),
				'book_catogory_id'=>$this->input->post("book_category"),
				'book_description'=>$this->input->post("book_description"),
				'book_publish_date'=>date("Y-m-d",strtotime($this->input->post("book_publish_date")))
				);	
			}
		$save_status=$this->admin_model->update_book_details($data,$book_id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 4);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 8);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books'));	
		
	}
	public function delete_book($id){
			$save_status=$this->admin_model->delete_book($id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 6);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 7);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books'));
	}
	public function save_book_category(){
		$data=array(
				'book_category_name'=>$this->input->post("book_cat_name"),
				'book_privilage_status'=>$this->input->post("book_privilage_status"),
				);
		$save_status=$this->admin_model->save_book_category($data);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 1);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 2);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books/book_categories'));	
		
	}
	public function update_book_category(){
		$book_cat_id=$this->input->post("book_cat_id");
		$data=array(
				'book_category_name'=>$this->input->post("book_cat_name"),
				'book_privilage_status'=>$this->input->post("book_privilage_status"),
				);
			$save_status=$this->admin_model->update_book_category($data,$book_cat_id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 4);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 8);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books/book_categories'));	
	}
		public function delete_book_category($id){
			$save_status=$this->admin_model->delete_book_category($id);
			if($save_status==1){
				$this->session->set_userdata('alert_status', 6);
			} else if($save_status==2){
				$this->session->set_userdata('alert_status', 7);
			}else{
				$this->session->set_userdata('alert_status', 3);
				
			}
				redirect(site_url('manage_books/book_categories'));
	}
	
	 	   public function resizeImageWithoutThumb($filename,$width,$height,$image_folder){
	    $source_path =  './'.$image_folder.'/' . $filename;
      $target_path =  './'.$image_folder.'/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => FALSE,
          'width' => $width,
          'height' => $height
      );
      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      } 
      $this->image_lib->clear();
   }
}



?>