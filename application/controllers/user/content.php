<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Content Listing';
		$data['Message'] = '';
		$data['heading'] = 'Content Listing';
		$data['password'] = '';	
		$data['pageName'] = 'content';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","",0,0);
		$data['cid'] = 1;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","cscec_id = " . $data['cid'], 0, 0);
		
		$this->load->view('user/content', $data);
	}
	
	public function cid($cid)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Content Listing';
		$data['Message'] = '';
		$data['heading'] = 'Content Listing';
		$data['password'] = '';	
		$data['pageName'] = 'content';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","",0,0);
		
		$data['cscec_id'] = $cid;
		$data['cid'] = $cid;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","cscec_id = " . $data['cid'], 0, 0);
		
		$this->load->view('user/content', $data);
	}
	
	public function Edit($Id, $pId){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Content Listing';
		$data['Message'] = '';
		$data['heading'] = 'Content Listing';
		$data['password'] = '';	
		$data['pageName'] = 'content';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['cscec_id'] = $pId;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content", "csc_id = " . $Id, 0, 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content", "cscec_id = " . $pId, 0, 0);
		$this->load->view('user/content', $data);
	}
	
	
	public function delete($agentId, $URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'cscec_id', 'course_section_content')){
			header("Location: http://localhost/can/user/content/cid/" . $URL);
			//redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add($pid){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Content Listing';
		$data['Message'] = '';
		$data['heading'] = 'Content Listing';
		$data['password'] = '';	
		$data['pageName'] = 'content';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['order'] = $this->input->post('order');
			$data['type'] = $this->input->post('type');
			$data['cscec_id'] = $pid;
			$data['description'] = $this->input->post('description');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('cscec_id', 'cscec_id', 'trim|required');
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
					$DbFieldsAry = array('title', 'order', 'cscec_id', 'type', 'description');
					$InfoAry = array($data['title'], $data['order'], $data['cscec_id'], $data['type'], $data['description']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "course_section_content")){
					
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/content/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/content/cid/'.$pid, 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/content/cid/'.$pid, 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/content/cid/'.$pid, 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $pid = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Content Listing';
		$data['Message'] = '';
		$data['heading'] = 'Content Listing';
		$data['password'] = '';	
		$data['pageName'] = 'content';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			echo $data['title'] = $this->input->post('title');	
			echo $data['order'] = $this->input->post('order');
			echo $data['cscec_id'] = $this->input->post('cscec_id');
			echo $data['type'] = $this->input->post('type');
			echo $data['description'] = $this->input->post('description');
			
			
			
			
			/*$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('cscec_id', 'cscec_id', 'trim|required');
			$this->form_validation->set_rules('type', 'type', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');*/
			
						

			if($this->form_validation->run() !== TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$DbFieldsAry1 = array('title', 'order', 'cscec_id', 'type', 'description');
					$InfoAry1 = array($data['title'], $data['order'], $data['cscec_id'], $data['type'], $data['description']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'csc_id', $DbFieldsAry1, $InfoAry1, "course_section_content")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/content/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/content/cid/'.$pid, 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/content/cid/'.$pid, 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['QUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","`cscec_id` = " . $ID, 0, 0);
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("course_section_content","", 0, 0);
		
			$this->load->view('user/content', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */