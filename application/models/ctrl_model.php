<?php
class Ctrl_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function read($page){
		
		$perpage = 20;
		$this->db->order_by('time desc');
		$this->db->limit($perpage, $perpage*($page-1));
		$query = $this->db->get('records');
		return $query->result_array();
		
	}
	
	public function count_all(){
		return $this->db->count_all('records');
	}
}