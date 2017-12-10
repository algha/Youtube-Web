<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		if( $this->role_manager->checkPermession("page") == 0){
			exit("you dont have permession to visit this page.");
		}
		$this->data['top_title'] = lang("page");
		$this->load->model("Page_model","Page");
	}

	public function index()
	{
		array_insert($this->data['top_menu'],anchor("backend/Page/update","追加 <i class=\"fa fa-plus\"></i>"),10);
		$this->render('page/pagelist');
	}
	public function update()
	{
		//work time
		
		$page_edit_id = $this->input->get("Page_edit_id");
		$this->data["Page"] = null;
		if (!is_null($page_edit_id)){
			$this->data["Page"] = $this->Page->getone($page_edit_id);
		}
		$this->render('page/page');
	}
	
	public function getPages(){
		$pages = $this->Page->getListBackEnd($_GET);
		echo json_encode($pages);
	}
	
	public function updatePage(){
		$message["info"] = "post faild";
		$message["status"] = 0;
		
		$this->Page->Title = $this->input->post("Title");
		$this->Page->Content = $this->input->post("Content");
		$this->Page->OS = $this->input->post("OS");
		$this->Page->ListOrder = $this->input->post("ListOrder");
		$this->Page->Created_at = time();
		
		if ($this->input->post("Page_id")){
			$id = $this->input->post("Page_id");
			$this->Page->update(array("Page_id"=>$id));
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Page/");
			$message["info"] = "Updated succesfully.";
		}else{
			$this->Page->insert();
			$message["status"] = 1;
			$message["redirect"] = site_url("/backend/Page/");
			$message["info"] = "Inserted succesfully.";
		}
		
		echo json_encode($message);
	}
	

	public function delete(){
		$message["info"] = "delete faild";
		$message["status"] = 0;
	
		$id = $this->input->get("id");
		
		$this->Page->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}
}