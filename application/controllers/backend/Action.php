<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("action") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = lang("action");
		$this->load->model("Action_model","Action");
	}

	public function index()
	{
		$Action_edit_id = $this->input->get("Action_edit_id");
		$this->data["Action"] = null;
		if (!is_null($Action_edit_id)){
			$this->data["Action"] = $this->Action->getone($Action_edit_id);
		}
		$this->render('manager/action');
	}

	public function getActions()
	{
		$Actions = $this->Action->getListBackEnd($_GET);
		echo json_encode($Actions);
	}
	
	public function updateAction()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
	
		$this->Action->Name = $this->input->post("Name");
		$this->Action->Description = $this->input->post("Description");

	
		if ($this->input->post("Action_id")){
			$id = $this->input->post("Action_id");
			$this->Action->update(array("Action_id"=>$id));
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
		}else{
			$this->Action->insert();
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
		}
	
		echo json_encode($message);
	}
	
	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
	
		$id = $this->input->get("id");
	
		$this->Action->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}
}
