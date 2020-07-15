<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 
	 private $imagePath = '../public/bt-uploads/';
	 
	public function index()
	{
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Home';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';
		$data['MESSAGEQUERY'] = '';	
		////////////// Gernal Setting ///////////////////
		
		
		////////////// isUserLoggedin() Call Local Function ///////////////////
		if((bool) $this->isUserLoggedin() == false){
		
			redirect(base_url().'user', 'refersh');

		}
		////////////// isUserLoggedin() Call Local Function ///////////////////
		
		
		$data['MESSAGEQUERY'] = $this->project_model->checkunreadmessages("chat","`too` = ".$this->session->userdata('agentId')." and `status` = 1",0,4,"id","desc");
		$data['QUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		
		$this->load->view('user/home', $data);
	}
	
	
	public function user_image_upload() {
		////////////// Gernal Setting ///////////////////
		$data['pageTitle'] = $this->project_model->projectName().' :: User Home';
		$data['Message'] = '';
		$data['userName'] = '';
		$data['password'] = '';	
		////////////// Gernal Setting ///////////////////
		
		$data['picture'] = $this->input->post('img');
		
		$image_name = $data['picture'];
		//echo $_FILES['img']['name'];exit();
		$isValid = true;
		if (!empty($_FILES['img']['name'])){
			
			initializeImageSettings();
			if ($this->upload->do_upload('img')){
				$img_data = array($this->upload->data());
				$image_name = $img_data[0]['file_name'];							
				resize_image($image_name, 'medium', 500, 500);
				resize_image($image_name, 'thumbs', 100, 70);
				
				if($data['picture'] != ''){removeImage($data['picture']);}
			}
			else{
				$error = array($this->upload->display_errors());
				$data['Message'] = $error[0];
				$isValid = false;				
			}
		
		$data['USERQUERY'] = $this->allfunction->fetchAllDataWhere("registration","id = ".$this->session->userdata('agentId'),0,0);
		if($isValid){
			$updateDbFieldsAry = array('picture');
			$updateInfoAry = array($image_name);								
			$this->allfunction->updateInfo_Simple($this->session->userdata('agentId'), 'id', $updateDbFieldsAry, $updateInfoAry, "registration");				
			
			setMessage('success_message', 'Successfully Uploaded!');
			redirect(base_url().'user/home', 'refresh');
		}
		
		$this->load->view('user/home', $data);
	}
	}
	////////////// Function Check Login ///////////////////
	private function isUserLoggedin(){


		////////////// Check If Login ///////////////////
		if((bool)($this->session->userdata('userName')) == TRUE && (bool)($this->session->userdata('pass')) == TRUE){
					
			////////////// Get Session Info ///////////////////		
			$userName = $this->session->userdata('userName');
			$password = $this->session->userdata('pass');
	        ////////////// Get Session Info ///////////////////
			
	
			////////////// DB Query Get user Info ///////////////////
			$dbInfo = $this->allfunction->getSingleData_Row($userName, 'uname', 'registration');
			////////////// DB Query Get user Info ///////////////////
	
					
	
			if($dbInfo->pass == $password && $userName == $dbInfo->uname){
	
	
				return true;
	
			}
		}
		
		////////////// Check If Login ///////////////////
		
		
		////////////// Other Wise ///////////////////
		return false;
		////////////// Other Wise ///////////////////
		

	}
	////////////// Function Check Login ///////////////////
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */