<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Upload extends CI_Controller {
 
	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper(array('url', 'form'));
	}
	 
	public function index()
	{
	     $this->load->view('compaign_file');
	}
	 
	public function uploadify1()
	{
		$config['upload_path'] =  "uploads";
		$config['allowed_types'] = '*'; 
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep1"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}
 
/* End of file uploadify.php */
/* Location: ./application/controllers/uploadify.php */