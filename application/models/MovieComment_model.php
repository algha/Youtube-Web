<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MovieComment_model extends MY_Model {

	protected  $id;

	public function __construct() {
		parent::__construct();

		$this->id = $this->_table.'_id';
	}


	function getCount($where = NULL){
		$this->db->from($this->_table);
		if ($where != null){
			$this->db->where($where);
		}
		return $this->db->count_all_results();
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