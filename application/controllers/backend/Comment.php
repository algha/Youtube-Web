<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("comment") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->load->model("Comment_model","Comment");
		
		$this->data['top_title'] = "Comment";
		
	}
	
	public function index()
	{
		$this->render('user/commentlist');
	}
	
	public function getComments()
	{
		$Comments = $this->Comment->getListBackEnd($_GET);
		echo json_encode($Comments);
	}
	
	public function update()
	{
		$this->render('user/comment');
	}
	
}
