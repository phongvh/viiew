<?php
class Record extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('record_model');
	}

	public function index()
	{
		$code = $this->record_model->write();
		if($code === false){
			show_404();
		}else {
			header("Location: view/private_mode/$code");
		}
	}
	
	public function feedback()
	{
		$do = $this->record_model->write_feedback();
	}
  
  public function showme()
  {
    $do = $this->record_model->write_showme();
  }
}