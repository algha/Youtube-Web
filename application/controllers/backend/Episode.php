<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Episode extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		
		if( $this->role_manager->checkPermession("episode") == 0){
			exit("you dont have permession to visit this page.");
		}
		
		$this->data['top_title'] = "Episode";
		

		$this->load->model("Episode_model","Episode");
		$this->load->model("Movie_model","Movie");

	}

	public function index()
	{
		array_insert($this->data['top_menu'],anchor("backend/Episode/update","Add <i class=\"fa fa-plus\"></i>"),10);
		$this->render('movie/episodelist');
	}
	
	public function getEpisodes()
	{
		$Episodes = $this->Episode->getListBackEnd($_GET);
		echo json_encode($Episodes);
	}

	public function update()
	{
		$this->data["UrlName"] = NULL;
		$this->data["Name"] = NULL;
		if(isset($_GET["Movie_id"])){
			$this->data["Movie"] = $Movie = $this->Movie->getone($this->input->get("Movie_id"));
			if($Movie = NULL){
				exit("could not get movie...");
			}
			$this->data["UrlName"] = $Movie["UrlName"];
			$this->data["Name"] = $Movie["Name"];
		}
	
		$Episode_edit_id = $this->input->get("Episode_edit_id");
		$this->data["Episode"] = null;
		if (!is_null($Episode_edit_id)){
			$this->data["Episode"] = $Episode = $this->Episode->getone($Episode_edit_id);
			$this->data["UrlName"] = $Episode["UrlName"];
			$this->data["Name"] = $Episode["Name"];
		}
		
		$this->render('movie/episode');
	}
	

	
	public function updateEpisode()
	{
		$message["info"] = "post faild";
		$message["status"] = 0;
	
		$this->Episode->Name = $this->input->post("Name");
		$this->Episode->UrlName = $this->input->post("UrlName");
		$this->Episode->Season = $this->input->post("Season");
		$this->Episode->Part = $this->input->post("Part");
		$this->Episode->Content = $this->input->post("Content");
		$this->Episode->Video_url = $this->input->post("Video_url");
		$this->Episode->Length = $this->input->post("Length");
		$this->Episode->Quality= $this->input->post("Quality");
		$this->Episode->Published_at= $this->input->post("Published_at");
		$this->Episode->Image = $this->input->post("Images");
		$this->Episode->State = $this->input->post("State");
		$this->Episode->Updated_at = time();

		if ($this->input->post("Episode_id")){
			if ($this->role_manager->checkAction("episode","add") == 0){
				$message["info"] = "you dont have delete permession!";
				echo json_encode($message);
				exit();
			}
			
			$id = $this->input->post("Episode_id");
			$this->Episode->update(array("Episode_id"=>$id));
			
			
			$message["status"] = 1;
			$message["info"] = "Updated succesfully.";
			$message["redirect"] = site_url("/backend/Episode/");
		}else{
			if ($this->role_manager->checkAction("episode","edit") == 0){
				$message["info"] = "you dont have delete permession!";
				echo json_encode($message);
				exit();
			}
			
			$this->Episode->Click = 1;
			$this->Episode->admin_id = $this->getAdminInfo("id");
			$this->Episode->Created_at = time();
			$Episode_id = $this->Episode->insert();
			
		
			
			$message["status"] = 1;
			$message["info"] = "Inserted succesfully.";
			$message["redirect"] = site_url("/backend/Episode/");
		}
	
		echo json_encode($message);
	}
	
	public function delete(){
		
		$message["info"] = "delete faild";
		$message["status"] = 0;
		
		if ($this->role_manager->checkAction("Episode","delete") == 0){
			$message["info"] = "you dont have delete permession!";
			echo json_encode($message);
			exit();
		}
		
		$id = $this->input->get("id");
	
		$this->Episode->del($id);
		$message["status"] = 1;
		$message["info"] = "Deleted succesfully.";
	
		echo json_encode($message);
	}
	

}
