<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller {



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
		//echo "hellow";exit;
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Login';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		////////////// Gernal Setting ///////////////////	

		
		////////////// isUserLoggedin() Call Local Function ///////////////////
		if($this->isUserLoggedin()){

			redirect(base_url().'user/dashboard/view_dashboard/1', 'refersh');

		}
		////////////// isUserLoggedin() Call Local Function ///////////////////

		
		////////////// Hidden Field for form Submint ///////////////////
		$isFormSubmitted = $this->input->post('GetUserLogin');
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
					redirect(base_url().'user/home', 'refersh');
				}				

			}
			////////////// IF Valid User ///////////////////

			$data['Message'] = 'Invalid username or password!';

		}

			

		$this->load->view('user/index', $data);

	}

	
	////////////// Function Setting Up the Session ///////////////////
	private function validateUserInfo($userName, $password){

		
		
		////////////// Check User In DB ///////////////////
		$dbInfo = $this->allfunction->getSingleData_Row($userName, 'user_name', 'user');
		////////////// Check User In DB ///////////////////

		
		////////////// Valid User Set Session ///////////////////
		if((bool)($dbInfo) == TRUE){
			$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
			if($dbInfo->password == $password && $userName == $dbInfo->user_name){
				$sessData = array('userId' => $dbInfo->user_id,'User_Name' => $userName, 'password' => $password, 'REMOTE_ADDR' => $REMOTE_ADDR, 'FlagType' => 1, 'recordsPerPage' => 20);
				$UserLoginInfo = array('default' => $sessData);
				$this->session->set_userdata($UserLoginInfo);				
				return true;
			}
		}
		////////////// Valid User Set Session ///////////////////	
		return false;

		

	}
	////////////// Function Setting Up the Session ///////////////////

	
	////////////// Function Check Login ///////////////////
	private function isUserLoggedin(){

		/////////////////// Set Session Array ////////////////
		$sessiondata = $this->session->userdata('default');
		/////////////////// Set Session Array ////////////////

		////////////// Check If Login ///////////////////
		if((bool)($sessiondata["User_Name"]) == TRUE && (bool)($sessiondata["password"]) == TRUE){
					
			////////////// Get Session Info ///////////////////	
			$userName = $sessiondata["User_Name"];
			$password = $sessiondata["password"];
	        ////////////// Get Session Info ///////////////////
			
	
			////////////// DB Query Get user Info ///////////////////
			$dbInfo = $this->allfunction->getSingleData_Row($userName, 'user_name', 'user');
			////////////// DB Query Get user Info ///////////////////
	
					
	
			if($dbInfo->password == $password && $userName == $dbInfo->user_name){
	
	
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

//$data['Message'] = 'Enter username and password!';

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */