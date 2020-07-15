<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {



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

	 

	private $Table = 'category';

	

	private $sortBy = 'name';

	private $sortType = 'asc';

	private $sortBySession = 'products_orderBy';

	private $sortTypeSession = 'products_orderType';
	
	private $totalCourses = 0;
	

	private $SEARCH_SESSION = 'productsSEARCH_SESS';

	private $searchString = '';

	/************		Image Processing	******************/
	private $imagePath = '../btPublic/bt-uploads/';
	
	function __construct(){
		
		parent::__construct();
		
		//if(!$this->general_model->isModuleEnabled('products')){
//			redirect(base_url().'admin/dashboard', 'refresh');
//		}				
		
	}
	

	public function index()

	{

		$data['pageTitle'] = $this->project_model->projectName().' :: category';
		
		$data['Message'] = '';	

		$data['heading'] = 'Category';

		$data['pageName'] = 'Category';

		

		$config['base_url'] = base_url().'admin/category/p/';

		$config['total_rows'] = $this->general_model->getTotalDataSimple('id', $this->Table);

		

		$data['sessionSearch'] = $this->SEARCH_SESSION;

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){

			$data['sessionSearch'] = $this->SEARCH_SESSION;

			$this->searchString = $this->session->userdata($this->SEARCH_SESSION);

			$dbFieldsArray = array('name');

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

		$data['QUERY'] = $this->general_model->getAllDataSimple($this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){						

			$data['QUERY'] = $this->general_model->getAllDataSingleArgumentSEARCH($this->searchString, $dbFieldsArray, $this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		}

		

		$this->load->view('admin/category/categoryView', $data);

	}

	

	public function p(){

		

		$data['pageTitle'] = $this->project_model->projectName().' :: category';

		$data['Message'] = '';	

		$data['heading'] = 'category';

		$data['pageName'] = 'category';

		

		$config['base_url'] = base_url().'admin/category/p/';

		$config['total_rows'] = $this->general_model->getTotalDataSimple('ID', $this->Table);

		

		$data['sessionSearch'] = $this->SEARCH_SESSION;

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){

			$data['sessionSearch'] = $this->SEARCH_SESSION;

			$this->searchString = $this->session->userdata($this->SEARCH_SESSION);

			$dbFieldsArray = array('name');	

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

		$data['QUERY'] = $this->general_model->getAllDataSimple($this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		

		if((bool)($this->session->userdata($this->SEARCH_SESSION)) == TRUE){						

			$data['QUERY'] = $this->general_model->getAllDataSingleArgumentSEARCH($this->searchString, $dbFieldsArray, $this->Table, $config["per_page"], $page, $sort['by'], $sort['type']);

		}

		

		$this->load->view('admin/category/categoryView', $data);

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
			redirect(base_url().'admin/category', 'refresh');
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
		
		redirect(base_url().'admin/category','refresh');
	}	
	
	private function displayCourses($ID = 0){
		
		$courses = '<font color="#d20000">No course available! Please <a href="'.base_url().'admin/courses/add">add</a> courses first.</font>';
		
		if($this->general_model->displayCourses() != '0'){
			$courses = '';
			$QUERY = $this->general_model->displayCourses();
			$counter = 0;
			foreach($QUERY->result() as $row){	
				$counter++;
				
				$checked = '';
				
				if($this->isCourseAdded($ID, $row->ID)){ $checked = 'checked';}
				$courses.= '<div style="color:#666; height:25px; padding-left:2px;"><input type="checkbox" value="'.$row->ID.'" name="course'.$counter.'" id="course'.$counter.'"  '.$checked.'/> '.$row->name.'</div>';
			}
			$this->totalCourses = $counter;
		}
		
		return $courses;
	}
	
	private function isCourseAdded($instituteId, $courseId){
		
		$this->db->select('ID');
        $this->db->from('tbl_institute_courses');
		$this->db->where('courseId', $courseId);
		$this->db->where('instituteId', $instituteId);
		
        $resultSet = $this->db->get();
		
        if ($resultSet->num_rows > 0) {
			
            return true;	
        } 
		return false;        
	}
	
	public function add(){
		
		$data['pageTitle'] = $this->project_model->projectName().' :: Category : Add New Category';
		$data['Message'] = '';	
		$data['heading'] = 'Category: Add New Category';
		$data['pageName'] = 'category';
		
		$data['name'] = '';
		$data['category'] = '';
		$data['price'] = '';
		$data['image'] = '';
		$data['description'] = '';
		
		
		if((bool)($this->input->post('btnAddcategory')) == TRUE){
			
			$data['name'] = $this->input->post('name');
			$data['description'] = $this->input->post('description');
						
			$this->form_validation->set_rules('name', 'Product name', 'trim|required');

			initializeImageSettings();
			if ($this->upload->do_upload()){
				$img_data = array($this->upload->data());
				$image_name = $img_data[0]['file_name'];							
				resize_image($image_name, 'medium', 200, 140);
				resize_image($image_name, 'thumbs', 60, 60);
				
				//$agentId = $this->session->userdata('agentId');
				$Date = getCurrentDate();
				$Time = getCurrentTime();
				$DbFieldsAry = array('name', 'description', 'image', 'entry_date', 'status');
				$InfoAry = array($data['name'],$data['description'], $image_name, $Date, 'YES');				

				if($this->allfunction->AddInfo_Simple($DbFieldsAry, $InfoAry, $this->Table)){
					
					//$activityId = $this->general_model->getSingleValue($image_name, 'image', 'ID', $this->Table);					
					//$this->general_model->addAgentActivity($agentId, $this->Table, $activityId, 'added new Home Slider', $Date, $Time);
					setMessage('success_message', 'Category is added successfully!');
					redirect(base_url().'admin/category', 'refresh');
				}
				else{
					setMessage('error_message', 'Unable to perofrm this operation, please try again later!');
					redirect(base_url().'admin/category', 'refresh');	
				}
			}
			else{
				$this->load->view('admin/category/addcategoryView', $data);
			}
		}
		else{
			$this->load->view('admin/category/addcategoryView', $data);
		}
	}
			

	

	

	public function delete($agentId = NULL, $page = NULL){		

		if($agentId == NULL || $page == NULL){

			setMessage('error_message', 'Unable to delete Category, something went wrong from your side. Please try again later with proper procedure!');

			redirect(base_url().'admin/category', 'refresh');

		}

		

		if($this->general_model->getSingleValue($agentId, 'id', 'image', $this->Table)){

			$this->deleteInstitueImage($agentId);

			if($this->general_model->deleteData($agentId, 'id', $this->Table)){

				
				//$this->general_model->deleteData($agentId, 'instituteId', 'tbl_institute_courses');
				
				//$this->deleteInstitueImage($agentId);
				//$this->general_model->addAgentActivity($this->session->userdata('agentId'), $this->Table, $agentId, 'removed institute', getCurrentDate(), getCurrentTime());

								

				setMessage('success_message', 'Institute removed successfully!');

				redirect(base_url().'admin/category/p/'.$page, 'refresh');

			}

		}

		else{

			

			setMessage('error_message', 'Unable to delete category, something went wrong from your side. Please try again later with proper procedure!');

			redirect(base_url().'admin/category', 'refresh');

		}

		

	}

	
	public function getCurrentPicture($ID, $page){
		
		$counter = 0;
		$currentPictures = 'No picture available!';
		
		$this->db->select('*');
        $this->db->from('category');
		$this->db->where('id', $ID);
		$this->db->where('status', 'YES');
		
        $QUERY = $this->db->get();
		
		if($QUERY->num_rows > 0){
			
			$currentPictures = '';
			foreach($QUERY->result() as $row){	
				$counter++;				
				
				$currentPictures.= '<div style="float:left; margin:5px; 0px; width:170px; text-align:center;">
									<img src="'.base_url().'public/bt-uploads/thumbs/'.$row->image.'" /></div>';
			}  
		}
		
		return $currentPictures;
	}
	
	private function checkPictureStatus($ID, $instituteID, $page, $picture){
		
		$this->db->select('ID');
        $this->db->from('tbl_institute_pictures');
		$this->db->where('ID', $ID);
		$this->db->where('cover', 'YES');
		$this->db->where('status', 'YES');
		
        $QUERY = $this->db->get();
		
		if($QUERY->num_rows > 0){
			
			return '<img src="'.base_url().'btPublic/admin/images/selected.png" style="margin:5px;" title="This is set as cover image!">
					<a href="'.base_url().'admin/category/removePicture/'.$ID.'/'.$instituteID.'/'.$page.'/'.urlencode($picture).'/YES"><img src="'.base_url().'btPublic/admin/images/delete.png" style="margin:5px;"></a>
					';
		}
		
		return '<a href="'.base_url().'admin/category/changePictureStatus/'.$instituteID.'/'.$ID.'/'.$page.'" title="Click to set as cover image?"><img src="'.base_url().'btPublic/admin/images/not_selected.png" style="margin:5px;" title="Click to set as cover image?"></a>
				<a href="'.base_url().'admin/category/removePicture/'.$ID.'/'.$instituteID.'/'.$page.'/'.urlencode($picture).'/NO"><img src="'.base_url().'btPublic/admin/images/delete.png" style="margin:5px;"></a>
				';
	}
	
	public function changePictureStatus($instituteId = 0, $pictureId = 0, $page = 0){
		
		$updateDbFieldsAry = array('cover');
		$updateInfoAry = array('NO');											
		$this->general_model->updateInfo_Simple($instituteId, 'instituteID', $updateDbFieldsAry, $updateInfoAry, 'tbl_institute_pictures');
		
		$updateDbFieldsAry = array('cover');
		$updateInfoAry = array('YES');											
		$this->general_model->updateInfo_Simple($pictureId, 'ID', $updateDbFieldsAry, $updateInfoAry, 'tbl_institute_pictures');
		
		setMessage('success_message', 'Cover image changed!');
		redirect(base_url().'admin/category/update/'.$instituteId.'/'.$page, 'refresh');
	}
	
	private function deleteInstitueImage($instituteID){
		
		$this->db->select('*');
        $this->db->from('category');
		$this->db->where('id', $instituteID);
		$this->db->where('status', 'YES');
		
        $QUERY = $this->db->get();
		if($QUERY->num_rows >0){
			
			foreach($QUERY->result() as $row){	
				$picture = $row->image;
				if($this->general_model->deleteData($row->id, 'id', 'category')){
					if($picture != ''){removeImage($picture);}	
				}
			}
		}
	}
	
	public function update($ID = NULL, $page = NULL){				

		$data['pageTitle'] = $this->project_model->projectName().' :: Categories : Update Category';
		$data['Message'] = '';	
		$data['heading'] = 'Category: Update Category';
		$data['pageName'] = 'category';

		
		$data['page'] = $page;
		$data['ID'] = $ID;
			
		$DATA = $this->general_model->getSingleData_Simple($ID, 'id', $this->Table);						
		
		$data['currentPicture'] = $this->getCurrentPicture($ID, $page);

		if((bool)($this->input->post('btnUpdatecategory')) == TRUE){
						
			$data['name'] = $this->input->post('name');
			$image_name = $this->input->post('picture');
			$data['picture'] = $image_name;
			$data['description'] = $this->input->post('description');
						
			$this->form_validation->set_rules('name', 'Category name', 'trim|required');
			
			$Date = getCurrentDate();			

			if($this->form_validation->run() === TRUE){
				
				$isValid = true;
				if (!empty($_FILES['userfile']['name'])){
					
					initializeImageSettings();
					if ($this->upload->do_upload()){
						$img_data = array($this->upload->data());
						$image_name = $img_data[0]['file_name'];							
						resize_image($image_name, 'medium', 200, 140);
						resize_image($image_name, 'thumbs', 60, 60);
						
						if($data['picture'] != ''){removeImage($data['picture']);}
					}
					else{
						$error = array($this->upload->display_errors());
						$data['Message'] = $error[0];
						$isValid = false;				
					}	
				}																

				if($isValid){
				$DbFieldsAry = array('name', 'description', 'image');
				$InfoAry = array($data['name'], $data['description'], $image_name);
											
				$this->general_model->updateInfo_Simple($ID, 'id', $DbFieldsAry, $InfoAry, $this->Table);				
											
				setMessage('success_message', 'Category updated successfully!');
				redirect(base_url().'admin/category/p/'.$page, 'refresh');
				}
				else{
				$this->load->view('admin/category/editcategoryView', $data);
				}
			}
			else{
				$this->load->view('admin/category/editcategoryView', $data);
			}			
		}

		else{
			
			
			$data['name'] = $DATA->name;
			$data['description'] = $DATA->description;
			$data['picture'] = $DATA->image;
			
			$this->load->view('admin/category/editcategoryView', $data);
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
						$this->deleteAll($ID);												
						$this->deleteInstitueImage($ID);
					}

				}

				setMessage('success_message', 'Removed successfully!');

			break;

		}

		

		redirect(base_url().'admin/category/p/'.$page, 'refresh');

	}
		

	private function changeStatusALL($ID, $status){

				

		$updateDbFieldsAry = array('status');

		$updateInfoAry = array($status);

		$this->general_model->updateInfo_Simple($ID, 'id', $updateDbFieldsAry, $updateInfoAry, $this->Table);

		

		//$this->general_model->addAgentActivity($this->session->userdata('agentId'), $this->Table, $ID, 'changed status', getCurrentDate(), getCurrentTime());		

	}

	

	

	private function deleteAll($agentId){		

			

		if($this->general_model->deleteData($agentId, 'id', $this->Table)){

			

			//$this->general_model->addAgentActivity($this->session->userdata('agentId'), $this->Table, $agentId, 'removed category', getCurrentDate(), getCurrentTime());										

		}		

	}

	

	public function changeStatus($ID, $status, $page){

		

		if($ID == NULL || $status == NULL || $page == NULL){

			setMessage('error_message', 'Unable to change status, something went wrong from your side. Please try again later with proper procedure!');

			redirect(base_url().'admin/category', 'refresh');

		}

		

		if($status == 'YES'){

			$newStatus = 'NO';	

		}

		else{

			$newStatus = 'YES';

		}

		

		$updateDbFieldsAry = array('status');

		$updateInfoAry = array($newStatus);

		$this->general_model->updateInfo_Simple($ID, 'id', $updateDbFieldsAry, $updateInfoAry, $this->Table);

		

		//$this->general_model->addAgentActivity($this->session->userdata('agentId'), $this->Table, $ID, 'changed status', getCurrentDate(), getCurrentTime());

		

		redirect(base_url().'admin/category/p/'.$page,'refresh');

	}
	
	
	
	public function addPicture($ID = 0, $page = 0){
		
		initializeImageSettings();
		if ($this->upload->do_upload()){
			$img_data = array($this->upload->data());
			$image_name = $img_data[0]['file_name'];							
			resize_image($image_name, 'medium', 280, 233);
			resize_image($image_name, 'thumbs', 162, 130);
			
			$defaultStatus = 'YES';
			if($this->general_model->duplicateEntry('instituteID', $ID, 'tbl_institute_pictures')){
				$defaultStatus = 'NO';
			}
			
			$DbFieldsAry = array('instituteID', 'picture', 'date', 'cover', 'status');
			$InfoAry = array($ID, $image_name, getCurrentDate(), $defaultStatus, 'YES');				
												
			if($this->general_model->addInfo_Simple($DbFieldsAry, $InfoAry, 'tbl_institute_pictures')){
				setMessage('success_message', 'New picture added successfully!');
			}
			
			redirect(base_url().'admin/category/update/'.$ID.'/'.$page,'refresh');
		}
		else{
			$error = array($this->upload->display_errors());
			
			setMessage('error_message', $error[0]);
			redirect(base_url().'admin/category/update/'.$ID.'/'.$page,'refresh');				
		}	
	}
	
	
	public function removePicture($ID = 0, $institueId, $page = 0, $picture, $default){
		
		$picture = urldecode($picture);
		
		if($this->general_model->deleteData($ID, 'ID', 'tbl_institute_pictures')){
						
			if($picture != ''){removeImage($picture);}	
			setMessage('success_message', 'Picture removed successfully!');	
			
			if($default == 'YES'){
				$newID = $this->general_model->getSingleValue($institueId, 'instituteID', 'ID', 'tbl_institute_pictures');			
				if($newID > 0 ){
					
					$updateDbFieldsAry = array('cover');
					$updateInfoAry = array('YES');											
					$this->general_model->updateInfo_Simple($newID, 'ID', $updateDbFieldsAry, $updateInfoAry, 'tbl_institute_pictures');	
				}
			}
			
			redirect(base_url().'admin/category/update/'.$institueId.'/'.$page,'refresh');
			
		}
		else{
			
			setMessage('error_message', 'Unable to remove picture, please try again later!');		
			redirect(base_url().'admin/category/update/'.$institueId.'/'.$page,'refresh');	
		}
		
	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */