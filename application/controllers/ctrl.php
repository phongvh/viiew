<?php
class Ctrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ctrl_model');
	}

	public function index()
	{
		show_404();
	}

	public function iloveyou($page=1)
	{
		if(!is_numeric($page) || $page < 1) $page = 1;
		$data['records'] = $this->ctrl_model->read($page);
		
		if($data['records'] === false){
			show_404();
		}
		$this->output->enable_profiler(true);
		$this->load->helper('url');

		$data['page'] = $page;
		$data['base_url'] = base_url();
		$data['title'] = "Admin Viiew";
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'ctrl/iloveyou/';
		$config['total_rows'] = $this->ctrl_model->count_all();
		
		$this->pagination->initialize($config);		
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('themes/main/top', $data);
		$this->load->view('ctrl', $data);
		$this->load->view('themes/main/bottom');
	}
	
}