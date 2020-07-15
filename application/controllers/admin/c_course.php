<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_course extends CI_Controller {


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
                "name"=>"Courses",
                "url"=>site_url("c_course")
            )
        );

        $data["view_course"]=$this->cquery->sel_all_rec("course");
        $this->load->view('course/view_course',$data);
    }

    /**
     * @param mixed $data
     * default function of this class
     */
    public function view_course($data="")
    {
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categorys",
                "url"=>site_url("c_course/view_course")
            )
        );
        $data["view_course"] = $this->cquery->sel_all_rec("course");
        $this->load->view('course/view_course',$data);
    }
	

    /**
     * add question in the db. page will be loaded
     */
    public function add_course(){
        $data["a_courseegories"] = $this->cquery->sel_all_rec("course");
		$data["all_auestion_data"] = $this->cquery->sel_all_rec("course");
        $data["breadcrumb"] = array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories ADD",
                "url"=>site_url("c_course/add_course")
            )
        );
		
		$data["list_course"] = $this->cquery->sel_all_rec("course");
		
        if (isset($_POST["submit"])) {

            $data["title"] = trim($this->input->post("title"));
            $data["description"] = trim($this->input->post("description"));
			$data["sumary"] = trim($this->input->post("sumary"));
			$data["status"] = trim($this->input->post("status"));
			
            $ins_data = array(
                "status"=> $data["status"],
				"sumary"=> $data["sumary"],
                "title" => $data["title"],
                "description" => $data["description"]
            );
			
            $faq_id = $this->cquery->ins_rec("course", $ins_data);
			
            $data["message"] = $this->cfun->code_sending(200, $data["title"]."\" have been added successfully !!!");


        } else{


        }
        $this->load->view("course/add_course", $data);

    }


    public function del_course($id)
    {
        if ($this->cquery->DeleteData( $id, "course_id", "course" ))
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been deleted
            successfully");
        $this->view_course($data);
    }
	
	public function select()
    {
		$response = "";
        $pid = trim($this->input->post("pid"));
		$res = $this->cquery->fetchAllDataWhere("course", "parent_id = ".$pid, 0, 0);print_r($res);
		$response = '<br /><div class="controls"  id="paren-inner"><select name="parent" id="parent" class="input-xlarge focused">';
		foreach($res as $v) {echo $v["course_id"]."<br />";
		$respons .= '<option value="'.$v["course_id"].'">'.$v["title"].'</option>';
		}
		$response .= '</select></div>';
		
		//$response = $this->cquery->select_ajax($pid);
		
		//echo $response;
    }


    public function edit_course($id){


        $data["a_courseegories"]=$this->cquery->sel_all_rec("course");
		$data["all_auestion_data"]=$this->cquery->sel_all_rec("course");
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Categories Edit",
                "url"=>site_url("c_course/edit_course")
            )
        );
		
		$data["list_course"] = $this->cquery->sel_all_rec("course");

        if (isset($_POST["submit"])) {

            $data["title"] = trim($this->input->post("title"));
            $data["description"] = trim($this->input->post("description"));
			$data["sumary"] = trim($this->input->post("sumary"));
			$data["status"] = trim($this->input->post("status"));
			
            $ins_data = array(
                "status"=> $data["status"],
				"sumary"=> $data["sumary"],
                "title" => $data["title"],
                "description" => $data["description"]
            );
			
            $this->cquery->upd_rec("course","course_id",$id,$ins_data);
            $data["message"]=$this->cfun->code_sending(200,"Question having Id \"".$id."\" have been updated
            successfully");

        } else{
            $data["edit_data"]=$this->cquery->sel_spe_rec("course","course_id",$id);
			$data["all_auestion_data"]=$this->cquery->sel_all_rec("course");
        }
        $this->load->view("course/edit_course", $data);

    }
}