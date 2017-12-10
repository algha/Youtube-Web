<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if( $this->role_manager->checkPermession("category") == 0){
			exit("you dont have permession to visit this page.");
		}
		$this->data['top_title'] = "Category";
		$this->load->model("Category_model","Category");
	}
	
	public function index()
	{
		
		$category_edit_id = $this->input->get("Category_edit_id");
		$this->data["Category"] = null;
		if (!is_null($category_edit_id)){
			$this->data["Category"] = $this->Category->getone($category_edit_id);
		}
		
		$this->render('movie/category');
	}

	public function getCategories(){
		$categories = $this->Category->getListBackEnd($_GET);
		echo json_encode($categories);
	}
	
	public function updateCategory(){
		$message["info"] = "post faild";
		$message["status"] = 0;
		
		$this->Category->Name = $this->input->post("Name");
		$this->Category->Description= $this->input->post("Description");
		$this->Category->ListOrder = $this->input->post("ListOrder");
		
		if ($this->input->post("Category_id")){
			$id = $this->input->post("Category_id");
			$this->Category->update(array("Category_id"=>$id));
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Category/");
			$message["info"] = "Updated succesfully.";
		}else{
			$this->Category->insert();
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Category/");
			$message["info"] = "Inserted succesfully.";
		}
		
		echo json_encode($message);
	}
	
	
	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
		
		$id = $this->input->get("id");
		
		$this->Category->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
		
		echo json_encode($message);
	}
}