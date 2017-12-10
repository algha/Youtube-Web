<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("user") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->load->model("User_model","User");
		$this->data['top_title'] = lang("user");
		
	}

	public function index()
	{
		$this->render('user/userlist');
	}
	
	public function getUsers()
	{
		$users = $this->User->getListBackEnd($_GET);
		echo json_encode($users);
	}
	
	public function update()
	{
		$this->render('user/user');
	}

}
