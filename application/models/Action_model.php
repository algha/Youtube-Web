<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_model extends MY_Model {
	
	protected  $id;

	public function __construct() {
		parent::__construct();
		
		$this->id = $this->_table.'_id';
	}
	

	function getListBackEnd($get){

		$aColumns = array( $this->id, 'Name', 'Description');
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

	function getByPermession($permssion_id){
		$this->db->select('Action_id');
		$this->db->from('actionpermession');
		$this->db->where("Permession_id",$permssion_id);
		$result = $this->db->get();
		if (count($result) == 0){
			return ;
		}
		$ids = array();
		foreach ($result->result_array() as $_result){
			$ids[] =  $_result["Action_id"];
		}
		$ids = implode(",", $ids);
		
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where("Action_id IN($ids)");
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function getByPermessionIds($permssion_id){
		$this->db->select('Action_id');
		$this->db->from('actionpermession');
		$this->db->where("Permession_id",$permssion_id);
		$result = $this->db->get();
		if (count($result) == 0){
			return ;
		}
		$ids = array();
		foreach ($result->result_array() as $_result){
			$ids[] =  $_result["Action_id"];
		}
		$ids = implode(",", $ids);
		return $ids;
	}
	
	function getByPermessionIdsCount($permssion_id){
		$this->db->select('Action_id');
		$this->db->from('actionpermession');
		$this->db->where("Permession_id",$permssion_id);
		return $this->db->count_all_results();
	}

	
	function getByDescription($description){
		$query = $this->db->get_where($this->_table,array("Description"=>$description));
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