<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {

	protected  $id;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->id = $this->_table.'_id';
	}
	
	function getList(){
		$this->db->order_by('Category_id', 'DESC');
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	function getWhereInByDescription($description){
		$this->db->order_by($this->id, 'DESC');
		$this->db->where_in("Description",$description);
		$query = $this->db->get($this->_table);
		return $query->result_array();
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
	
	
		$this->db->from($this->_table);
		$this->db->order_by($this->_table."_id", 'ASC');
		$this->db->limit($length,$start);
	
	
		$Lines = $this->db->get()->result_array();
		//echo $this->db->last_query();
	
		$this->db->from($this->_table);
		$count = $this->db->count_all_results();
	
	
		$response = array(
				'aaData' => $Lines,
				'iTotalRecords' => $count,
				'iTotalDisplayRecords' => $count
		);
	
		return $response;
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