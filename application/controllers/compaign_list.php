<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compaign_list extends CI_Controller {

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
	 
		private $Table = 'login';
		//private $sortBy = 'fname';
		//private $sortType = 'asc';
		//private $sortBySession = 'news_orderBy';       // If Sorting Needed
		//private $sortTypeSession = 'news_orderType';  // If Sorting Needed
	
	////////////////// Static setting variabls //////////////
	
	
	public function index()
	{
		$data['pageTitle'] = $this->project_model->projectName().' :: Compaign List';
		$data['Message'] = '';	
		$data['heading'] = 'Home';
		$data['pageName'] = 'home';
		//$this->load->view('welcome_message');
		
		$this->load->view('compaign_list',$data);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */