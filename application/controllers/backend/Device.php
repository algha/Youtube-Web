<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("device") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->load->model("Device_model","Device");
		
		$this->data['top_title'] = "デバイス";
	}
	
	public function getDevices()
	{
		$Devices = $this->Device->getListBackEnd($_GET);
		echo json_encode($Devices);
	}

	public function index()
	{
		$this->render('user/devicelist');
	}

}