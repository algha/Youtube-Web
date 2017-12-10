<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("company") == 0){
			exit("you dont have permession to visit this page.");
		}

		$this->data['top_title'] = "Company";
		$this->load->model("Company_model","Company");
	}

	public function index()
	{
		
		$company_edit_id = $this->input->get("edit_id");
		$this->data["Company"] = null;
		if (!is_null($company_edit_id)){
			$this->data["Company"] = $this->Company->getone($company_edit_id);
		}
		
		$this->render('movie/company');
	}
	
	public function search()
	{
		$key = $this->input->get("keyName");
		$data = $this->Company->search($key);
		$label = array();
		foreach ($data as $_data){
			$content["label"] = $_data["Name"];
			$content["id"] = $_data["Company_id"];
			$label[] = $content;
		}
		echo json_encode($label);
	}

	public function getCompanies()
	{
		$companies = $this->Company->getListBackEnd($_GET);
		echo json_encode($companies);
	}
	
	function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
		
		$id = $this->input->get("id");
		
		$this->Company->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
		
		echo json_encode($message);
	}
	
	public function updateCompany()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
		
		$this->Company->Name = $this->input->post("Name");
		$this->Company->Business = $this->input->post("Business");
		$this->Company->Address = $this->input->post("Address");
		$this->Company->Link= $this->input->post("Link");
		
		if ($this->input->post("Company_id")){
			$id = $this->input->post("Company_id");
			$this->Company->update(array("Company_id"=>$id));
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
		}else{
			$this->Company->Created_at =time();
			$this->Company->insert();
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
		}
		
		echo json_encode($message);
	}
}