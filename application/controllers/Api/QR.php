<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QR extends CI_Controller{
	
	private $data;
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		
		$this->data['page_title'] = 'Best 10 Movies,Movie,Music,Game,TV Shows,Episodes';
		
		$this->data['assets'] = $this->assets =  base_url().'assets/';
		
		$this->data['css'] = array();
		$this->data['css'][] = $this->assets."css/font-awesome.min.css";
		$this->data['css'][] = $this->assets."css/bootstrap.min.css";
		$this->data['css'][] = $this->assets."css/style.css";
		
		$this->data['js'] = array();

	}
	
	function Settings(){
		
		
		$this->load->view("qr/settings",$this->data);
	}

}