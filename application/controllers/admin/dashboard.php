<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 
	 ////////////////// Static setting variabls //////////////  Step = 1
	 
		private $Table = 'user';
		private $sortBy = 'fname';
		private $sortType = 'asc';
		private $sortBySession = 'news_orderBy';       // If Sorting Needed
		private $sortTypeSession = 'news_orderType';  // If Sorting Needed
	
	////////////////// Static setting variabls //////////////
	
	///////////////////////////////////////////// Action Listing //////////////////////////////////////////////////////////////////////
	 
	public function index()   //   Step = 2
	{
		$data['pageTitle'] = $this->project_model->projectName().' :: Dashboard';
		$data['Message'] = '';	
		$data['heading'] = 'Dashboard';
		$data['pageName'] = 'dashboard';
		
		////////////////// Setting for pagination ////////////////////
		
		$config['total_rows'] = $this->allfunction->GetSelectedDate('user_id', $this->Table);
		
		$config['uri_segment'] = 3;
		$config['per_page'] = $this->session->userdata('recordsPerPage');
		$data['per_page'] = $this->session->userdata('recordsPerPage');

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['counter'] = $page;
		$data['page'] = $page;
		$data['chkCount'] = 0;
		
		////////////////// Setting for pagination ////////////////////
		
		
		
		////////////////// SetUp Query ////////////////////
		$sort = $this->getSort();		

		$data['QUERY'] = $this->allfunction->fetchAll($this->Table);
		//print_r($data['QUERY']);exit;
		//if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){
			//$data['QUERY'] = $this->general_model->getAllDataSingleArgumentSEARCH($this->searchString, $dbFieldsArray, $this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);
		//}
		////////////////// SetUp Query ////////////////////
		
		
		$this->load->view('admin/dashboard.php', $data);
	}	
	
	
	
	
	
	
	//////////////////// Get Sort ///////////////////    Step = 3
	private function getSort(){
		if((bool)($this->session->userdata($this->sortBySession)) == TRUE && (bool)($this->session->userdata($this->sortTypeSession)) == TRUE){
			$this->sortBy = $this->session->userdata($this->sortBySession);
			$this->sortType = $this->session->userdata($this->sortTypeSession);
		}
		$sort = array('by' => $this->sortBy, 'type' => $this->sortType);
		return $sort;
	}	
	//////////////////// Get Sort ///////////////////
	
	///////////////////////////////////////////// Action Listing //////////////////////////////////////////////////////////////////////
	
	
	///////////////////////////////////////////////// Action Delete ///////////////////////////////////////////////////////////////////
	
	/*public function delete($agentId = NULL, $page = NULL){
		if($agentId == NULL || $page == NULL){
			setMessage('error_message', 'Unable to delete news, something went wrong from your side. Please try again later with proper procedure!');
			redirect(base_url().'admin/news', 'refresh');
		}

		

		
			$imageName = $this->allfunction->GetSingleValue($agentId, 'user_id', 'picture', $this->Table);
			if($this->allfunction->DeleteData($agentId, 'user_id', $this->Table)){
				if($imageName != ''){removeImage($imageName); }	
				
												
				setMessage('success_message', 'news removed successfully!');
				redirect(base_url().'admin/news/p/'.$page, 'refresh');
			}
		else{			
			setMessage('error_message', 'Unable to delete news, something went wrong from your side. Please try again later with proper procedure!');
			redirect(base_url().'admin/news', 'refresh');
		}		
	}*/
	
		public function delete($agentId,$URL){//deleteAll($agentId){
		if($this->allfunction->DeleteData($agentId, 'user_id', $this->Table)){
			redirect(base_url().'admin/'.$URL, 'refresh');
		}	
	}
	
	///////////////////////////////////////////////// Action Delete ///////////////////////////////////////////////////////////////////
	
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		

		$data['pageTitle'] = $this->project_model->projectName().' :: management : Add User';
		$data['Message'] = '';	
		$data['heading'] = 'News: Add User';
		$data['pageName'] = 'Management';				
		$isValid = false;
		
		$data['fname'] = '';
		$data['lname'] = '';
		$data['email'] = '';
		$data['uname'] = '';
		$data['pass'] = '';
		$data['sex'] = '';
		$data['add'] = '';
		$data['phone'] = '';

		//if($this->input->post('save')){
			if (isset($_POST['save'])) {
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
											
											
			}			
			
			if($isValid){
				
				$agentId = $this->session->userdata('agentId');
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$DbFieldsAry = array('fname', 'lname', 'email','uname', 'pass', 'sex', 'phone', 'add');
				$InfoAry = array($data['fname'], $data['lname'],$data['email'], $data['uname'], $data['pass'],$data['sex'], $data['phone'], $data['add']);				

				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, $this->Table)){
					
					setMessage('error_message', 'You are registered successfully!');
					redirect(base_url().'admin/dashboard', 'refresh');
				}
				else{
					setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
					redirect(base_url().'admin/dashboard', 'refresh');	
				}	
			}
			else{
				$this->load->view('admin/dashboard', $data);
			}
		}
		else{
			$this->load->view('admin/dashboard', $data);
		}
	}
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */