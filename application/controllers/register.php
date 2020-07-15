<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

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
	 
		private $Table = 'user';
		//private $sortBy = 'fname';
		//private $sortType = 'asc';
		//private $sortBySession = 'news_orderBy';       // If Sorting Needed
		//private $sortTypeSession = 'news_orderType';  // If Sorting Needed
	
	////////////////// Static setting variabls //////////////
	
	public function index()
	{
		$data['pageTitle'] = $this->project_model->projectName().' :: Registration Page';
		$data['Message'] = '';	
		$data['heading'] = 'User Registration';
		$data['pageName'] = 'register';
		//$this->load->view('welcome_message');
		
		$this->load->view('register',$data);
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		

		$data['pageTitle'] = $this->project_model->projectName().' :: Registration Page';
		$data['Message'] = '';	
		$data['heading'] = 'User Registration';
		$data['pageName'] = 'register';				
		$isValid = false;
		
		$data['name'] = '';
		$data['user_name'] = '';
		$data['email'] = '';
		$data['password'] = '';
		$data['status'] = '';
		$data['join_id'] = '';
		$data['last_login'] = '';

		//if($this->input->post('save')){
			if (isset($_POST['save'])) {
			$data['name'] = $this->input->post('name');	
			$data['user_name'] = $this->input->post('user_name');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');	
			$data['status'] = $this->input->post('status');
			$data['join_id'] = $this->input->post('join_id');
			$data['last_login'] = date("Y-m-d H:i:s");
			
			/*$this->form_validation->set_rules('fname', 'fname', 'trim|required');*/
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('user_name', 'user_name', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim|required');
			$this->form_validation->set_rules('join_id', 'join_id', 'trim|required');
			/*$this->form_validation->set_rules('add', 'add', 'trim|required');*/

			if($this->form_validation->run() === TRUE){
				
				$isValid = true;							
											
			}	
			//$isValid = true;		
			//echo $isValid;exit();
			if($isValid){
				
				//$agentId = $this->session->userdata('agentId');
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$DbFieldsAry = array('name', 'user_name', 'email', 'password', 'status', 'join_id', 'last_login');
				$InfoAry = array($data['name'], $data['user_name'],$data['email'], $data['password'],$data['status'], $data['join_id'], $data['last_login']);				
				
				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, $this->Table)){
					
					setMessage('error_message', 'You are registered successfully!');
					redirect(base_url().'user/login', 'refresh');
				}
				else{
					setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
					redirect(base_url().'register', 'refresh');	
				}	
			}
			else{
				setMessage('error_message', 'Please fill the (*) fields and try later');
				redirect(base_url().'register', 'refresh');
			}
		}
		else{
			setMessage('error_message', 'Form is not submit successfuly!');
			redirect(base_url().'register', 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */