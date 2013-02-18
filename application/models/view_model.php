<?php
class View_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function private_get($code = FALSE){
		if ($code === FALSE)
		{
			$query = $this->db->get('records');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('records', array('privateid' => $code));
	
		return $query->row_array();
	}
	
	public function public_get($code = FALSE){
		if ($code === FALSE)
		{
			$query = $this->db->get('records');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('records', array('longid' => $code));
		
		$row = $query->row_array();
		$this->load->helper('url');
		if($this->input->get('t') === '1') header("Location:/view/private_mode/{$row['privateid']}");
		return $row;
	}
}
