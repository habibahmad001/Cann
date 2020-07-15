<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_faqs extends CI_Controller {


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
                "url"=>site_url("c_faqs")
            )
        );

        $data["view_cats"]=$this->cquery->sel_all_rec("tbl_faq_category");
        $this->load->view('faqs/view_cat',$data);
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
                "url"=>site_url("c_faqs/view_qa")
            )
        );
        $data["view_qa"]=$this->cquery->sel_all_rec("tbl_faq_questions");
        $this->load->view('faqs/view_qa',$data);
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
                "url"=>site_url("c_faqs/select_multiple")
            )
        );
		$data["a_categories"]=$this->cquery->sel_all_rec("tbl_faq_category");
        $data["view_qa"] = $this->cquery->sel_all_rec("tbl_faq_questions");
        $this->load->view('faqs/select_multiple',$data);
    }

    /**
     * add question in the db. page will be loaded
     */
    public function add_qa(){
        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_faq_category");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_faqs/view_qa")
            )
        );

        if (isset($_POST["submit"])) {

            $data["question_title"] = trim($this->input->post("question_title"));
            $data["question_answer"] = trim($this->input->post("question_answer"));
            $data["category_id"] = trim($this->input->post("category_id"));
            $ins_data = array(
                "category_id"=> $data["category_id"],
                "question_title" => $data["question_title"],
                "question_answer" => $data["question_answer"]
            );
            $faq_id=$this->cquery->ins_rec("tbl_faq_questions", $ins_data);


            $data["message"] = $this->cfun->code_sending(200, "Question : \"" . $data["question_title"]."\"
             have been added successfully");


        } else{


        }
        $this->load->view("faqs/add_qa", $data);

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
           $this->form_validation->set_rules("category_name", "Category Name","required|is_unique[tbl_faq_category.category_name]");
           if($this->form_validation->run()===TRUE) {
               $ins_data = array(
                   "category_name" => $data["category_name"],
                   "category_description" => $data["category_description"]
               );
               $this->cquery->ins_rec("tbl_faq_category", $ins_data);
               $data["message"] = $this->cfun->code_sending(200, "Category \"" . $data["category_name"] . "\" has
               added successfully");
           } else{
               $data["message"] = $this->cfun->code_sending(100, "Validate the form");
           }

       }
       $this->load->view("faqs/add_cat", $data);
   }


    public function del_qa($id)
    {
        if ($this->cquery->DeleteData( $id, "question_id", "tbl_faq_questions" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_qa($data);
    }

        public function del_cat($id){
        if($this->cquery->DeleteData( $id, "category_id", "tbl_faq_category" ))
            $data["message"]=$this->cfun->code_sending(200,"Category having Id \"".$id."\" have been deleted
            successfully");
        $this->index($data);
    }

    public function edit_qa($id){


        $data["a_categories"]=$this->cquery->sel_all_rec("tbl_faq_category");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Questions",
                "url"=>site_url("c_faqs/view_qa")
            )
        );

        if (isset($_POST["submit"])) {

            $data["category_id"] = trim($this->input->post("category_id"));
            $data["question_title"] = trim($this->input->post("question_title"));
            $data["question_answer"] = trim($this->input->post("question_answer"));
            $ins_data = array(
                "category_id" => $data["category_id"],
                "question_title" => $data["question_title"],
                "question_answer" => $data["question_answer"]
            );
            $this->cquery->upd_rec("tbl_faq_questions","question_id",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_faq_questions","question_id",$id);
        }
        $this->load->view("faqs/edit_qa", $data);

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
            $this->cquery->upd_rec("tbl_faq_category","category_id",$id,$ins_data);
            $data["message"] = $this->cfun->code_sending(200, "Category \"" . $data["category_name"] . "\" has
               updated successfully");
        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("tbl_faq_category","category_id",$id);
        }
        $this->load->view("faqs/edit_cat", $data);
    }
}