<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ActionPermession_model extends MY_Model {
	
	protected  $id;

	public function __construct() {
		parent::__construct();
		
		$this->id = 'AP_id';
	}

	function getList($pemession_id){
		$this->db->order_by($this->id, 'DESC');
		$this->db->where("Permession_id",$pemession_id);
		$this->db->select("Action_id");
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	function add($action_ids,$permession_id){
		
		$this->del($permession_id);
		
		$result = array();
		foreach ($action_ids as $_action_id){
			$action = array();
			$action["Permession_id"] = $permession_id;
			$action["Action_id"]  = $_action_id;
					
			$result[] = $action;
		}
			
		$this->db->insert_batch($this->_table,$result);
		
	}
	
	

	function getone($id){
		$query = $this->db->get_where($this->_table,array($this->id=>$id));
		return $query->row_array();
	}

	function del($permession_id){
		return $this->delete(array("Permession_id"=>$permession_id));
	}
}