<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends Public_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model("Movie_model","Movie");
		
	}
	
	function getVideo(){
		
		$data["movie"] = array();
		$data["list"] = array();
		
		$id = $this->input->get("videoId");
		$movie = $this->Movie->getone($id);
		if ($movie != null){
			$data["movie"] = $movie;
		}
		
		$this->Movie->Click = $movie["Click"]+1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		
		$list = $this->Movie->getList(array(0,10),array("Created_at","DESC"),array("Family_Description"=>$movie["Family_Description"]));
		$data["list"] = $list;
		echo json_encode($data);
		
	}
	
	function getList(){
		
		$family = $this->input->get("family");
		$page = $this->input->get("page");
		$page = (intval($page) - 1);
		$pageSize = 18;
		if ($page < 0){
			$page = 0;
		}
		$count = $page* $pageSize;
		
		$where = array();
		if ($family != ""){
			$where["Family_Description"] = $family;
		}
		
		$this->Movie->db->select('Movie_id,Name,UrlName,Image,Video_url,Length');
		$this->Movie->db->from('movie');
		$this->Movie->db->where($where);
		$this->Movie->db->order_by("Created_at DESC");
		$this->Movie->db->limit($pageSize,$count);
		
		
		$query = $this->Movie->db->get();
		
		$list = $query->result_array();
		
		$data = array("list"=>$list,"pageSize"=>$pageSize);
		
		echo json_encode($data);
	}
	
	function getTop(){
		
		$this->Movie->db->select('Movie_id,Name,UrlName,Image,Video_url,Length');
		$this->Movie->db->from('movie');
		$this->Movie->db->limit(18,0);
		
		$query = $this->Movie->db->get();
		
		$list = $query->result_array();
		
		$data = array("list"=>$list);
		
		echo json_encode($data);
	}
	
	function getHome(){
		$this->load->model("Family_model","Family");
		
		$Families = $this->Family->getList();
		$lists = array();
		
		foreach ($Families as $Family){
			$where = array("Family_Description"=>$Family["Description"]);
			
			$this->Movie->db->select('Movie_id,Name,UrlName,Image,Family_Description,Video_url,Length');
			$this->db->where($where);
			$this->db->order_by("Created_at","DESC");
			$this->Movie->db->from('movie');
			$this->Movie->db->limit(9,0);
			$query = $this->Movie->db->get();
			$video =  $query->result_array();
			if (count($video) > 0){
				$list["videos"] = $query->result_array();
				$list["family"] = $Family;
				$lists[] = $list;
			}
		}
	
		$data = array("list"=>$lists);
		
		echo json_encode($data);
	}
	
	
	
}