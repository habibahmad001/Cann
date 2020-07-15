<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compaign_file extends CI_Controller {

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
		$data['pageTitle'] = $this->project_model->projectName().' :: Add File Compaign';
		$data['Message'] = '';	
		$data['heading'] = 'Add File Compaign';
		$data['pageName'] = 'compaign_file';
		//$this->load->view('welcome_message');
		
		/*$session_user_data = $this->session->userdata('user_temp_acct_data');
		echo $session_user_data["Name"]."<br />";
		echo $session_user_data["Email"]."<br />";
		echo $session_user_data["Adword_Email"]."<br />";
		echo $session_user_data["Token"]."<br />";
		echo $session_user_data["apipass"]."<br />";
		echo $session_user_data["Text_Ad_Report_Path"]."<br />";
		echo $session_user_data["Text_Ad_Report_Name"]."<br />";
		echo $session_user_data["Compaign_Report_Path"]."<br />";
		echo $session_user_data["Compaign_Report_Name"]."<br />";
		echo $session_user_data["User_Location_Path"]."<br />";
		echo $session_user_data["User_Location_Name"]."<br />";
		echo $session_user_data["Keyword_Report_Path"]."<br />";
		echo $session_user_data["Keyword_Report_Name"]."<br />";
		echo $session_user_data["Search_Term_Report_Path"]."<br />";
		echo $session_user_data["Search_Term_Report_Name"]."<br />";
		echo $session_user_data["Monthly_Report_Path"]."<br />";
		echo $session_user_data["Monthly_Report_Name"];exit;*/
		
		
		$this->load->view('compaign_file',$data);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */