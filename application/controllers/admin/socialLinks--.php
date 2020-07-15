<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class SocialLinks extends CI_Controller {



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
		
		/*if(!$this->general_model->isModuleEnabled('socialLinks')){
			redirect(base_url().'admin/dashboard', 'refresh');
		}*/
	}
		
	public function index()

	{

		$data['pageTitle'] = $this->project_model->projectName().' :: Social Links';		

		$data['heading'] = 'Social Links:';

		$data['pageName'] = 'socialLinks';

		

		$DATA_INFO = $this->allfunction->Get_single_tabel_row('socialpages');

		if((bool)($DATA_INFO) == TRUE){
			$data['ID'] = $DATA_INFO->id;
			
			$data['facebookLink']	= $DATA_INFO->facebook;
			$data['twitterLink'] 	= $DATA_INFO->twitter;
			$data['linkedinLink'] 	= $DATA_INFO->linkedin;
			$data['googleplus'] 	= $DATA_INFO->googleplus;
			$data['youtube'] 		= $DATA_INFO->youtube;
			$data['yahoo'] 			= $DATA_INFO->yahoo;
			$data['flicker'] 		= $DATA_INFO->flicker;
		}

		

		$this->load->view('admin/socialLinks/socialNetworkingLinksView', $data);

	}			

	

	public function updateInfoBasic($ID){
																
		$dbFieldsAry = array('facebook', 'twitter', 'linkedin', 'googleplus', 'youtube', 'yahoo', 'flicker');

		$infoAry = array($this->input->post('facebookLink'), $this->input->post('twitterLink'), $this->input->post('linkedinLink'), $this->input->post('googleplus'), $this->input->post('youtube'), $this->input->post('yahoo'), $this->input->post('flicker'));
		

		if($this->allfunction->updateInfo_Simple($ID, 'id', $dbFieldsAry, $infoAry, 'socialpages')){										
			setMessage('success_message', 'Social links updated successfully!');			
			redirect(base_url().'admin/socialLinks', 'refresh');	
		}
		else{				
			setMessage('error_message', 'Unable to update social link, please try again later!');			
			redirect(base_url().'admin/socialLinks', 'refresh');	
		}

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */