<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("Movie") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = "Movie";
		

		$this->load->model("Movie_model","Movie");
		$this->load->model("Category_model","Category");
		$this->load->model("Family_model","Family");
		$this->load->model("Company_model","Company");
	}

	public function index()
	{
		array_insert($this->data['top_menu'],anchor("backend/Movie/update","Add <i class=\"fa fa-plus\"></i>"),10);
		$this->render('movie/movielist');
	}
	
	public function getMovies()
	{
		$Movies = $this->Movie->getListBackEnd($_GET);
		echo json_encode($Movies);
	}

	public function update()
	{
		$this->data['js'][] = $this->assets."js/jquery.bootcomplete.js";
	
		$this->data["Categories"] = $this->Category->getList();
		$this->data["Families"] = $this->Family->getList();
		
		$Movie_edit_id = $this->input->get("Movie_edit_id");
		$this->data["Movie"] = null;
		if (!is_null($Movie_edit_id)){
			$this->data["Movie"] = $Movie = $this->Movie->getone($Movie_edit_id);
		}
		
		$this->render('movie/movie');
	}
	

	
	public function updateMovie()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
	
		$this->Movie->Name = $this->input->post("Name");
		
		if (isset($_POST["Category_Description"])){
			$Category = $this->input->post("Category_Description");
			if (count($Category) > 1){
				$this->Movie->Category_Description = implode(",", $Category);
			}else if(count($Category) == 1){
				$this->Movie->Category_Description = $Category[0];
			}
		}
		
		$this->Movie->UrlName= $this->input->post("UrlName");
		$this->Movie->Video_url = $this->input->post("Video_url");
		$this->Movie->Length = $this->input->post("Length");
		$this->Movie->Region = $this->input->post("Region");
		$this->Movie->Imdb = $this->input->post("Imdb");
		$this->Movie->Year = $this->input->post("Year");
		$this->Movie->Language = $this->input->post("Language");
		$this->Movie->Episode = $this->input->post("Episode");
		$this->Movie->Quality = $this->input->post("Quality");
		$this->Movie->Family_Description = $this->input->post("Family_Description");
		$this->Movie->Published_at = $this->input->post("Published_at");
		$this->Movie->Type= $this->input->post("Type");
		
		
		$this->Movie->Company_id = $this->input->post("Company_id");
		$this->Movie->CompanyName = $this->input->post("CompanyName");
		
	
		$this->Movie->State = $this->input->post("State");
		$this->Movie->Content = $this->input->post("Content");
		$this->Movie->Updated_at = time();

		
		$images = $this->input->post("Images");
		if (count($images) < 1){
			$message["info"] = "opload at least 1 images";
			echo json_encode($message);
			exit();
		}
		
		$this->Movie->Image = $images[0];
		unset($images[0]);
		
		if (count($images) > 1){
			$images = implode(",", $images);
			$this->Movie->Images = $images;
		}
	
		if ($this->input->post("Movie_id")){
			if ($this->role_manager->checkAction("Movie","add") == 0){
				$message["info"] = "you dont have delete permession!";
				echo json_encode($message);
				exit();
			}
			
			$id = $this->input->post("Movie_id");
			$this->Movie->update(array("Movie_id"=>$id));
			
			
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
			$message["redirect"] = site_url("/backend/Movie/");
		}else{
			if ($this->role_manager->checkAction("Movie","edit") == 0){
				$message["info"] = "you dont have delete permession!";
				echo json_encode($message);
				exit();
			}
			
			$this->Movie->Click = 1;
			$this->Movie->admin_id = $this->getAdminInfo("id");
			$this->Movie->Created_at = time();
			$Movie_id = $this->Movie->insert();
			
		
			
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
			$message["redirect"] = site_url("/backend/Movie/");
		}
	
		echo json_encode($message);
	}
	
	public function delete(){
		
		$message["info"] = "delete faild";
		$message["status"] = 0;
		
		if ($this->role_manager->checkAction("Movie","delete") == 0){
			$message["info"] = "you dont have delete permession!";
			echo json_encode($message);
			exit();
		}
		
		$id = $this->input->get("id");
	
		$this->Movie->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}
	

}
