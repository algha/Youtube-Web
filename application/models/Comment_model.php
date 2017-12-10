<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends MY_Model {

	protected  $id;

	public function __construct() {
		parent::__construct();

		$this->id = $this->_table.'_id';
	}
	
	function getListBackEnd($get){
		
		$aColumns = array( $this->id, 'Content', 'Good', 'Created_at');
		$parameters = tableRequestHelper($aColumns,$get);
		
		$this->db->select("Comment.*,User.Name");
		$this->db->from($this->_table);
		$this->db->join("MovieContent","MovieContent.Comment_id=Comment.Comment_id","left");
		$this->db->join("User","User.User_id=MovieContent.User_id","left");
		
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