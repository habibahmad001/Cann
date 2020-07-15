<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {



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

	 

	private $Table = 'news';
	private $sortBy = 'title';
	private $sortType = 'asc';
	private $sortBySession = 'news_orderBy';
	private $sortTypeSession = 'news_orderType';

	
	private $SEARCH_SESSION = 'newsSEARCH_SESS';
	private $searchString = '';

	/************		Image Processing	******************/
	private $imagePath = '../public/bt-uploads/';
	
	function __construct(){
		
		parent::__construct();
		
	}
	

	public function index()

	{

		$data['pageTitle'] = $this->project_model->projectName().' :: News';
		
		$data['Message'] = '';	

		$data['heading'] = 'News';

		$data['pageName'] = 'news';

		

		$config['base_url'] = base_url().'admin/news/p/';

		$config['total_rows'] = $this->allfunction->GetSelectedDate('id', $this->Table);

		

		$data['sessionSearch'] = $this->SEARCH_SESSION;

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){

			$data['sessionSearch'] = $this->SEARCH_SESSION;

			$this->searchString = $this->session->userdata($this->SEARCH_SESSION);

			$dbFieldsArray = array('title', 'description');

			$config['total_rows'] = $this->general_model->getTotalDataSingleArgumentSearch($this->searchString, $dbFieldsArray, 'ID', $this->Table);

		}

		

		$config['uri_segment'] = 3;

		$config['per_page'] = $this->session->userdata('recordsPerPage');

		$data['per_page'] = $this->session->userdata('recordsPerPage');

		$this->pagination->initialize($config);

		

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['counter'] = $page;

		$data['page'] = $page;

		$data['bgColor'] = '#f4f1f1';

		$data['chkCount'] = 0;		

		

		$sort = $this->getSort();		

		$data['QUERY'] = $this->allfunction->GetAlldate($this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){						

			$data['QUERY'] = $this->general_model->getAllDataSingleArgumentSEARCH($this->searchString, $dbFieldsArray, $this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		}

		

		$this->load->view('admin/news/newsView', $data);

	}

	

	public function p(){

		

		$data['pageTitle'] = $this->project_model->projectName().' :: news';

		$data['Message'] = '';	

		$data['heading'] = 'News';

		$data['pageName'] = 'news';

		

		$config['base_url'] = base_url().'admin/news/p/';

		$config['total_rows'] = $this->allfunction->GetSelectedDate('ID', $this->Table);

		

		$data['sessionSearch'] = $this->SEARCH_SESSION;

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){

			$data['sessionSearch'] = $this->SEARCH_SESSION;

			$this->searchString = $this->session->userdata($this->SEARCH_SESSION);

			$dbFieldsArray = array('title', 'description');			

			$config['total_rows'] = $this->general_model->getTotalDataSingleArgumentSearch($this->searchString, $dbFieldsArray, 'ID', $this->Table);

		}

				

		$config['uri_segment'] = 4;

		$config['per_page'] = $this->session->userdata('recordsPerPage');

		$data['per_page'] = $this->session->userdata('recordsPerPage');

		$this->pagination->initialize($config);

		

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['counter'] = $page;

		$data['page'] = $page;

		$data['bgColor'] = '#f4f1f1';

		$data['chkCount'] = 0;		

		

		$sort = $this->getSort();		

		$data['QUERY'] = $this->allfunction->GetAlldate($this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){						

			$data['QUERY'] = $this->general_model->getAllDataSingleArgumentSEARCH($this->searchString, $dbFieldsArray, $this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		}

		

		$this->load->view('admin/news/newsView', $data);

	}

	

	private function addSort($orderBy, $orderType){

		

		$data = array($this->sortBySession => $orderBy, $this->sortTypeSession => $orderType);

		

		$this->session->set_userdata($data);

		

		

	}

	

	private function getSort(){

				

		if((bool)($this->session->userdata($this->sortBySession)) == TRUE && (bool)($this->session->userdata($this->sortTypeSession)) == TRUE){

			

			$this->sortBy = $this->session->userdata($this->sortBySession);

			$this->sortType = $this->session->userdata($this->sortTypeSession);			

		}

		

		$sort = array('by' => $this->sortBy, 'type' => $this->sortType);

		return $sort;

		

		

	}

	

	public function Sort($sortBy = NULL){

	

		if($sortBy == NULL){

			setMessage('error_message', 'Unable to sort, something went wrong from your side. Please try again later with proper procedure!');

			redirect(base_url().'admin/news', 'refresh');

		}

			

		$currentSortType = $this->session->userdata($this->sortTypeSession);

		$currentSortBy = $this->session->userdata($this->sortBySession);

		

		if($currentSortBy != '' && $currentSortType != ''){

			

			if($currentSortType == 'asc'){

				$newSortType = 'desc';

			}

			else{

				$newSortType = 'asc';

			}

			

			if($currentSortBy != $sortBy){

				$newSortType = 'asc';

			}

		}

		else{

			

			$newSortType = 'desc';			

		}				

		

		$this->addSort($sortBy, $newSortType);

		

		redirect(base_url().'admin/news','refresh');

	}

	

	

	public function add(){		

		$data['pageTitle'] = $this->project_model->projectName().' :: news : Add News';
		$data['Message'] = '';	
		$data['heading'] = 'News: Add News';
		$data['pageName'] = 'news';				
		$isValid = false;
		
		$data['title'] = '';
		$data['description'] = '';
		$data['userfile'] = '';

		if((bool)($this->input->post('btnAddnews')) == TRUE){

			$data['title'] = $this->input->post('title');	
			$data['description'] = $this->input->post('description');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');

			if($this->form_validation->run() === TRUE){
				
				$image_name = '';
				$isValid = true;
				if (!empty($_FILES['userfile']['name'])){
					
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
				}								
											
			}			
			
			if($isValid){
				
				$agentId = $this->session->userdata('agentId');
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$DbFieldsAry = array('title', 'description', 'picture', 'date', 'status');
				$InfoAry = array($data['title'], $data['description'], $image_name, $Date, 'YES');				

				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, $this->Table)){
					
					//$activityId = $this->general_model->getSingleValue($data['title'], 'title', 'ID', $this->Table);					
					//$this->general_model->addAgentActivity($agentId, $this->Table, $activityId, 'added new news', $Date, $Time);
					setMessage('success_message', 'News added successfully!');
					redirect(base_url().'admin/news', 'refresh');
				}
				else{
					setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
					redirect(base_url().'admin/news', 'refresh');	
				}	
			}
			else{
				$this->load->view('admin/news/addnewsView', $data);
			}
		}
		else{
			$this->load->view('admin/news/addnewsView', $data);
		}
	}
			

	

	

	public function delete($agentId = NULL, $page = NULL){
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
	}

	

	

	public function update($ID = NULL, $page = NULL){		

		$data['pageTitle'] = $this->project_model->projectName().' :: news : Update News';
		$data['Message'] = '';	
		$data['heading'] = 'News: Update News';
		$data['pageName'] = 'news';

		$data['page'] = $page;
		$data['ID'] = $ID;
		$isValid = false;
		
		$DATA = $this->allfunction->getSingleData_Row($ID, 'id', $this->Table);

		if((bool)($this->input->post('btnUpdatenews')) == TRUE){
			
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');
			$data['picture'] = $this->input->post('picture');
			
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
						

			if($this->form_validation->run() === TRUE){																
				
				$image_name = $data['picture'];
				$isValid = true;
				if (!empty($_FILES['userfile']['name'])){
					
					initializeImageSettings();
					if ($this->upload->do_upload()){
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
				}
				
				if($isValid){
					$updateDbFieldsAry = array('title', 'description', 'picture');
					$updateInfoAry = array($data['title'], $data['description'], $image_name);								
					$this->allfunction->updateInfo_Simple($ID, 'id', $updateDbFieldsAry, $updateInfoAry, $this->Table);				
					
					setMessage('success_message', 'News updated successfully!');
					redirect(base_url().'admin/news/p/'.$page, 'refresh');
				}
				else{
					$this->load->view('admin/news/editnewsView', $data);
				}
			}
			else{
				$this->load->view('admin/news/editnewsView', $data);
			}
		}

		else{
			$data['title'] = $DATA->title;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->picture;
			$this->load->view('admin/news/editnewsView', $data);
		}
	}
	

	public function performAction($page){

		

		$action = $_POST['actionType'];				

		

		$totalRows = $_POST['counter_number'];

		

		switch($action){

			

			case 'activeAll':

				for($i=1; $i<=$totalRows; $i++){

					

					if((bool)($this->input->post('CB'.$i)) == TRUE){

						$ID = $this->input->post('CB'.$i);	

						$this->changeStatusALL($ID, 'YES');

					}

				}

				setMessage('success_message', 'Status updated successfully!');

			break;

			

			case 'inActiveAll':

				for($i=1; $i<=$totalRows; $i++){

					

					if((bool)($this->input->post('CB'.$i)) == TRUE){

						$ID = $this->input->post('CB'.$i);	

						$this->changeStatusALL($ID, 'NO');

					}

				}

				setMessage('success_message', 'Status updated successfully!');

			break;

			

			case 'deleteAll':

				for($i=1; $i<=$totalRows; $i++){

					

					if((bool)($this->input->post('CB'.$i)) == TRUE){

						$ID = $this->input->post('CB'.$i);	
						
						$imageName = $this->allfunction->GetSingleValue($ID, 'id', 'picture', $this->Table);
						
						$this->deleteAll($ID);
						
						if($imageName != ''){removeImage($imageName);}					
					}

				}

				setMessage('success_message', 'Removed successfully!');

			break;

		}

		

		redirect(base_url().'admin/news/p/'.$page, 'refresh');

	}

	

	

	private function changeStatusALL($ID, $status){

				

		$updateDbFieldsAry = array('status');

		$updateInfoAry = array($status);

		$this->allfunction->updateInfo_Simple($ID, 'id', $updateDbFieldsAry, $updateInfoAry, $this->Table);

		
	

	}

	

	

	private function deleteAll($agentId){		

			

		if($this->allfunction->DeleteData($agentId, 'id', $this->Table)){

			

												

		}		

	}

	

	public function changeStatus($ID, $status, $page){

		

		if($ID == NULL || $status == NULL || $page == NULL){

			setMessage('error_message', 'Unable to change status, something went wrong from your side. Please try again later with proper procedure!');

			redirect(base_url().'admin/news', 'refresh');

		}

		

		if($status == 'YES'){

			$newStatus = 'NO';	

		}

		else{

			$newStatus = 'YES';

		}

		

		$updateDbFieldsAry = array('status');

		$updateInfoAry = array($newStatus);

		$this->allfunction->updateInfo_Simple($ID, 'id', $updateDbFieldsAry, $updateInfoAry, $this->Table);

		
		

		redirect(base_url().'admin/news/p/'.$page,'refresh');

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */