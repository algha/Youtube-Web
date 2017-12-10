<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager_model extends MY_Model {
	
	protected  $id;
	
	public function __construct() {
		parent::__construct();
		
		$this->id = $this->_table.'_id';
		
	}
	
	function getListBackEnd($get){
	
		$start = 0;
		if (isset($get["iDisplayStart"])){
			$start = intval($get["iDisplayStart"]);
		}
		$length = 20;
		if (isset($get["iDisplayLength"])){
			$length = intval($get["iDisplayLength"]);
		}
	
		if (isset($get["sSearch"])){
	
		}
		
		$this->db->select('manager.*,role.Name as rName');
		$this->db->from($this->_table);
		
		$this->db->join("role",'role.Role_id = manager.role_id');
		
		$this->db->order_by($this->id, 'DESC');
		$this->db->limit($length,$start);
	
	
		$Actions = $this->db->get()->result_array();
		//echo $this->db->last_query();
	
		$this->db->from($this->_table);
		$count = $this->db->count_all_results();
	
	
		$response = array(
				'aaData' => $Actions,
				'iTotalRecords' => $count,
				'iTotalDisplayRecords' => $count
		);
	
		return $response;
	}

	function validate($email, $password){
		$query = $this->db->get_where($this->_table,array("Email"=>$email,"Password"=>$password));
 		return $query->row_array();
	}

	function getList(){
		$this->db->order_by($this->id, 'DESC');
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	function add($data,$insert_id = false){
		$this->db->insert($this->_table, $data);
		return $insert_id == true ? $this->db->insert_id() : $this->db->affected_rows();
	}
	
	
	function getone($id){
		$query = $this->db->get_where($this->_table,array($this->id=>$id));
		return $query->row_array();
	}
	
	function del($id){
		return $this->delete(array($this->id=>$id));
	}
}

