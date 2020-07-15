<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: User Chat';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		$data['pageName'] = 'chat';	
		$data['QUERY2'] = '';
		$data['uid'] = '';
		$data['MESSAGEQUERY'] = '';
		////////////// Gernal Setting ///////////////////
		
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id != ".$this->session->userdata('agentId'),0,0);
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['MESSAGEQUERY'] = $this->project_model->checkunreadmessages("chat","`too` = ".$this->session->userdata('agentId')." and `status` = 1",0,4,"id","desc");

		$this->load->view('user/user_chat', $data);
	}
	
	public function showchat($ID)
	{//echo $ID; exit;
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Chat';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		$data['pageName'] = 'chat';
		$data['QUERY'] = '';
		$data['uid'] = '';
		$data['MESSAGEQUERY'] = '';	
		////////////// Gernal Setting ///////////////////
		
		$data['uid'] = $ID;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id != ".$this->session->userdata('agentId'),0,0);
		$data['QUERY2'] = $this->allfunction->fetchAllDataWhere("chat","(fromm=".$this->session->userdata('agentId')." and too=".$ID.") or (too=".$this->session->userdata('agentId')." and fromm=".$ID.")",0,0);
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['MESSAGEQUERY'] = $this->project_model->checkunreadmessages("chat","`too` = ".$this->session->userdata('agentId')." and `status` = 1",0,4,"id","desc");
		
		/*********************************** Update Status ********************/
		$updateDbFieldsAry = array('status');
		$updateInfoAry = array(2);
		$this->allfunction->updateInfo_All('(`fromm` = '.$ID.' and `too` = '.$this->session->userdata('agentId').")", $updateDbFieldsAry, $updateInfoAry, "chat");
		//UPDATE `adsens`.`chat` SET `message` = 'yyyyyyyyy' WHERE (`chat`.`fromm` =1 AND `chat`.`too` =2)
		/*********************************** Update Status ********************/
		
		$this->load->view('user/user_chat', $data);
	}
	
	public function add()
	{//echo $ID; exit;
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Chat';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		$data['pageName'] = 'chat';
		$data['QUERY'] = '';
		$data['MESSAGEQUERY'] = '';	
		$isValid = false;
		////////////// Gernal Setting ///////////////////
		
		$data['msgtxt'] = '';
		$data['uid'] = '';
		
		if (isset($_POST['send'])) {
			$data['msgtxt'] = $this->input->post('msgtxt');
			$data['uid'] = $this->input->post('uid');
			
			$this->form_validation->set_rules('msgtxt', 'textarea', 'trim|required');
			
			if($this->form_validation->run() === TRUE){
				$isValid = true;								
			}
			
			if($isValid){
				
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$datetime = date("Y-m-d H:i:s");
				
				$DbFieldsAry = array('fromm', 'too', 'message','sent', 'recd', 'status');
				$InfoAry = array($this->session->userdata('agentId'), $data['uid'],$data['msgtxt'], $datetime, "1", "1");
				//print_r($InfoAry);exit;
				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, 'chat')){
					
					//setMessage('error_message', 'You are registered successfully!');
					//redirect(base_url().'user/chat', 'refresh');
					$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id != ".$this->session->userdata('agentId'),0,0);
					$data['QUERY2'] = $this->allfunction->fetchAllDataWhere("chat","(fromm=".$this->session->userdata('agentId')." and too=".$data['uid'].") or (too=".$this->session->userdata('agentId')." and fromm=".$data['uid'].")",0,0);
					$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
					$data['MESSAGEQUERY'] = $this->project_model->checkunreadmessages("chat","`too` = ".$this->session->userdata('agentId')." and `status` = 1",0,4,"id","desc");
					
					$this->load->view('user/user_chat', $data);
				}
			}
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */