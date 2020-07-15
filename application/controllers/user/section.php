<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Section extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Section Listing';
		$data['Message'] = '';
		$data['heading'] = 'Section Listing';
		$data['password'] = '';	
		$data['pageName'] = 'section';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section","",0,0);
		$data['cid'] = 1;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section","course_id = " . $data['cid'], 0, 0);
		
		$this->load->view('user/section', $data);
	}
	
	public function cid($cid)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Section Listing';
		$data['Message'] = '';
		$data['heading'] = 'Section Listing';
		$data['password'] = '';	
		$data['pageName'] = 'section';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section","",0,0);
		
		$data['course_id'] = $cid;
		$data['cid'] = $cid;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section","course_id = " . $data['cid'], 0, 0);
		
		$this->load->view('user/section', $data);
	}
	
	public function Edit($Id, $pId){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Section Listing';
		$data['Message'] = '';
		$data['heading'] = 'Section Listing';
		$data['password'] = '';	
		$data['pageName'] = 'section';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['course_id'] = $pId;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section", "cscec_id = " . $Id, 0, 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section", "course_id = " . $pId, 0, 0);
		$this->load->view('user/section', $data);
	}
	
	
	public function delete($agentId, $URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'cscec_id', 'course_section')){
			header("Location: http://localhost/can/user/section/cid/" . $URL);
			//redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add($pid){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Section Listing';
		$data['Message'] = '';
		$data['heading'] = 'Section Listing';
		$data['password'] = '';	
		$data['pageName'] = 'section';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['order'] = $this->input->post('order');
			$data['course_id'] = $pid;
			$data['description'] = $this->input->post('description');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('course_id', 'course_id', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			
	
				if($this->form_validation->run() === TRUE){
					
					$isValid = true;							
												
				}	
				//$isValid = true;		
				//echo $isValid;exit();
				if($isValid){
					
					//$agentId = $this->session->userdata('agentId');
					$Date = getCurrentDate();
					$Time = getCurrentTime();
					$DbFieldsAry = array('title', 'order', 'course_id', 'description');
					$InfoAry = array($data['title'], $data['order'], $data['course_id'], $data['description']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "course_section")){
					
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/section/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/section/cid/'.$pid, 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/section/cid/'.$pid, 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/section/cid/'.$pid, 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $pid = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Section Listing';
		$data['Message'] = '';
		$data['heading'] = 'Section Listing';
		$data['password'] = '';	
		$data['pageName'] = 'section';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['order'] = $this->input->post('order');
			$data['course_id'] = $this->input->post('course_id');
			$data['description'] = $this->input->post('description');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('course_id', 'course_id', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$DbFieldsAry1 = array('title', 'order', 'course_id', 'description');
					$InfoAry1 = array($data['title'], $data['order'], $data['course_id'], $data['description']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'cscec_id', $DbFieldsAry1, $InfoAry1, "course_section")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/section/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/section/cid/'.$pid, 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/section/cid/'.$pid, 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section","`cscec_id` = " . $ID, 0, 0);
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section","", 0, 0);
		
			$this->load->view('user/section', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */