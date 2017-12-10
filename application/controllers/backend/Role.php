<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends Admin_Controller
{


	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("role") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = "Role";
		$this->load->model("Role_model","Role");
		$this->load->model("Permession_model","Permession");
		$this->load->model("Action_model","Action");
		$this->load->model("RolePermession_model","RolePermession");
	}

	public function index()
	{
		
		$this->data["Permessions"] = $this->Permession->getList();
		$this->data["Action"] = $this->Action;
		
		$Role_edit_id = $this->input->get("Role_edit_id");
		$this->data["Role"] = null;
		$this->data["RolePermession"] = null;
		if (!is_null($Role_edit_id)){
			$this->data["Role"] = $this->Role->getone($Role_edit_id);
			$this->data["RolePermession"] = $this->RolePermession;
		}
		$this->render('manager/role');
	}

	public function getRoles()
	{
		$Roles = $this->Role->getListBackEnd($_GET);
		echo json_encode($Roles);
	}

	public function updateRole()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
	
		$this->Role->Name = $this->input->post("Name");
		$this->Role->Description = $this->input->post("Description");
		
		$Role_id = 0;

		if ($this->input->post("Role_id")){
			$Role_id = $this->input->post("Role_id");
			$this->Role->update(array("Role_id"=>$Role_id));
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
		}else{
			$Role_id = $this->Role->insert();
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
		}
		
		if (isset($_POST["Permessions"])){
			$permessions = $_POST["Permessions"];
			$this->RolePermession->add($permessions,$Role_id);
		}

		echo json_encode($message);
	}
	


	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;

		$id = $this->input->get("id");

		$this->Role->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";

		echo json_encode($message);
	}

}
