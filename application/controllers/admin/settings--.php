<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Settings extends CI_Controller {



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
	
	function __construct(){
		
		parent::__construct();
		
		/*if(!$this->general_model->isModuleEnabled('settings')){
			redirect(base_url().'admin/dashboard', 'refresh');
		}*/
	}
		
	public function index()

	{

		$data['pageTitle'] = $this->project_model->projectName().' :: Settings';		

		$data['heading'] = 'Manage Project General Settings:';

		$data['pageName'] = 'settings';

		

		$data['ID'] = 0;

		$data['projectNameAtBackend'] = 'Enter project name.';		

			

		$DATA_INFO = $this->allfunction->Get_single_tabel_row('users');

		if((bool)($DATA_INFO) == TRUE){
			$data['ID'] = $DATA_INFO->user_id;
			
			$data['projectNameAtBackend'] = $DATA_INFO->project;			
			$data['address'] = $DATA_INFO->address;
			$data['phone'] = $DATA_INFO->phone;
			$data['email'] = $DATA_INFO->email;
			//$data['fax'] = $DATA_INFO->fax;			
			//$data['links'] = $DATA_INFO->links;
			//$data['news'] = $DATA_INFO->news;
			//$data['content'] = $DATA_INFO->content;
			//$data['portfolio'] = $DATA_INFO->portfolio;			
			//$data['courses'] = $DATA_INFO->courses;
			//$data['students'] = $DATA_INFO->students;
			//$data['socialLinks'] = $DATA_INFO->socialLinks;
			//$data['newsLetters'] = $DATA_INFO->newsLetters;
			//$data['gallery'] = $DATA_INFO->gallery;
			//$data['agentsActivity'] = $DATA_INFO->agentsActivity;
			//$data['faqs'] = $DATA_INFO->faqs;
			//$data['testimonials'] = $DATA_INFO->testimonials;
		}

		

		$this->load->view('admin/settings/settingsView', $data);

	}

	

	

	public function updateModuleInfo($ID, $newValue, $oldValue){

		

		$DATA = $this->general_model->getSingleData_Simple_No_comparison('tbl_settings');

		

		if($DATA != '0'){

			

			$dbFieldsAry = array($ID);

			$infoAry = array($newValue);

			

			if($this->general_model->updateInfo_Simple($oldValue, $ID, $dbFieldsAry, $infoAry, 'tbl_settings')){

				

				if($newValue == 'YES'){

					setMessage('success_message', 'Another module activated for sub admins!');

				}

				else{

					setMessage('success_message', 'Module deactivated!');	

				}

				

			

				redirect(base_url().'admin/settings', 'refresh');		

			}

		}

		else{

			

			setMessage('error_message', 'You need to set project name before updating module section!');

			

			redirect(base_url().'admin/settings', 'refresh');

		}

	}

	

	public function updateInfoBasic(){

		

		$projectNameAtBackend = $this->input->post('projectNameAtBackend');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');

		$ID = $this->input->post('ID');

				

		if($projectNameAtBackend != '' && $projectNameAtBackend != 'Enter project name.'){
														
				$dbFieldsAry = array('project', 'address', 'phone', 'email');

				$infoAry = array($projectNameAtBackend, $address, $phone, $email);

				if($this->allfunction->updateInfo_Simple($ID, 'user_id', $dbFieldsAry, $infoAry, 'users')){										
					setMessage('success_message', 'Project info updated successfully!');			
					redirect(base_url().'admin/settings', 'refresh');	
				}
				else{				
					setMessage('error_message', 'Unable to add project name, please try again later!');			
					redirect(base_url().'admin/settings', 'refresh');	
				}
		}

		else{

			

			setMessage('error_message', 'you have not entered project name!');			

			redirect(base_url().'admin/settings', 'refresh');

		}

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */