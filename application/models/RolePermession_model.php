<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RolePermession_model extends MY_Model {
	
	protected  $id;

	public function __construct() {
		parent::__construct();
		
		$this->id = 'PM_id';
	}

	function getList($pemession_id){
		$this->db->order_by($this->id, 'DESC');
		$this->db->where("Permession_id",$pemession_id);
		$this->db->select("Action_id");
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	function add($permessions,$role_id){
		
		$this->del($role_id);
		$result = array();
		foreach ($permessions as $key=>$actions){
			foreach ($actions as $action){
				$data = array();
				$data["Role_id"]  = $role_id;
				$data["Permession_id"] = $key;
				$data["Action_id"]  = $action;
					
				$result[] = $data;
			}
		}
	
		$this->db->insert_batch($this->_table,$result);
	}
	
	
	function getByRolePermession($Role_id,$Permession_id){
		$this->db->select('Action_id');
		$this->db->from($this->_table);
		$this->db->where("Role_id",$Role_id);
		$this->db->where("Permession_id",$Permession_id);
		$result = $this->db->get();
	
		$ids = array();
		
		foreach ($result->result_array() as $_RP){
			$ids[] = $_RP["Action_id"];
		}
	
		return implode(",", $ids);
	}
	
	function getByRolePermessionCount($Role_id,$Permession_id){
		$this->db->select('Action_id');
		$this->db->from($this->_table);
		$this->db->where("Role_id",$Role_id);
		$this->db->where("Permession_id",$Permession_id);
		return $this->db->count_all_results();
	}

	function getByRolePermessionActionCount($Role_id,$Permession_id,$Action_id){
		$this->db->select('Action_id');
		$this->db->from($this->_table);
		$this->db->where("Role_id",$Role_id);
		$this->db->where("Permession_id",$Permession_id);
		$this->db->where("Action_id",$Action_id);
		return $this->db->count_all_results();
	}
	
	function getone($id){
		$query = $this->db->get_where($this->_table,array($this->id=>$id));
		return $query->row_array();
	}

	function del($role_id){
		return $this->delete(array("Role_id"=>$role_id));
	}
}