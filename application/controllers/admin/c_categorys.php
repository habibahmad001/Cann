<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Categorys extends CI_Controller {


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
    public function view_cat($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categorys",
                "url"=>site_url("c_categorys/view_cat")
            )
        );
        $data["view_cat"] = $this->cquery->sel_all_rec("course_categories");
        $this->load->view('categorys/view_cat',$data);
    }
	

    /**
     * add question in the db. page will be loaded
     */
    public function add_cat(){
        $data["a_categories"] = $this->cquery->sel_all_rec("course_categories");
		$data["all_auestion_data"] = $this->cquery->sel_all_rec("course_categories");
        $data["breadcrumb"] = array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories ADD",
                "url"=>site_url("c_categorys/add_cat")
            )
        );
		
		$data["list_courses"] = $this->cquery->sel_all_rec("course_categories");
		
        if (isset($_POST["submit"])) {

            $data["title"] = trim($this->input->post("title"));
            $data["description"] = trim($this->input->post("description"));
			$data["parent"] = trim($this->input->post("parent"));
			
            $ins_data = array(
                "parent_id"=> $data["parent"],
                "title" => $data["title"],
                "description" => $data["description"]
            );
			
            $faq_id = $this->cquery->ins_rec("course_categories", $ins_data);
			
            $data["message"] = $this->cfun->code_sending(200, $data["title"]."\" have been added successfully !!!");


        } else{


        }
        $this->load->view("categorys/add_cat", $data);

    }


    public function del_cat($id)
    {
        if ($this->cquery->DeleteData( $id, "ccid", "course_categories" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_cat($data);
    }
	
	public function select()
    {
		$response = "";
        $pid = trim($this->input->post("pid"));
		$res = $this->cquery->fetchAllDataWhere("course_categories", "parent_id = ".$pid, 0, 0);print_r($res);
		$response = '<br /><div class="controls"  id="paren-inner"><select name="parent" id="parent" class="input-xlarge focused">';
		foreach($res as $v) {echo $v["ccid"]."<br />";
		$respons .= '<option value="'.$v["ccid"].'">'.$v["title"].'</option>';
		}
		$response .= '</select></div>';
		
		//$response = $this->cquery->select_ajax($pid);
		
		//echo $response;
    }


    public function edit_cat($id){


        $data["a_categories"]=$this->cquery->sel_all_rec("course_categories");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("course_categories");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories Edit",
                "url"=>site_url("c_categorys/edit_cat")
            )
        );
		
		$data["list_courses"] = $this->cquery->sel_all_rec("course_categories");

        if (isset($_POST["submit"])) {

            $data["title"] = trim($this->input->post("title"));
            $data["description"] = trim($this->input->post("description"));
			$data["parent"] = trim($this->input->post("parent"));
			
            $ins_data = array(
                "parent_id"=> $data["parent"],
                "title" => $data["title"],
                "description" => $data["description"]
            );
			
            $this->cquery->upd_rec("course_categories","ccid",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("course_categories","ccid",$id);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("course_categories");
        }
        $this->load->view("categorys/edit_cat", $data);

    }
}