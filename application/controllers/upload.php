<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Upload extends CI_Controller {
	public $path = "";
	

	
 
	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper(array('url', 'form'));
	}
	 
	public function index()
	{	
	     $this->load->view('compaign_file');
	}
	 
	public function uploadify1()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
	
		 $path_Adword_Email = $this->createdir("./public/images/uploads/".$session_user_data["Adword_Email"]);
		 $path_Email = $this->createdir("./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]);
		 $path_Today = $this->createdir("./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')));

		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*'; 
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep1"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Text_Ad_Report_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'Text_Ad_Report_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}
		//$response .= date('d-m-Y-H-i-sa', strtotime('today'));
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function uploadify2()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
		
		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		//print_r($config);
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep2"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Compaign_Report_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'Compaign_Report_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}
		//$response["file_name"];
		//$response .= $config['upload_path'];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function uploadify3()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
		
		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep3"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('User_Location_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'User_Location_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function uploadify4()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
		
		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep4"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Keyword_Report_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'Keyword_Report_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function uploadify5()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
		
		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep5"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Search_Term_Report_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'Search_Term_Report_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function uploadify6()
	{
		$session_user_data = $this->session->userdata('user_temp_acct_data');
		
		$config['upload_path'] =  "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today'));
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		
		$this->upload->initialize($config);
		
		$this->load->library('upload', $config);
		 
		if (!$this->upload->do_upload("rep6"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$user_data1 = $this->session->userdata('user_temp_acct_data');
			$user_data2 = array('Monthly_Report_Path' => "./public/images/uploads/".$session_user_data["Adword_Email"]."/".$session_user_data["Email"]."/".date('d-m-Y--h-i-sa', strtotime('today')),'Monthly_Report_Name' => $response["file_name"]);
			$user_temp_acct_data = array_merge($user_data1, $user_data2);
			
			$sdata = array('user_temp_acct_data' => $user_temp_acct_data);
			$this->session->set_userdata($sdata);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function createdir($mkdir)
	{
		//$report_date = date('d-m-Y H:m:s', strtotime('today'));
		$data_dir = $mkdir;
        if(!file_exists($data_dir)){
                if(!mkdir($data_dir)){
                        echo "\n Failed to create dir $report_date...";
                        exit();
                }else{
                        echo "\n dir $report_date create under data";
                }
        }
	}
}
 
/* End of file uploadify.php */
/* Location: ./application/controllers/uploadify.php */