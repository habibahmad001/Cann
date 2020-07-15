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
	 
	  ////////////////// Static setting variabls //////////////  Step = 1
	 
		private $Table = 'login';
		//private $sortBy = 'fname';
		//private $sortType = 'asc';
		//private $sortBySession = 'news_orderBy';       // If Sorting Needed
		//private $sortTypeSession = 'news_orderType';  // If Sorting Needed
	
	////////////////// Static setting variabls //////////////
	
	
	public function index()
	{
		$data['pageTitle'] = $this->project_model->projectName().' :: Home';
		$data['Message'] = '';	
		$data['heading'] = 'Home';
		$data['pageName'] = 'home';
		//$this->load->view('welcome_message');
		
		$this->load->view('home',$data);
	}
	
	public function login()

	{
		//echo "hellow";exit;
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Login';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		////////////// Gernal Setting ///////////////////	

		
		////////////// isUserLoggedin() Call Local Function ///////////////////
		if($this->isUserLoggedin()){

			redirect(base_url().'user/profile', 'refersh');

		}
		////////////// isUserLoggedin() Call Local Function ///////////////////

		
		////////////// Hidden Field for form Submint ///////////////////
		$isFormSubmitted = $this->input->post('GetUserLogin');
		$ismanul = $this->input->post('manual');
		$isapi = $this->input->post('api');
		////////////// Hidden Field for form Submint ///////////////////

		

		if((bool)($isFormSubmitted) == TRUE){

			////////////// Get Form Data ///////////////////
			$data['userName'] = $this->input->post('userName');
			$data['password'] = $this->input->post('password');
			////////////// Get Form Data ///////////////////

			
			////////////// IF Valid User ///////////////////
			if($this->validateUserInfo($data['userName'], $data['password'])){


				////////////// Redirection IF user already Login ///////////////////
				$redirect_to = $this->session->userdata('back_from_login');
				$this->session->set_userdata('back_from_login', '');
				////////////// Redirection IF user already Login ///////////////////

				if ($redirect_to != '') {
					redirect($redirect_to, 'refresh');
				} else {
					redirect(base_url().'compaign_list', 'refersh');
				}				

			}
			////////////// IF Valid User ///////////////////

			$data['Message'] = 'Invalid username or password!';

		}
		
		////////////// Menual Settings ///////////////////
		if((bool)($ismanul) == TRUE){
			
			////////////// Get Form Data ///////////////////
			$data['Name'] = $this->input->post('name');
			$data['Email'] = $this->input->post('email');
			$data['AEmail'] = $this->input->post('aemail');
			////////////// Get Form Data ///////////////////
			
			$user_temp_acct_data = array('Name' => $data['Name'],'Email' => $data['Email'], 'Adword_Email' => $data['AEmail']);
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
			
			/*$session_user_data = $this->session->userdata('user_temp_acct_data');
			echo $session_user_data["Name"]."<br />";
			echo $session_user_data["Email"]."<br />";
			echo $session_user_data["Adword_Email"];exit;*/
			
			redirect(base_url().'compaign_file', 'refersh');
		}
		////////////// Menual Settings ///////////////////
		
		
		////////////// API Settings ///////////////////
		if((bool)($isapi) == TRUE){
			
			redirect(base_url().'compaign_api', 'refersh');
		}
		////////////// API Settings ///////////////////
			

		//$this->load->view('/home', $data);

	}
	
	

    ////////////// Function Setting Up the Session ///////////////////
	private function validateUserInfo($userName, $password){

		
		
		////////////// Check User In DB ///////////////////
		$dbInfo = $this->allfunction->getSingleData_Row($userName, 'uname', 'registration');
		////////////// Check User In DB ///////////////////

		
		////////////// Valid User Set Session ///////////////////
		if((bool)($dbInfo) == TRUE){
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			if($dbInfo->pass == $password && $userName == $dbInfo->uname){
				$sessData = array('agentId' => $dbInfo->id,'Name' => $userName, 'pas' => $password, 'ipAdd' => $ipAddress, 'agentTyp' => $dbInfo->flag, 'recordsPerPage' => 20);
				$this->session->set_userdata($sessData);				
				return true;
			}
		}
		////////////// Valid User Set Session ///////////////////	
		return false;

		

	}
	////////////// Function Setting Up the Session ///////////////////

	
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