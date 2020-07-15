<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quiz extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Quiz Listing';
		$data['Message'] = '';
		$data['heading'] = 'Quiz Listing';
		$data['password'] = '';	
		$data['pageName'] = 'quiz';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quizes","",0,0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quizes","`user_id` = ".$this->session->userdata['default']["userId"],0,0);
		$data['COURSE_QUERY'] = $this->allfunction->fetchAllDataWhere("course", "", 0, 0);
		$data['SECTION_QUERY'] = $this->allfunction->fetchAllDataWhere("course_section", "", 0, 0);
		
		$this->load->view('user/quiz', $data);
	}
	
	public function Edit($Id){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Quiz Listing';
		$data['Message'] = '';
		$data['heading'] = 'Quiz Listing';
		$data['password'] = '';	
		$data['pageName'] = 'quiz';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quizes", "qid = ".$Id, 0 , 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quizes", "", 0, 0);
		$data['COURSE_QUERY'] = $this->allfunction->fetchAllDataWhere("course", "", 0, 0);
		$data['SECTION_QUERY'] = $this->allfunction->fetchAllDataWhere("course_section", "", 0, 0);
		$this->load->view('user/quiz', $data);
	}
	
	
	public function delete($agentId,$URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'qid', 'quiz')){
			redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Quiz Listing';
		$data['Message'] = '';
		$data['heading'] = 'Quiz Listing';
		$data['password'] = '';	
		$data['pageName'] = 'quiz';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['course_id'] = $this->input->post('course_id');	
			$data['section_id'] = $this->input->post('section_id');
			$data['description'] = $this->input->post('description');
			$data['title'] = $this->input->post('title');
			$data['q_time'] = $this->input->post('q_time');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('course_id', 'course_id', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_rules('section_id', 'section_id', 'trim|required');
			$this->form_validation->set_rules('q_time', 'q_time', 'trim|required');
			
	
				if($this->form_validation->run() === TRUE){
					
					$isValid = true;							
												
				}	
				//$isValid = true;		
				//echo $isValid;exit();
				if($isValid){
					
					//$agentId = $this->session->userdata('agentId');
					$Date = getCurrentDate();
					$Time = getCurrentTime();
					$DbFieldsAry = array('user_id', 'course_id', 'section_id', 'title', 'description', 'q_time');
					$InfoAry = array($this->session->userdata['default']["userId"], $data['course_id'], $data['section_id'], $data['title'], $data['description'], $data['q_time']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "tbl_quizes")){
						
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/quiz', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/quiz', 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/quiz', 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/quiz', 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $page = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: quiz';
		$data['Message'] = '';
		$data['heading'] = 'quiz';
		$data['password'] = '';	
		$data['pageName'] = 'profile';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['course_id'] = $this->input->post('course_id');	
			$data['section_id'] = $this->input->post('section_id');
			$data['description'] = $this->input->post('description');
			$data['title'] = $this->input->post('title');
			$data['q_time'] = $this->input->post('q_time');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('course_id', 'course_id', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_rules('section_id', 'section_id', 'trim|required');
			$this->form_validation->set_rules('q_time', 'q_time', 'trim|required');
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$updateDbFieldsAry = array('user_id', 'course_id', 'section_id', 'title', 'description', 'q_time');
					$updateInfoAry = array($this->session->userdata['default']["userId"], $data['course_id'], $data['section_id'], $data['title'], $data['description'], $data['q_time']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'qid', $updateDbFieldsAry, $updateInfoAry, "tbl_quizes")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/quiz', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/quiz', 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/quiz', 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quizes","",0,0);
			$data['COURSE_QUERY'] = $this->allfunction->fetchAllDataWhere("course", "", 0, 0);
		    $data['SECTION_QUERY'] = $this->allfunction->fetchAllDataWhere("course_section", "", 0, 0);
		
			$this->load->view('user/quiz', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */