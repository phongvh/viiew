<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
public function index()
	{
		$data['title'] = 'Viiew - Let people know where you are!';
		
		$this->load->view('themes/main/top', $data);
		$this->load->view('home');
    $this->load->view('svg');
		$this->load->view('themes/main/bottom');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
