<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends MY_Model {
	
	protected  $id;

	public function __construct() {
		parent::__construct();
		
		$this->id = $this->_table.'_id';
	}

	function del($id){
		return $this->delete(array($this->id=>$id));
	}
	
	function getList(){
		$this->db->order_by($this->id, 'DESC');
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	function search($key){
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->like('Name', $key);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getListBackEnd($get){
		$aColumns = array( $this->id, 'Name', 'Business','Address');
		$parameters = tableRequestHelper($aColumns,$get);
		
		$this->db->from($this->_table);
		if ($parameters["where"] != ""){
			$this->db->where($parameters["where"],null, false);
		}
		$this->db->order_by($parameters["order"]);
		$this->db->limit($parameters["length"],$parameters["start"]);
		$Datas = $this->db->get()->result_array();
	
		$this->db->from($this->_table);
		$count = $this->db->count_all_results();
	
		$response = array(
				'aaData' => $Datas,
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

}