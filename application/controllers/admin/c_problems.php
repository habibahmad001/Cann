<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_problems extends CI_Controller {


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

        $data["view_cats"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
        $this->load->view('knowledge_bank/view_cat',$data);
    }

    /**
     * @param mixed $data
     * default function of this class
     */
    public function view_pr($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_pr")
            )
        );
        $data["view_qa"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
        $this->load->view('knowledge_bank/view_pr',$data);
    }
	


    /**
     * add question in the db. page will be loaded
     */
    public function add_pr(){
        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_pr")
            )
        );

        if (isset($_POST["submit"])) {

            $data["threshold_value"] = $this->input->post("threshold_value");
            $data["qsg_prob_title"] = $this->input->post("qsg_prob_title");
            $data["report_title"] = trim($this->input->post("report_title"));
			$data["releated_questions"] = $this->input->post("releated_questions");
            $ins_data = array(
                "threshold_value" => $data["threshold_value"],
                "qsg_prob_title" => $data["qsg_prob_title"],
                "report_title" => $data["report_title"]
            );
			
            $faq_id=$this->cquery->ins_rec("tbl_qsg_problems", $ins_data);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
			
			
			if(count($data["releated_questions"]) > 0)
			foreach($data["releated_questions"] as $rows)
			{
				$ins_data1 = array(
					"kb_id" => $faq_id,
					"qsg_prob_id" => $rows
				);
				
					$faq_id=$this->cquery->ins_rec("tbl_qsg_solutions", $ins_data1);
					unset($ins_data1);
			}
			
            $data["message"] = $this->cfun->code_sending(200, "Question : \"" . $data["report_title"]."\" have been added successfully");


        } else{


        }
        $this->load->view("knowledge_bank/add_pr", $data);

    }




    public function del_pr($id)
    {
        if ($this->cquery->DeleteData( $id, "qsg_prob_id", "tbl_qsg_problems" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_qa($data);
    }


    public function edit_pr($id){


        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_pr")
            )
        );

        if (isset($_POST["submit"])) {
			$data["threshold_value"] = $this->input->post("threshold_value");
            $data["qsg_prob_title"] = $this->input->post("qsg_prob_title");
            $data["report_title"] = trim($this->input->post("report_title"));
			$data["releated_questions"] = $this->input->post("releated_questions");
            $ins_data = array(
                "threshold_value" => $data["threshold_value"],
                "qsg_prob_title" => $data["qsg_prob_title"],
                "report_title" => $data["report_title"]
            );
			
			if(count($data["releated_questions"]) > 0)
			foreach($data["releated_questions"] as $rows)
			{
				$ins_data1 = array(
					"kb_id" => $id,
					"qsg_prob_id" => $rows
				);
				
					$faq_id=$this->cquery->ins_rec("tbl_qsg_solutions", $ins_data1);
					unset($ins_data1);
				
			}
			
			
            $this->cquery->upd_rec("tbl_qsg_problems","qsg_prob_id",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_qsg_problems","qsg_prob_id",$id);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_qsg_problems");
        }
        $this->load->view("knowledge_bank/edit_pr", $data);

    }
}