<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends Public_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("Movie_model","Movie");
		$this->load->model("Category_model","Category");
		
	}
	
	public function all()
	{
		
		$this->data['page_title'] = "All Movies,Musics,Games,Videos,Movies,TV shows,Episodes";
		$this->data["Title"] = "All Movies";
		$where = array();
		$this->data["Movies"] = $this->Movie->getList(array(0,200),array("Created_at","DESK"),$where);
		
		$this->render('movie/movies');
	}
	
	public function category($catname){
		$where = array();
		$like = array('Category_Description' => $catname);
		$this->data["Movies"] = $this->Movie->getList(array(0,20),array("Created_at","DESK"),$where,$like);
		
		$this->data['page_title'] = "Cateogry: ".$catname."";
		
		$this->render('movie/category');
	}
	
	public function movies()
	{
		$this->data['page_title'] = "All Movies";
		$where = array("Family_Description"=>"movie");
		$this->data["Movies"] = $this->Movie->getList(array(0,20),array("Created_at","DESK"),$where);
		
		$this->data["Title"] = "Movies";
		
		$this->render('movie/movies');
	}
	
	public function movie($urlname)
	{
		$where = array("Family_Description"=>"movie");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		
		$this->data['page_title'] = $movie["Name"];
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		$categories = "";
		
		if ($movie["Category_Description"] != ""){
			$whereIn = explode(",", $movie["Category_Description"]);
			$categories = $this->Category->getWhereInByDescription($whereIn);
			
			$list = array();
			foreach ($categories as $category){
				$list[] = anchor("category/".$category["Description"],$category["Name"]);
			}
			$categories = implode("|", $list);
		}
		$this->data["categories"] = $categories;
		
		$this->render('movie/movie');
	}
	
	public function episodes()
	{
		$where = array("Family_Description"=>"episode");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESK"),$where);
		
		$this->data["Title"] = "Episodes";
		$this->data['page_title'] = "Episodes";
		
		$this->render('movie/movies');
	}
	
	public function episode($urlname)
	{
		$where = array("Family_Description"=>"tv");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		$this->data['page_title'] = $movie["Name"];
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		$categories = "";
		
		if ($movie["Category_Description"] != ""){
			$whereIn = explode(",", $movie["Category_Description"]);
			$categories = $this->Category->getWhereInByDescription($whereIn);
			
			$list = array();
			foreach ($categories as $category){
				$list[] = anchor("category/".$category["Description"],$category["Name"]);
			}
			$categories = implode("|", $list);
		}
		$this->data["categories"] = $categories;
		
		$this->render('movie/tv');
	}
	
	public function tvs()
	{
		$where = array("Family_Description"=>"tv");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESK"),$where);
		$this->data["Title"] = "TV";
		
		$this->data['page_title'] = "TV Shows";
		
		$this->render('movie/movies');
	}
	
	public function tv($urlname)
	{
		$where = array("Family_Description"=>"tv");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		$this->data['page_title'] = $movie["Name"];
		
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		$categories = "";
		
		if ($movie["Category_Description"] != ""){
			$whereIn = explode(",", $movie["Category_Description"]);
			$categories = $this->Category->getWhereInByDescription($whereIn);
			
			$list = array();
			foreach ($categories as $category){
				$list[] = anchor("category/".$category["Description"],$category["Name"]);
			}
			$categories = implode("|", $list);
		}
		$this->data["categories"] = $categories;
		
		$this->render('movie/tv');
	}
	
	public function musics()
	{
		$this->data["Title"] = "Musics";
		$where = array("Family_Description"=>"music");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESK"),$where);
		
		$this->data['page_title'] = "All Music";
		
		$this->render('movie/videos');
	}
	
	public function music($urlname)
	{
		
		$where = array("Family_Description"=>"music");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		$this->data['page_title'] = $movie["Name"];
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		$categories = "";
		
		if ($movie["Category_Description"] != ""){
			$whereIn = explode(",", $movie["Category_Description"]);
			$categories = $this->Category->getWhereInByDescription($whereIn);
			
			$list = array();
			foreach ($categories as $category){
				$list[] = anchor("category/".$category["Description"],$category["Name"]);
			}
			$categories = implode("|", $list);
		}
		$this->data["categories"] = $categories;
		$this->render('movie/video');
	}
	
	public function games()
	{
		$this->data["Title"] = "Games";
		
		$where = array("Family_Description"=>"game");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESK"),$where);
		$this->data['page_title'] = "All Games";
		$this->render('movie/videos');
	}
	
	public function game($urlname)
	{
		$where = array("Family_Description"=>"game");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		$this->data['page_title'] = $movie["Name"];
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		
		
		$this->render('movie/video');
	}
	
	public function videos()
	{
		$this->data["Title"] = "Games";
		
		$where = array("Family_Description"=>"video");
		$this->data["Movies"] = $this->Movie->getList(array(0,6),array("Created_at","DESK"),$where);
		$this->data['page_title'] = "All Videos";
		$this->render('movie/videos');
	}
	
	public function video($urlname)
	{
		$where = array("Family_Description"=>"video");
		$this->data["Movies"] = $this->Movie->getList(array(0,10),array("Created_at","DESK"),$where);
		
		$movie = $this->Movie->getoneByName($urlname);
		if ($movie == null){
			exit("null");
		}
		$this->data["Movie"] = $movie;
		$this->data['page_title'] = $movie["Name"];
		
		$this->Movie->Click = $movie["Click"] + 1;
		$this->Movie->update(array("Movie_id"=>$movie["Movie_id"]));
		
		
		
		$this->render('movie/video');
	}
}
