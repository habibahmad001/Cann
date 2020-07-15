<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Profile extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: User Profile';
		$data['Message'] = '';
		$data['heading'] = 'Personal Information';
		$data['password'] = '';	
		$data['pageName'] = 'profile';	
		////////////// Gernal Setting ///////////////////
		
		
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("google_account_info","userid = ".$_SESSION['uid'],0,0);
		
		$this->load->view('user/user_profile', $data);
	}
	public function delete($agentId,$URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'id', 'google_account_info')){
			redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	public function update($ID = NULL, $page = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Profile';
		$data['Message'] = '';
		$data['heading'] = 'Personal Information';
		$data['password'] = '';	
		$data['pageName'] = 'profile';	
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata('agentId');
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['fname'] = $this->input->post('fname');	
			$data['lname'] = $this->input->post('lname');
			$data['email'] = $this->input->post('email');
			$data['uname'] = $this->input->post('uname');	
			$data['pass'] = $this->input->post('pass');
			$data['sex'] = $this->input->post('sex');
			$data['phone'] = $this->input->post('phone');	
			$data['add'] = $this->input->post('add');
			
			
			
			/*$this->form_validation->set_rules('fname', 'fname', 'trim|required');
			$this->form_validation->set_rules('lname', 'lname', 'trim|required');*/
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('uname', 'uname', 'trim|required');
			$this->form_validation->set_rules('pass', 'pass', 'trim|required');
			/*$this->form_validation->set_rules('sex', 'sex', 'trim|required');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('add', 'add', 'trim|required');*/
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$updateDbFieldsAry = array('fname', 'lname', 'email','uname', 'pass', 'sex', 'phone', 'add');
					$updateInfoAry = array($data['fname'], $data['lname'],$data['email'], $data['uname'], $data['pass'],$data['sex'], $data['phone'], $data['add']);								
					
					if($this->allfunction->updateInfo_Simple($this->session->userdata('agentId'), 'id', $updateDbFieldsAry, $updateInfoAry, "registration")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/profile', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/profile', 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/profile', 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
			$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("google_account_info","userid = ".$_SESSION['uid'],0,0);
		
			$this->load->view('user/user_profile', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */