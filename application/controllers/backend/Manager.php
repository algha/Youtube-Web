<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("manager") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = "管理者";
		$this->load->model("Role_model","Role");
		$this->load->model("Manager_model","Manager");
		
		$this->load->library("session");
	}

	public function index()
	{
		array_insert($this->data['top_menu'],anchor("backend/Manager/update","追加 <i class=\"fa fa-plus\"></i>"),10);
		$this->render('manager/managerlist');
	}
	
	public function update()
	{
		$this->data["roles"] = $this->Role->getList();
		$Manager_edit_id = $this->input->get("Manager_edit_id");
		$this->data["Manager"] = null;
		if (!is_null($Manager_edit_id)){
			$this->data["Manager"] = $this->Manager->getone($Manager_edit_id);
		}
		$this->render('manager/manager');
	}

	
	public function getManagers(){
		$Managers = $this->Manager->getListBackEnd($_GET);
		echo json_encode($Managers);
	}
	
	public function updateManager(){
		
		$message["info"] = "post faild";
		$message["status"] = 0;
		
		$this->Manager->Role_id = $this->input->post("Role_id");
		$this->Manager->Name = $this->input->post("Name");
		$this->Manager->Email = $this->input->post("Email");
		$this->Manager->canLogin = $this->input->post("canLogin");
		
		if ($this->input->post("Password") != ""){
			if (strlen($this->input->post("Password")) < 6){
				$message["info"] = "Character length should be max on 6.";
				echo json_encode($message);
				exit();
			}
			if ($this->input->post("Password") != $this->input->post("RePassword")){
				$message["info"] = "Confirm password not mutched!";
				echo json_encode($message);
				exit();
			}
			$this->Manager->Password = sha1($this->input->post("Password")."The510510");
		}
		
		
		if ($this->input->post("Manager_id")){
			$id = $this->input->post("Manager_id");
			$this->Manager->update(array("Manager_id"=>$id));
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
			$message["redirect"] = site_url("/backend/Manager/");
		}else{
			
			if ($this->input->post("Password") == ""){
				$message["info"] = "Enter new password!";
				echo json_encode($message);
				exit();
			}
			$this->Manager->Created_at = time();
			$this->Manager->insert();
			$message["redirect"] = site_url("/backend/Manager/");
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
		}
		
		echo json_encode($message);
	}

	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
	
		$id = $this->input->get("id");
	
		$this->Manager->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}
}
