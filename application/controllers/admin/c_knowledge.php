<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_knowledge extends CI_Controller {


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

        $data["view_cats"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        $this->load->view('knowledge_bank/view_cat',$data);
    }

    /**
     * @param mixed $data
     * default function of this class
     */
    public function view_qa($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_qa")
            )
        );
        $data["view_qa"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        $this->load->view('knowledge_bank/view_qa',$data);
    }
	
	public function select_multiple( $data = "" )
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/select_multiple")
            )
        );
		$data["a_categories"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        $data["view_qa"] = $this->cquery->sel_all_rec("tbl_knowledge_bank");
        $this->load->view('knowledge_bank/select_multiple',$data);
    }

    /**
     * add question in the db. page will be loaded
     */
    public function add_qa(){
        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_qa")
            )
        );

        if (isset($_POST["submit"])) {

            $data["kb_title"] = trim($this->input->post("question_title"));
            $data["kb_desc"] = trim($this->input->post("question_answer"));
            $data["releated_questions"] = $this->input->post("releated_questions");
            $ins_data = array(
                //"category_id"=> $data["category_id"],
                "kb_title" => $data["kb_title"],
                "kb_desc" => $data["kb_desc"]
            );
			
            $faq_id=$this->cquery->ins_rec("tbl_knowledge_bank", $ins_data);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
			if(count($data["releated_questions"]) > 0)
			foreach($data["releated_questions"] as $rows)
			{
				$ins_data1 = array(
					"kb_id" => $faq_id,
					"kb_rel_id" => $rows
				);
				//$chkquery = $this->cquery->fetchAllDataWhere("tbl_knowledge_bank_related","`kb_id`=$id and `kb_rel_id`='".$rows."'",0,0);
				//echo "<pre>" . print_r($data["releated_questions"], true) . "</pre>";
				//if(count($chkquery) > 0)
				//{
					$faq_id=$this->cquery->ins_rec("tbl_knowledge_bank_related", $ins_data1);
					unset($ins_data1);
				//}
			}
			
            $data["message"] = $this->cfun->code_sending(200, "Question : \"" . $data["kb_title"]."\" have been added successfully");


        } else{


        }
        $this->load->view("knowledge_bank/add_qa", $data);

    }

   public function add_cat()
   {
       $data["breadcrumb"]=array(
           array(
               "name"=>"Dashboard",
               "url"=>site_url("dashboard")
           ),
           array(
               "name"=>"Categories",
               "url"=>site_url("c_faqs")
           )
       );
       if (isset($_POST["submit"])) {

           $data["category_name"] = trim($this->input->post("category_name"));
           $data["category_description"] = trim($this->input->post("category_description"));
           $this->form_validation->set_rules("category_name", "Category Name","required|is_unique[tbl_knowledge_bank.category_name]");
           if($this->form_validation->run()===TRUE) {
               $ins_data = array(
                   "category_name" => $data["category_name"],
                   "category_description" => $data["category_description"]
               );
               $this->cquery->ins_rec("tbl_knowledge_bank", $ins_data);
               $data["message"] = $this->cfun->code_sending(200, "Category \"" . $data["category_name"] . "\" has
               added successfully");
           } else{
               $data["message"] = $this->cfun->code_sending(100, "Validate the form");
           }

       }
       $this->load->view("knowledge_bank/add_cat", $data);
   }


    public function del_qa($id)
    {
        if ($this->cquery->DeleteData( $id, "kb_id", "tbl_knowledge_bank" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_qa($data);
    }

    public function del_cat($id){
        if($this->cquery->DeleteData( $id, "category_id", "tbl_knowledge_bank" ))
            $data["message"]=$this->cfun->code_sending(200,"Category having Id \"".$id."\" have been deleted
            successfully");
        $this->index($data);
    }

    public function edit_qa($id){


        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_knowledge_bank/view_qa")
            )
        );

        if (isset($_POST["submit"])) {

            $data["releated_questions"] = $this->input->post("releated_questions");
            $data["question_title"] = trim($this->input->post("question_title"));
            $data["question_answer"] = trim($this->input->post("question_answer"));
            $ins_data = array(
                //"category_id" => $data["category_id"],
                "kb_title" => $data["question_title"],
                "kb_desc" => $data["question_answer"]
            );
			//echo "<pre>" . print_r($data["releated_questions"], true) . "</pre>";
			foreach($data["releated_questions"] as $rows)
			{
				$ins_data1 = array(
					"kb_id" => $id,
					"kb_rel_id" => $rows
				);
				//$chkquery = $this->cquery->fetchAllDataWhere("tbl_knowledge_bank_related","`kb_id`=$id and `kb_rel_id`='".$rows."'",0,0);
				//echo "<pre>" . print_r($data["releated_questions"], true) . "</pre>";
				//if(count($chkquery) > 0)
				//{
					$faq_id=$this->cquery->ins_rec("tbl_knowledge_bank_related", $ins_data1);
					unset($ins_data1);
				//}
			}
			
            $this->cquery->upd_rec("tbl_knowledge_bank","kb_id",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_knowledge_bank","kb_id",$id);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("tbl_knowledge_bank");
        }
        $this->load->view("knowledge_bank/edit_qa", $data);

    }
    public function edit_cat($id){


        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories",
                "url"=>site_url("c_faqs")
            )
        );

        if (isset($_POST["submit"])) {
            $data["category_name"] = trim($this->input->post("category_name"));
            $data["category_description"] = trim($this->input->post("category_description"));
            $ins_data = array(
                "category_name" => $data["category_name"],
                "category_description" => $data["category_description"]
            );
            $this->cquery->upd_rec("tbl_knowledge_bank","category_id",$id,$ins_data);
            $data["message"] = $this->cfun->code_sending(200, "Category \"" . $data["category_name"] . "\" has
               updated successfully");
        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_knowledge_bank","category_id",$id);
        }
        $this->load->view("knowledge_bank/edit_cat", $data);
    }
}