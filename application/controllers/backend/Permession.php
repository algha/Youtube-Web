<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permession extends Admin_Controller
{


	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("permession") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = lang("permession");
		$this->load->model("Permession_model","Permession");
		$this->load->model("Action_model","Action");
		$this->load->model("ActionPermession_model","APModel");
	}
	
	public function index()
	{
		
		$Permession_edit_id = $this->input->get("Permession_edit_id");
		$this->data["Permession"] = null;
		$this->data["ActionIds"] = null;
		if (!is_null($Permession_edit_id)){
			$this->data["Permession"] = $this->Permession->getone($Permession_edit_id);
			$APList = $this->APModel->getList($Permession_edit_id);
			$ids = array();
			foreach ($APList as $_APList){
				$ids[] = $_APList["Action_id"];
			}
			$this->data["ActionIds"] = implode(",", $ids);
		}
		
		$this->data["Actions"] = $this->Action->getList();
		
		$this->render('manager/Permession');
	}
	
	public function getPermessions()
	{
		$Permessions = $this->Permession->getListBackEnd($_GET);
		echo json_encode($Permessions);
	}
	
	public function updatePermession()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
	
		$this->Permession->Name = $this->input->post("Name");
		$this->Permession->Description = $this->input->post("Description");
		
		
		$permession_id = 0;
		if ($this->input->post("Permession_id")){
			$permession_id = $this->input->post("Permession_id");
			$this->Permession->update(array("Permession_id"=>$permession_id));
			
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
		}else{
			$permession_id = $this->Permession->insert();
			
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
		}
		
		if ($this->input->post("Action_ids")){
			$action_ids = $this->input->post("Action_ids");
			$this->APModel->add($action_ids,$permession_id);
		}
		
		echo json_encode($message);
	}
	
	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
	
		$id = $this->input->get("id");
	
		$this->Permession->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}

}
