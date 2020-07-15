<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invitation extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Invitation Listing';
		$data['Message'] = '';
		$data['heading'] = 'Invitation Listing';
		$data['password'] = '';	
		$data['pageName'] = 'Invitation';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////
		
		if( !isset($this->session->userdata['default']) )
		{
			redirect(base_url().'user/home', 'refersh');
		}
		//echo "<pre>" . print_r($this->session->userdata('default'), true) . "</pre>";exit;
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations","",0,0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations","`user_id` = ".$this->session->userdata['default']["userId"],0,0);
		
		$this->load->view('user/Invitation', $data);
	}
	
	public function Edit($Id){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Invitation Listing';
		$data['Message'] = '';
		$data['heading'] = 'Invitation Listing';
		$data['password'] = '';	
		$data['pageName'] = 'Invitation';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////
		
		$data['ID'] = $Id;
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations", "ci_id = ".$Id, 0 , 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations", "", 0, 0);

		$this->load->view('user/Invitation', $data);
	}
	
	public function send_invitation($Email){//deleteAll($agentId){
		
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Invitation Listing';
		$data['Message'] = '';
		$data['heading'] = 'Invitation Listing';
		$data['password'] = '';	
		$data['pageName'] = 'Invitation';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////
		
		$data['TO'] = base64_decode( urldecode( $Email ) );
		
		$subject = "Join Course Invitation !!! ";
		
		$msg = "Please Join This course.";
		
		$msg = wordwrap($msg,70);
		
		$message = " <table width='100%'>
		  <tr>
			<td>Hi,</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>".$msg."</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>Best Regards</td>
		  </tr>
		  <tr>
			<td>dinCloud</td>
		  </tr>
		</table>
		";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <noreply@gmail.com>' . "\r\n";
		
		
		// send email
		//echo $data['TO'].$subject.$message.$headers;exit;
		if(mail($data['TO'],$subject,$message,$headers))
		//echo "YES"; else echo "NO";
		
		//$data['QUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations", "ci_id = ".$Id, 0 , 0);
		$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations", "", 0, 0);

		redirect(base_url().'user/Invitation', 'refresh');
	}
	
	
	public function delete($agentId,$URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'ci_id', 'Invitation')){
			redirect(base_url().'user/'.$URL, 'refresh');
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		
	
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Invitation Listing';
		$data['Message'] = '';
		$data['heading'] = 'Invitation Listing';
		$data['password'] = '';	
		$data['pageName'] = 'Invitation';
		$data['QUERY'] = array();
		////////////// Gernal Setting ///////////////////

		
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['user_id'] = $this->session->userdata['default']["userId"];	
			$data['status'] = $this->input->post('status');
			$data['datetime'] = getCurrentDate() . " " . getCurrentTimesec();
			$data['email'] = $this->input->post('email');
			
			
			
			
			$this->form_validation->set_rules('email', 'email', 'trim|required');
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
					$DbFieldsAry = array('user_id', 'status', 'datetime', 'email');
					$InfoAry = array($data['user_id'], $data['status'], $data['datetime'], $data['email']);				
					
					if($ins_id = $this->allfunction->AddInfo_WithId($DbFieldsAry, $InfoAry, "tbl_course_invitations")){
						
						setMessage('error_message', 'Data Insert successfully!');
						redirect(base_url().'user/Invitation', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/Invitation', 'refresh');	
					}	
				}
				else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/Invitation', 'refresh');
				}
			}
			else{
				setMessage('error_message', 'Form is not submit successfuly!');
				redirect(base_url().'user/Invitation', 'refresh');
			}
		}
		
		///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
		
		
	
	public function update($ID = NULL, $page = NULL){		

		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: Invitation';
		$data['Message'] = '';
		$data['heading'] = 'Invitation';
		$data['password'] = '';	
		$data['pageName'] = 'profile';
		$data['QUERY'] = array();	
		////////////// Gernal Setting ///////////////////

		
		$data['ID'] = $this->session->userdata['default']['userId'];
		$isValid = false;

		if(isset($_POST["save"])){
			
			$data['user_id'] = $this->session->userdata['default']["userId"];	
			$data['status'] = $this->input->post('status');
			$data['datetime'] = getCurrentDate() . " " . getCurrentTimesec();
			$data['email'] = $this->input->post('email');
			
			
			
			
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim|required');
						

			if($this->form_validation->run() === TRUE){																
				
				$isValid = true;
				
				if($isValid){
					
					$updateDbFieldsAry = array('user_id', 'status', 'datetime', 'email');
					$updateInfoAry = array($data['user_id'], $data['status'], $data['datetime'], $data['email']);								
					
					if($this->allfunction->updateInfo_Simple($ID, 'ci_id', $updateDbFieldsAry, $updateInfoAry, "tbl_course_invitations")){
						setMessage('error_message', 'You are registered successfully!');
						redirect(base_url().'user/Invitation', 'refresh');
					}
					else{
						setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
						redirect(base_url().'user/Invitation', 'refresh');
					}
				}
			}
			else{
					setMessage('error_message', 'Please fill the (*) fields and try later');
					redirect(base_url().'user/Invitation', 'refresh');
				}
		}

		else{
			/*$DATA = $this->allfunction->getSingleData_Row($this->session->userdata('agentId'), 'id', "registration");
			
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('user/user_profile', $data);*/
			
			$data['AQUERY'] = $this->allfunction->fetchAllDataWhere("tbl_course_invitations","",0,0);
		
			$this->load->view('user/Invitation', $data);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */