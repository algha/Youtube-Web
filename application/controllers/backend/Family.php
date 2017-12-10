<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if( $this->role_manager->checkPermession("family") == 0){
			exit("you dont have permession to visit this page.");
		}
		$this->data['top_title'] = "Family";
		$this->load->model("Family_model","Family");
	}
	
	public function index()
	{
		$family_edit_id = $this->input->get("Family_edit_id");
		$this->data["Family"] = null;
		if (!is_null($family_edit_id)){
			$this->data["Family"] = $this->Family->getone($family_edit_id);
		}
		$this->render('movie/family');
	}

	
	public function getFamilies(){
		$families = $this->Family->getListBackEnd($_GET);
		echo json_encode($families);
	}
	
	public function updateFamily(){
		$message["info"] = "post faild";
		$message["status"] = 0;
		
		$this->Family->Name = $this->input->post("Name");
		$this->Family->Description= $this->input->post("Description");
		$this->Family->ListOrder = $this->input->post("ListOrder");
		
		if ($this->input->post("Family_id")){
			$id = $this->input->post("Family_id");
			$this->Family->update(array("Family_id"=>$id));
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Family/");
			$message["info"] = "Updated succesfully.";
		}else{
			$this->Family->insert();
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Family/");
			$message["info"] = "Inserted succesfully.";
		}
		
		echo json_encode($message);
	}
	
	
	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
		
		$id = $this->input->get("id");
		
		$this->Family->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
		
		echo json_encode($message);
	}
}