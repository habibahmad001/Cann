<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course extends CI_Controller {

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
		$data['heading'] = 'Course Listing';
		$data['password'] = '';	
		$data['pageName'] = 'course';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course","",0,0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course","course_id IN (SELECT `course_id` FROM `user_role` where role = 'course_owner' and `user_id` = ".$this->session->userdata['default']["userId"].")",0,0);
		
		$this->load->view('user/course', $data);
	}
	
	public function Edit($Id){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Course Listing';
		$data['Message'] = '';
		$data['heading'] = 'Course Listing';
		$data['password'] = '';	
		$data['pageName'] = 'course';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course", "course_id = ".$Id, 0 , 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course", "", 0, 0);
		$this->load->view('user/course', $data);
	}
	
	
	public function delete($agentId,$URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'course_id', 'course')){
			redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Course Listing';
		$data['Message'] = '';
		$data['heading'] = 'Course Listing';
		$data['password'] = '';	
		$data['pageName'] = 'course';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['sumary'] = $this->input->post('sumary');
			$data['description'] = $this->input->post('description');
			$data['status'] = $this->input->post('status');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('sumary', 'sumary', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim|required');
			
	
				if($this->form_validation->run() === TRUE){
					
					$isValid = true;							
												
				}	
				//$isValid = true;		
				//echo $isValid;exit();
				if($isValid){
					
					//$agentId = $this->session->userdata('agentId');
					$Date = getCurrentDate();
					$Time = getCurrentTime();
					$DbFieldsAry = array('title', 'sumary', 'description', 'status');
					$InfoAry = array($data['title'], $data['sumary'], $data['description'], $data['status']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "course")){
						
						$DbFieldsAry2 = array('user_id', 'role', 'course_id', 'status', 'dat');
					    $InfoAry2 = array($this->session->userdata['default']['userId'], "course_owner", $ins_id, "active", $Date);
						$this->allfunction->AddInfo_WithId($DbFieldsAry2, $InfoAry2, "user_role");
					
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/course', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/course', 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/course', 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/course', 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $page = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Course';
		$data['Message'] = '';
		$data['heading'] = 'Course';
		$data['password'] = '';	
		$data['pageName'] = 'profile';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['sumary'] = $this->input->post('sumary');
			$data['description'] = $this->input->post('description');
			$data['status'] = $this->input->post('status');
			
			
			
			/*$this->form_validation->set_rules('fname', 'fname', 'trim|required');
			$this->form_validation->set_rules('lname', 'lname', 'trim|required');*/
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('sumary', 'sumary', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim|required');
			/*$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('add', 'add', 'trim|required');*/
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$updateDbFieldsAry = array('title', 'sumary', 'description', 'status');
					$updateInfoAry = array($data['title'], $data['sumary'],$data['description'],$data['status']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'course_id', $updateDbFieldsAry, $updateInfoAry, "course")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/course', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/course', 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/course', 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course","",0,0);
		
			$this->load->view('user/course', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */