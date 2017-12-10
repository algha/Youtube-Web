<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends MY_Model {
	
	protected  $id;

	public function __construct() {
		parent::__construct();
		
		$this->id = $this->_table.'_id';
	}

	function getList(){
		$this->db->order_by($this->id, 'ASC');
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