<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model("m_functions","m_functions");
		$this->load->model("allfunction","cquery");
        $this->m_functions->login_control();
		if($this->session->userdata("user_id")!=1)
		{
			redirect(site_url("oath/logout"));
		}

    }


    public function index()
    {   $data["breadcrumb"]=array(
        array(
            "name"=>"Dashboard",
            "url"=>site_url("dashboard")
        )
    );
        $data["view_users"]=$this->cquery->sel_all_rec("user");
        $this->load->view('admin/dashboard', $data);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */