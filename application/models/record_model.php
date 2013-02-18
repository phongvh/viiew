<?php
class Record_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function write(){
		
		if(empty($_POST)) return false;
		
		$this->load->helper('url');
		$data['longid'] = uniqid();
		$data['name'] = $this->input->post('name');		
		$data['privateid'] = md5("{$data['name']}_{$data['longid']}");
		$data['time'] = time();
		$data['longitude'] = doubleval($this->input->post('longitude'));
		$data['latitude'] = doubleval($this->input->post('latitude'));
		
		//if(!$data['longitude'] || $data['name'] === "") die("Please enter your name and click <strong>\"Enter!\"</strong> button. Do not press <strong>enter</strong> key on your keyboard.</br><a href=\"./index.php\">Back</a>");
		
		$data['user_agent'] = $_SERVER["HTTP_USER_AGENT"];
		$data['ipaddress'] = $_SERVER["REMOTE_ADDR"];
		
		$query = "INSERT INTO records(longid, name, privateid, time, longitude, latitude, user_agent, ipaddress) VALUE (?, ?, ?, ?, ?, ?, ?, ?)";
		if($this->db->query($query, $data)) return $data['privateid'];
		
	}
	
	public function write_feedback()
	{
		if(empty($_POST)) show_404();
		
		$this->load->helper('url');
		
		$q = $this->input->post('q');
		$data['answer'] = $this->input->post('answer');
		$data['longid'] = $this->input->post('code');
		switch ($q){
			case 1: 
				$query = "UPDATE records SET answer=? WHERE longid=?";
				break;
			case 2:
				$query = "UPDATE records SET user_position=? WHERE longid=?";
				break;
			default:
				return false;
		}
		
		if($this->db->query($query, $data)) return true;
		return false;
	}
  
  public function write_showme()
  {
    if(empty($_POST)) show_404();
    
    $this->load->helper('url');
    $data['rid'] = $this->input->post('rid');
    $data['time'] = time();
    $data['longitude'] = $this->input->post('lng');
    $data['latitude'] = $this->input->post('lat');
    $data['user_agent'] = $_SERVER["HTTP_USER_AGENT"];
		$data['ipaddress'] = $_SERVER["REMOTE_ADDR"];
    
    $query = $this->db->query("SELECT id, clicks FROM showme WHERE rid=? AND ipaddress=?", array($data['rid'], $data['ipaddress']));
    if($query->num_rows() > 0)
    {
      $row = $query->row();
      $clicks = (int)$row->clicks + 1;
      return $this->db->query("UPDATE showme SET clicks=? WHERE id=?", array($clicks, $row->id));
    }else
    {
      $insert = "INSERT INTO showme(rid, time, longitude, latitude, user_agent, ipaddress) VALUE (?, ?, ?, ?, ?, ?)";
      return $this->db->query($insert, $data);
    } 
  }
	
}