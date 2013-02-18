<?php
class View extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('view_model');
	}

	public function index()
	{
		echo "Nothing to view here!";
	}

	public function private_mode($code = FALSE){
		if($code === FALSE)
			show_404();
		else {
			$data['record'] = $this->view_model->private_get($code);
		
			if (empty($data['record']))
			{
				show_404();
			}
			$data['title'] = "Location Viewer - Hello ". $data['record']['name']. "!";
		
			$this->load->view('themes/main/top', $data);
			$this->load->view('private_view', $data);
			$this->load->view('themes/main/bottom');
		}
	}
	
	public function public_mode($code = FALSE)
	{
		if($code === FALSE)
			echo "Enter a code!";
		else {
			$data['record'] = $this->view_model->public_get($code);
				
			if (empty($data['record']))
			{
				show_404();
			}
			$data['title'] = "Location Viewer - ".$data['record']['name']." was here...";
				
			$this->load->view('themes/main/top', $data);
			$this->load->view('public_view', $data);
			$this->load->view('themes/main/bottom');
		}
	}
}
