<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_summery extends CI_Controller {


    public function __construct(){
        parent::__construct(); // if it is not called. then below model will not work.
        $this->load->model("allfunction","cquery");
        $this->load->model("m_functions","cfun");
        $this->m_functions->login_control();

    }

    /**
     * @param mixed $data
     * default function of this class
     */
    public function index($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories",
                "url"=>site_url("c_knowledge")
            )
        );

        $data["view_cats"]=$this->cquery->sel_all_rec("tbl_report_summary");
        $this->load->view('knowledge_bank/view_cat',$data);
    }

    /**
     * @param mixed $data
     * default function of this class
     */
    public function view_sum($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_sum")
            )
        );
        $data["view_qa"]=$this->cquery->sel_all_rec("tbl_report_summary");
        $this->load->view('knowledge_bank/view_sum',$data);
    }
	


    /**
     * add question in the db. page will be loaded
     */
    public function add_sum(){
        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_report_summary");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_sum")
            )
        );

        if (isset($_POST["submit"])) {

            $data["threshold_value"] = $this->input->post("threshold_value");
            $data["rs_title"] = $this->input->post("rs_title");
            $data["report_title"] = trim($this->input->post("report_title"));
            $ins_data = array(
                "threshold_value" => $data["threshold_value"],
                "rs_title" => $data["rs_title"],
                "report_title" => $data["report_title"]
            );
			
            $faq_id=$this->cquery->ins_rec("tbl_report_summary", $ins_data);
			
			
            $data["message"] = $this->cfun->code_sending(200, "Question : \"" . $data["report_title"]."\" have been added successfully");


        } else{


        }
        $this->load->view("knowledge_bank/add_sum", $data);

    }




    public function del_sum($id)
    {
        if ($this->cquery->DeleteData( $id, "rs_id", "tbl_report_summary" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_sum($data);
    }


    public function edit_sum($id){


        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_report_summary");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_sum")
            )
        );

        if (isset($_POST["submit"])) {
			$data["threshold_value"] = $this->input->post("threshold_value");
            $data["rs_title"] = $this->input->post("rs_title");
            $data["report_title"] = trim($this->input->post("report_title"));
            $ins_data = array(
                "threshold_value" => $data["threshold_value"],
                "rs_title" => $data["rs_title"],
                "report_title" => $data["report_title"]
            );
			
            $this->cquery->upd_rec("tbl_report_summary","rs_id",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_report_summary","rs_id",$id);
        }
        $this->load->view("knowledge_bank/edit_sum", $data);

    }
}