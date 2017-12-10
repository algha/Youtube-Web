<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_Controller extends CI_Controller
{
	
	protected $data = array();
	
	protected $admin_folder = "backend/";
	
	protected $assets;

	function __construct()
	{
		
		parent::__construct();
		
		$this->load->library('Authoration');
		$this->load->helper('url');
		
		
		if ($this->authoration->isLoggedIn() == false){
			redirect('/backend/login', 'refresh');
			exit();
		}
		
		$this->data["ManagerName"] = $this->authoration->getSession("name");
		
		
		$this->load->helper('language');
		$this->lang->load("admin","japanese");
		
		$this->data['page_title'] = 'CI App';
		$this->data['before_head'] = '';
		$this->data['before_body'] ='';
		
		$this->data['top_title'] = lang("main");
		$this->data['top_menu'] = array();
		
		
		$this->data['page_title'] = 'CI App - Dashboard';
		$this->data['assets'] = $this->assets =  base_url().'assets/backend/';
		
		$this->data['css'] = array();
		$this->data['css'][] = $this->assets."css/font-awesome.min.css";
		$this->data['css'][] = $this->assets."css/bootstrap.min.css";
		$this->data['css'][] = $this->assets."css/dataTables.bootstrap.min.css";
		$this->data['css'][] = $this->assets."css/bootstrap-social.css";
		$this->data['css'][] = $this->assets."css/bootstrap-select.css";
		$this->data['css'][] = $this->assets."css/fileinput.min.css";
		$this->data['css'][] = $this->assets."css/awesome-bootstrap-checkbox.css";
		$this->data['css'][] = $this->assets."css/toastr.min.css";
		$this->data['css'][] = $this->assets."css/style.css";
		
		
		$this->data['js'] = array();
		$this->data['js'][] = $this->assets."js/jquery.min.js";
		$this->data['js'][] = $this->assets."js/bootstrap-select.min.js";
		$this->data['js'][] = $this->assets."js/bootstrap.min.js";
		$this->data['js'][] = $this->assets."js/jquery.dataTables.min.js";
		$this->data['js'][] = $this->assets."js/dataTables.bootstrap.min.js";
		$this->data['js'][] = $this->assets."js/Chart.min.js";
		$this->data['js'][] = $this->assets."js/fileinput.js";
		$this->data['js'][] = $this->assets."js/chartData.js";
		$this->data['js'][] = $this->assets."js/toastr.min.js";
		$this->data['js'][] = $this->assets."js/main.js";
		
		
		$this->data['admin_url'] = site_url().'/backend/';
		
		$this->setupMenu();
		
	}
	
	private function setupMenu(){
		
		$this->load->library("role_manager");
		
		$menu = array();
		
		// dashboard
		$menus[] = array("url"=>"backend/dashboard","menutitle"=>"Main","icon"=>"fa fa-dashboard");
		
		//求人サービス
		$content  = array();
		$movie = array("url"=>"backend/Movie","title"=>"Movie");
		if( $this->role_manager->checkPermession("movie") > 0){
			$content[] = $movie;
		}
		
		$episode = array("url"=>"backend/Episode","title"=>"Episode");
		if( $this->role_manager->checkPermession("episode") > 0){
			$content[] = $episode;
		}
		
		$family = array("url"=>"backend/Family","title"=>"Family");
		if( $this->role_manager->checkPermession("family") > 0){
			$content[] = $family;
		}
		
		$category = array("url"=>"backend/Category","title"=>"Category");
		if( $this->role_manager->checkPermession("category") > 0){
			$content[] = $category;
		}
	
		
		
		$company = array("url"=>"backend/Company","title"=>"Company");
		if( $this->role_manager->checkPermession("company") > 0){
			$content[] = $company;
		}
		
		if (count($content) > 0){
			$menus[] = array("url"=>"backend/Movie","menutitle"=>"Movie","icon"=>"fa fa-user","submenu"=>$content);
		}
		
		
		//content
		$content  = array();
		$user = array("url"=>"backend/User","title"=>"User");
		if( $this->role_manager->checkPermession("user") > 0){
			$content[] = $user;
		}
		
		$comment = array("url"=>"backend/Comment","title"=>"Comment");
		if( $this->role_manager->checkPermession("comment") > 0){
			$content[] = $comment;
		}
		
		$device = array("url"=>"backend/Device","title"=>"Device");
		if( $this->role_manager->checkPermession("device") > 0){
			$content[] = $device;
		}
		
		$feedback = array("url"=>"backend/ComForm","title"=>"Feedback");
		if( $this->role_manager->checkPermession("feedback") > 0){
			$content[] = $feedback;
		}
		if (count($content) > 0){
			$menus[] = array("url"=>"backend/jobs","menutitle"=>"User","icon"=>"fa fa-user","submenu"=>$content);
		}
		
		
		//info
		$content  = array();
		
		$page = array("url"=>"backend/Page","title"=>"Page");
		if( $this->role_manager->checkPermession("page") > 0){
			$content[] = $page;
		}
		if (count($content) > 0){
			$menus[] = array("url"=>"backend/jobs","menutitle"=>"Information","icon"=>"fa fa-area-chart","submenu"=>$content);
		}
		

		//settings
		$content  = array();
		$manager = array("url"=>"backend/Manager","title"=>"Manager");
		if( $this->role_manager->checkPermession("manager") > 0){
			$content[] = $manager;
		}
		$role = array("url"=>"backend/Role/","title"=>"Role");
		if( $this->role_manager->checkPermession("role") > 0){
			$content[] = $role;
		}
		$permession = array("url"=>"backend/Permession/","title"=>"Permission");
		if( $this->role_manager->checkPermession("permession") > 0){
			$content[] = $permession;
		}
		$action = array("url"=>"backend/Action/","title"=>"Action");
		if( $this->role_manager->checkPermession("action") > 0){
			$content[] = $action;
		}
		if (count($content) > 0){
			$menus[] = array("url"=>"backend/jobs","menutitle"=>"Settings","icon"=>"fa fa-gear","submenu"=>$content);
		}
		
		
		$menu[] = array("text"=>lang("main"),"menus"=>$menus);
		
		$this->data["menu"] = $menu;
	}


	protected function render($the_view = NULL, $template = 'template/base')
	{
 		if($template == 'json' || $this->input->is_ajax_request())
 		{
 			header('Content-Type: application/json');
 			echo json_encode($this->data);
 		}
 		else
 		{		
 			$the_view = strtolower($the_view);
 			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($this->admin_folder.$the_view,$this->data, TRUE);
 			$this->load->view($this->admin_folder.$template, $this->data);
 		}
	}
	
	function getAdminInfo($key){
		return $this->authoration->getSession($key);
	}
}

class Public_Controller extends CI_Controller
{
	
	protected $template = "front/";
	
	protected $assets;

	protected $data = array();
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
		$this->data['page_title'] = 'Best 10 Movies,Movie,Music,Game,TV Shows,Episodes';

		$this->data['assets'] = $this->assets =  base_url().'assets/';
		
		$this->data['css'] = array();
		$this->data['css'][] = $this->assets."css/font-awesome.min.css";
		$this->data['css'][] = $this->assets."css/bootstrap.min.css";
		$this->data['css'][] = $this->assets."css/style.css";
		$this->data['css'][] = $this->assets."css/responsive.css";
		
		$this->data['js'] = array();
		$this->data['js'][] = $this->assets."js/jquery.min.js";
		$this->data['js'][] = $this->assets."js/bootstrap.min.js";
		$this->data['js'][] = $this->assets."js/main.js";

		$this->load->model("Family_model","Family");
		$this->load->model("Category_model","Category");
		
		$this->data["Families"] = $this->Family->getList();
		$this->data["Categories"] = $this->Category->getList();
	}
	
	protected function view($view){
		$this->load->view($view,$this->data);
	}
	
	protected function render($the_view = NULL, $template = 'template/base')
	{
		if($template == 'json' || $this->input->is_ajax_request())
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		}
		else
		{
			$the_view = strtolower($the_view);
			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($this->template.$the_view,$this->data, TRUE);
			$this->load->view($this->template.$template, $this->data);
		}
	}
}