<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('language');
		
		$this->lang->load("admin","japanese");
		
		$this->load->library('Authoration');
		
		$this->load->model("Manager_model","Manager");
	}

	public function index(){
		$this->load->library('session');
		$data["assets"] = base_url()."assets/backend/";
	
		$this->load->view('backend/login',$data);
	}
	
	public function logout(){
		$this->authoration->LogOut();
		redirect(site_url("/backend/login"));
	}
	
	public function postLogin(){
		$message["info"] = "イメールかパスワードが違っています。";
		$message["status"] = 0;
		$message["showMessage"] = true;
		
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		
		$pass = sha1($pass."The510510");
		
		//query the database
		$result = $this->Manager->validate($email, $pass);
		if($result){
			
			if ($result["canLogin"] == 0){
				$message["info"] = "このユーザーログインできないです。";
				echo json_encode($message);
				exit();
			}
			
			$this->Manager->LoginCount = $result["LoginCount"] + 1;
			$this->Manager->LastLogin_IP = $this->input->ip_address();
			$this->Manager->Lastlogin_at = time();
			$this->Manager->update(array("Manager_id"=>$result["Manager_id"]));
			
			$this->authoration->LogIn($result);
			
			$message["redirect"] = site_url("/backend/dashboard/");
			$message["status"] = 1;
			$message["showMessage"] = false;
		}
		
		echo json_encode($message);
	}
	
	
}