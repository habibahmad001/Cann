<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Course Listing';
		$data['Message'] = '';
		$data['heading'] = 'Dashboard';
		$data['password'] = '';	
		$data['pageName'] = 'dashboard';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		$data['COURSE_ADMIN_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_admin' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		$data['SITE_ADMIN_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'site_admin' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		$data['COURSE_OWNER_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_owner' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		
		$this->load->view('user/dashboard', $data);
	}
	
	public function view_dashboard($Id)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Course Listing';
		$data['Message'] = '';
		$data['heading'] = 'Dashboard';
		$data['password'] = '';	
		$data['pageName'] = 'dashboard';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		
		$data['Id'] = $Id;
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		$data['COURSE_ADMIN_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_admin' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		$data['COURSE_USER_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_user' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		$data['COURSE_OWNER_QUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_owner' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		
		$this->load->view('user/dashboard', $data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */