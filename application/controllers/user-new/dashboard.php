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
	 
		private $Table = 'course';
		private $sortBy = 'course_id';
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
		
		$config['total_rows'] = $this->allfunction->GetSelectedDate('course_id', $this->Table);
		
		/////////////////// Set Session Array ////////////////
		$sessiondata = $this->session->userdata('default');
		/////////////////// Set Session Array ////////////////
		$config['uri_segment'] = 3;
		$config['per_page'] = $sessiondata['recordsPerPage'];
		$data['per_page'] = $sessiondata['recordsPerPage'];

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['counter'] = $page;
		$data['page'] = $page;
		$data['chkCount'] = 0;
		
		////////////////// Setting for pagination ////////////////////
		
		
		
		////////////////// SetUp Query ////////////////////
		$sort = $this->getSort();		

		$data['QUERY'] = $this->allfunction->GetAlldate($this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

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

		

		
			$imageName = $this->allfunction->GetSingleValue($agentId, 'id', 'picture', $this->Table);
			if($this->allfunction->DeleteData($agentId, 'id', $this->Table)){
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
		if($this->allfunction->DeleteData($agentId, 'id', $this->Table)){
			redirect(base_url().'admin/'.$URL, 'refresh');
		}	
	}
	
	///////////////////////////////////////////////// Action Delete ///////////////////////////////////////////////////////////////////
	
	
	///////////////////////////////////////////////// Action ADD ///////////////////////////////////////////////////////////////////
	public function add(){		

		$data['pageTitle'] = $this->project_model->projectName().' :: management : Add News';
		$data['Message'] = '';	
		$data['heading'] = 'News: Add Management';
		$data['pageName'] = 'Management';				
		$isValid = false;
		
		$data['name'] = '';
		$data['type'] = '';
		$data['status'] = '';

		//if($this->input->post('save')){
			if (isset($_POST['save'])) {
			$data['name'] = $this->input->post('name');	
			$data['type'] = $this->input->post('type');
			$data['status'] = $this->input->post('status');
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('type', 'type', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim|required');

			if($this->form_validation->run() === TRUE){
				
				$image_name = '';
				$isValid = true;
				/*if (!empty($_FILES['userfile']['name'])){
					
					initializeImageSettings();
					if ($this->upload->do_upload()){
						$img_data = array($this->upload->data());
						$image_name = $img_data[0]['file_name'];							
						resize_image($image_name, 'medium', 500, 500);
						resize_image($image_name, 'thumbs', 100, 70);
					}
					else{
						$error = array($this->upload->display_errors());
						$data['Message'] = $error[0];
						$isValid = false;				
					}	
				}*/								
											
			}			
			
			if($isValid){
				
				$agentId = $this->session->userdata('agentId');
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$DbFieldsAry = array('name', 'type', 'status');
				$InfoAry = array($data['name'], $data['type']);				

				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, $this->Table)){
					
					//$activityId = $this->general_model->getSingleValue($data['title'], 'title', 'ID', $this->Table);					
					//$this->general_model->addAgentActivity($agentId, $this->Table, $activityId, 'added new news', $Date, $Time);
					setMessage('success_message', 'News added successfully!');
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