<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller{

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		
		$this->load->model("Movie_model","Movie");
		
		$this->data["Latest"] = $this->Movie->getList(array(0,6));
		
		$where = array("Family_Description"=>"movie");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$where = array("Family_Description"=>"episode");
		$this->data["Episodes"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$where = array("Family_Description"=>"tv");
		$this->data["TVs"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$where = array("Family_Description"=>"music");
		$this->data["Musics"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$where = array("Family_Description"=>"game");
		$this->data["Games"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$where = array("Family_Description"=>"video");
		$this->data["Videos"] = $this->Movie->getList(array(0,6),array("Created_at","DESC"),$where);
		
		$this->render('home');
	}
}
