<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Question extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Question Listing';
		$data['Message'] = '';
		$data['heading'] = 'Question Listing';
		$data['password'] = '';	
		$data['pageName'] = 'question';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","",0,0);
		$data['cid'] = 1;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","qid = " . $data['cid'], 0, 0);
		
		$this->load->view('user/question', $data);
	}
	
	public function cid($cid)
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Question Listing';
		$data['Message'] = '';
		$data['heading'] = 'Question Listing';
		$data['password'] = '';	
		$data['pageName'] = 'question';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","",0,0);
		
		$data['qid'] = $cid;
		$data['cid'] = $cid;
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","qid = " . $data['cid'], 0, 0);
		
		$this->load->view('user/question', $data);
	}
	
	public function Edit($Id, $pId){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Question Listing';
		$data['Message'] = '';
		$data['heading'] = 'Question Listing';
		$data['password'] = '';	
		$data['pageName'] = 'question';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['qid'] = $pId;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question", "qqid = " . $Id, 0, 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question", "qid = " . $pId, 0, 0);
		$this->load->view('user/question', $data);
	}
	
	
	public function delete($agentId, $URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'qqid', 'tbl_quize_question')){
			header("Location: http://localhost/can/user/question/cid/" . $URL);
			//redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add($pid){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Question Listing';
		$data['Message'] = '';
		$data['heading'] = 'Question Listing';
		$data['password'] = '';	
		$data['pageName'] = 'question';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['order'] = $this->input->post('order');
			$data['qid'] = $pid;
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('qid', 'qid', 'trim|required');
			
	
				if($this->form_validation->run() === TRUE){
					
					$isValid = true;							
												
				}	
				//$isValid = true;		
				//echo $isValid;exit();
				if($isValid){
					
					//$agentId = $this->session->userdata('agentId');
					$Date = getCurrentDate();
					$Time = getCurrentTime();
					$DbFieldsAry = array('title', 'order', 'qid');
					$InfoAry = array($data['title'], $data['order'], $data['qid']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "tbl_quize_question")){
					
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/question/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/question/cid/'.$pid, 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/question/cid/'.$pid, 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/question/cid/'.$pid, 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $pid = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Question Listing';
		$data['Message'] = '';
		$data['heading'] = 'Question Listing';
		$data['password'] = '';	
		$data['pageName'] = 'question';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['title'] = $this->input->post('title');	
			$data['order'] = $this->input->post('order');
			$data['qid'] = $this->input->post('qid');
			
			
			
			
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('order', 'order', 'trim|required');
			$this->form_validation->set_rules('qid', 'qid', 'trim|required');
			
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$DbFieldsAry1 = array('title', 'order', 'qid');
					$InfoAry1 = array($data['title'], $data['order'], $data['qid']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'qqid', $DbFieldsAry1, $InfoAry1, "tbl_quize_question")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/question/cid/'.$pid, 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/question/cid/'.$pid, 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/question/cid/'.$pid, 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","`qqid` = " . $ID, 0, 0);
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_quize_question","", 0, 0);
		
			$this->load->view('user/question', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */