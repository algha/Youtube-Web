<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class System extends Public_Controller{
	
	
	function __construct(){
		parent::__construct();
		
		$this->load->model("Page_model","Page");
	}
	
	function PageList($os = "iOS"){
		
		$this->Page->db->select('Page_id,Title');
		$this->Page->db->from('Page');
		$this->Page->db->like('OS',$os);
		$query = $this->Page->db->get();
		
		$list = $query->result_array();
		
		$data = array("list"=>$list,"url"=>site_url("Api/system/pageview"));
		
		echo json_encode($data);
	}
	
	function pageview($id){
		$this->data["Page"] = $this->Page->getone($id);
		$this->view("api/pageview");
	}
	
}