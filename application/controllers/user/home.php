<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: User Home';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		////////////// Gernal Setting ///////////////////
		
		
		////////////// isUserLoggedin() Call Local Function ///////////////////
		if((bool) $this->isUserLoggedin() == false){
		
			redirect(base_url().'user', 'refersh');

		}
		////////////// isUserLoggedin() Call Local Function ///////////////////
		
		
		
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		
		$this->load->view('user/home', $data);
	}
	
	
	
	////////////// Function Check Login ///////////////////
	private function isUserLoggedin(){


		////////////// Check If Login ///////////////////
		if((bool)($this->session->userdata('userName')) == TRUE && (bool)($this->session->userdata('pass')) == TRUE){
					
			////////////// Get Session Info ///////////////////		
			$userName = $this->session->userdata('userName');
			$password = $this->session->userdata('pass');
	        ////////////// Get Session Info ///////////////////
			
	
			////////////// DB Query Get user Info ///////////////////
			$dbInfo = $this->allfunction->getSingleData_Row($userName, 'uname', 'registration');
			////////////// DB Query Get user Info ///////////////////
	
					
	
			if($dbInfo->pass == $password && $userName == $dbInfo->uname){
	
	
				return true;
	
			}
		}
		
		////////////// Check If Login ///////////////////
		
		
		////////////// Other Wise ///////////////////
		return false;
		////////////// Other Wise ///////////////////
		

	}
	////////////// Function Check Login ///////////////////
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */