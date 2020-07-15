<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content_view extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Course View';
		$data['Message'] = '';
		$data['heading'] = 'Course View';
		$data['password'] = '';	
		$data['pageName'] = 'course_view';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		$Id = 1;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id = ".$Id,0,0);
		$data['QUERY_SECTION'] = $this->allfunction->fetchAllDataWhere("course_section","course_id = ".$Id,0,0);
		
		$this->load->view('user/content_view', $data);
	}
	
	public function page_view($Id)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Content View';
		$data['Message'] = '';
		$data['heading'] = 'Content View';
		$data['password'] = '';	
		$data['pageName'] = 'content_view';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","cscec_id = ".$Id,0,0);
		//$data['QUERY_SECTION'] = $this->allfunction->fetchAllDataWhere("course_section","course_id = ".$Id,0,0);
		
		$this->load->view('user/content_view', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */