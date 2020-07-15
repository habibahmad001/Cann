<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compaign_api extends CI_Controller {

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
	 
	  ////////////////// Static setting variabls //////////////  Step = 1
	 
		private $Table = 'login';
		//private $sortBy = 'fname';
		//private $sortType = 'asc';
		//private $sortBySession = 'news_orderBy';       // If Sorting Needed
		//private $sortTypeSession = 'news_orderType';  // If Sorting Needed
	
	////////////////// Static setting variabls //////////////
	
	
	public function index()
	{
		$data['pageTitle'] = $this->project_model->projectName().' :: Compaign API';
		$data['Message'] = '';	
		$data['heading'] = 'Compaign API';
		$data['pageName'] = 'compaign_api';
		//$this->load->view('welcome_message');
		
		$this->load->view('compaign_api',$data);
	}
	
	public function login()

	{
		//echo "hellow";exit;
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Compaign API';
		$data['Message'] = '';	
		////////////// Gernal Setting ///////////////////	


		
		////////////// Hidden Field for form Submint ///////////////////
		$isFormSubmitted = $this->input->post('GetUserLogin');
		////////////// Hidden Field for form Submint ///////////////////

		
		////////////// Menual Settings ///////////////////
		if((bool)($isFormSubmitted) == TRUE){
			
			////////////// Get Form Data ///////////////////
			$data['Token'] = $this->input->post('token');
			$data['pass'] = $this->input->post('pass');
			////////////// Get Form Data ///////////////////

			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Token' => $data['Token'],'apipass' => $data['pass']);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);

			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
			
			/*$session_user_data = $this->session->userdata('user_temp_acct_data');
			echo $session_user_data["Name"]."<br />";
			echo $session_user_data["Email"]."<br />";
			echo $session_user_data["Adword_Email"]."<br />";
			echo $session_user_data["Token"]."<br />";
			echo $session_user_data["apipass"];exit;*/
			
			redirect(base_url().'compaign_list', 'refersh');
		}
		////////////// Menual Settings ///////////////////
		
		
		////////////// API Settings ///////////////////
		if((bool)($isapi) == TRUE){
			
			redirect(base_url().'compaign_api', 'refersh');
		}
		////////////// API Settings ///////////////////
			

		//$this->load->view('/home', $data);

	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */