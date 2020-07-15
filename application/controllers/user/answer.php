<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Answer extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Answer Listing';
		$data['Message'] = '';
		$data['heading'] = 'Answer Listing';
		$data['password'] = '';	
		$data['pageName'] = 'answer';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","",0,0);
		$data['cid'] = 1;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","qaid = " . $data['cid'], 0, 0);
		
		$this->load->view('user/answer', $data);
	}
	
	public function cid($cid)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Answer Listing';
		$data['Message'] = '';
		$data['heading'] = 'Answer Listing';
		$data['password'] = '';	
		$data['pageName'] = 'answer';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","",0,0);
		
		$data['qaid'] = $cid;
		$data['cid'] = $cid;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","qqid = " . $data['cid'], 0, 0);
		
		$this->load->view('user/answer', $data);
	}
	
	public function Edit($Id, $pId){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Answer Listing';
		$data['Message'] = '';
		$data['heading'] = 'Answer Listing';
		$data['password'] = '';	
		$data['pageName'] = 'answer';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['qaid'] = $pId;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option", "qaid = " . $Id, 0, 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option", "qaid = " . $pId, 0, 0);
		$this->load->view('user/answer', $data);
	}
	
	
	public function delete($agentId, $URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'qaid', 'tbl_quize_answer_option')){
			header("Location: http://localhost/can/user/answer/cid/" . $URL);
			//redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add($pid){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Answer Listing';
		$data['Message'] = '';
		$data['heading'] = 'Answer Listing';
		$data['password'] = '';	
		$data['pageName'] = 'answer';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');
			if(isset($_POST['is_answer']))
			$data['is_answer'] = $this->input->post('is_answer');
			else
			$data['is_answer'] = "FALSE";
			$data['qqid'] = $pid;
			echo $data['is_answer']; exit;
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('qqid', 'qqid', 'trim|required');
			//$this->form_validation->set_rules('is_answer', 'is_answer', 'trim|required');
			
	
				if($this->form_validation->run() === TRUE){
					
					$isValid = true;							
												
				}	
				//$isValid = true;		
				//echo $isValid;exit();
				if($isValid){
					
					//$agentId = $this->session->userdata('agentId');
					$Date = getCurrentDate();
					$Time = getCurrentTime();
					$DbFieldsAry = array('title', 'qqid', 'is_answer');
					$InfoAry = array($data['title'], $data['qqid'], $data['is_answer']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "tbl_quize_answer_option")){
					
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/answer/cid/'.$pid, 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $pid = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Answer Listing';
		$data['Message'] = '';
		$data['heading'] = 'Answer Listing';
		$data['password'] = '';	
		$data['pageName'] = 'answer';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');
			if(isset($_POST['is_answer']))
			$data['is_answer'] = $this->input->post('is_answer');
			else
			$data['is_answer'] = "FALSE";
			$data['qqid'] = $pid;
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('qqid', 'qqid', 'trim|required');
			//$this->form_validation->set_rules('is_answer', 'is_answer', 'trim|required');
			
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$DbFieldsAry = array('title', 'qqid', 'is_answer');
					$InfoAry = array($data['title'], $data['qqid'], $data['is_answer']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'qaid', $DbFieldsAry, $InfoAry, "tbl_quize_answer_option")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/answer/cid/'.$pid, 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","`qqid` = " . $ID, 0, 0);
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_answer_option","", 0, 0);
		
			$this->load->view('user/answer', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */