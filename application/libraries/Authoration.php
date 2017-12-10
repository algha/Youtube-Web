<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Authoration{
	
	private $CI;
	
	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	    
	}
	
	public function LogIn($manager){
		
		$newdata = array(
				'id'  => $manager["Manager_id"],
				'name'  => $manager["Name"],
				'role_id'  => $manager["Role_id"],
				'email'     => $manager["Email"],
				'logged_in' => TRUE
		);
		
		$this->CI->session->set_userdata($newdata);
	}
	
	public function getSession($param){
		return $this->CI->session->userdata($param);
	}
	
	public function isLoggedIn(){
		return $this->CI->session->userdata("logged_in");
	}
	
	public function LogOut(){
		$array_items = array('name', 'email','logged_in');
		$this->CI->session->unset_userdata($array_items);
		$this->CI->session->sess_destroy();
		
	}
	
}