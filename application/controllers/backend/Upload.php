<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function do_upload($module="common")
	{
		
		$folder = 'uploads/'.$module."/".date("Y")."/".date("m")."/".date("d")."/";
		
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}
		
		$config['upload_path'] = $folder;
		$path= $config['upload_path'];
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1920';
		$config['max_height'] = '1280';
		$config['encrypt_name'] = TRUE;
	
		$this->load->library('upload', $config);
		
		$img = "Image";
		
		if ( ! $this->upload->do_upload($img))
		{
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}
		else
		{
			$address = base_url().$folder.$this->upload->data("file_name");
			$input = $folder.$this->upload->data("file_name");
			
			$data = array('address' => $address,'input'=>$input);
			echo json_encode($data);
		}
	}
	
	
}