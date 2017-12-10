<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->model("Movie_model","Movie");
		$this->load->model("User_model","User");
		
		$time = strtotime(date("Ymd"));
		
		$this->data["AllMovies"] = $this->Movie->getCount();
		$this->data["NewUsers"] = $this->User->getCount(array("Created_at >=$time"));
		$this->data["AllUsers"] = $this->User->getCount();
		

		
		$this->render('dashboard');
			
	}
	
	public function view()
	{
		
		$this->load->model("Manager_model","Manager");
		$this->load->model("Role_model","Role");
		
		
		$this->data["Manager"] = $Manager = $this->Manager->getone($this->session->userdata("id"));
		$this->data["Role"] = $this->Role->getone($Manager["Role_id"]);
		
		
		
		$this->render('manager/view');
	}
}