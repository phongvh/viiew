<?php
class Phonenote_Mdl extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function write_note()
	{
		
		if(isset($_POST) && !empty($_POST))
		{
			$this->load->helper('url');
			$data['note'] = $this->input->post('note');			
			$data['ipaddress'] = $_SERVER["REMOTE_ADDR"];
			$data['timestamp'] = time();
			return $this->db->insert('phonenote', $data);
		}
		
	}
	
  public function read_all_note()
  {
    //$perpage = 20;
		$this->db->order_by('timestamp desc');
		//$this->db->limit($perpage, $perpage*($page-1));
		$query = $this->db->get('phonenote');
		return $query->result();
  }
	
}