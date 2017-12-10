<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_Manager{
	private $CI;
	
	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->model('Action_model',"Action");
		$this->CI->load->model('Permession_model',"Permession");
		$this->CI->load->model('RolePermession_model',"RP");
	}
	
	public function checkPermession($permession_name){
		$permession = $this->CI->Permession->getByDescription($permession_name);
		
		$count = $this->CI->RP->getByRolePermessionCount($this->CI->session->role_id,$permession["Permession_id"]);
		
		return $count;
	}
	
	public function checkAction($permession_name,$action_name){
		$permession = $this->CI->Permession->getByDescription($permession_name);
		$action = $this->CI->Action->getByDescription($action_name);
		
		$count = $this->CI->RP->getByRolePermessionActionCount($this->CI->session->role_id,$permession["Permession_id"],$action["Action_id"]);
		
		return $count;
	}
}