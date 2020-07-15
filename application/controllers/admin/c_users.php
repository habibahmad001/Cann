<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_users extends CI_Controller {


    public function __construct(){
        parent::__construct(); // if it is not called. then below model will not work.
        $this->m_functions->login_control();
        $this->load->model("allfunction","cquery");
        $this->load->model("m_functions","cfun");
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
                "name"=>"Users",
                "url"=>site_url("c_users")
            )
        );

        $data["view_users"]=$this->cquery->sel_all_rec("user");
        $this->load->view('admin/users/view_users',$data);
    }



    public function view_profile($id){
		$data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Users",
                "url"=>site_url("c_users")
            )
        );
		$data["view_users"]=$this->cquery->sel_spe_rec("users","user_id",$id);
        $this->load->view("users/profile",$data);
    }

    /**
     * add question in the db. page will be loaded
     */
    public function add_user(){
        $data["response"]="";
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Users",
                "url"=>site_url("c_users")
            ),
            array(
                "name"=>"Add User",
                "url"=>""
            )
        );

        if (isset($_POST["submit"])) {

            $data["user_name"] = trim($this->input->post("user_name"));
            $data["user_email"] = trim($this->input->post("user_email"));
            $data["user_password"] = trim($this->input->post("user_password"));
            $data["user_password2"] = trim($this->input->post("user_password2"));

            $this->form_validation->set_rules("user_name", "User Name", "required|is_unique[users.user_name]");
            $this->form_validation->set_rules("user_email", "User Email", "required|valid_email");
            $this->form_validation->set_rules("user_password", "User Password", "required|matches[user_password2]");
            if($this->form_validation->run() === TRUE) {
                $ins_data = array(
                    "user_name" => $data["user_name"],
                    "user_email" => $data["user_email"],
                    "user_password" => $data["user_password"]
                );
                $this->cquery->ins_rec("users", $ins_data);
                $data["message"]=$this->cfun->code_sending(200,"User \"".$data["user_name"]."\" Added successfully");

            }
            else{
                $data["message"]=$this->cfun->code_sending(100,"Validate User \"".$data["user_name"]."\" ");
            }


        }
        $this->load->view("users/add_user", $data);

    }




    public function del_user($id)
    {
        if ($this->cquery->DeleteData($id, "user_id", "user"))
            $data["message"]=$this->cfun->code_sending(200,"User having user id <b> ".$id."</b> has been deleted
            successfully");
        $this->index($data);
    }


    public function edit_user($id){

        $data["response"]="";
        $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Users",
                "url"=>site_url("admin/c_users")
            ),
			array(
                "name"=>"Edit User",
                "url"=>""
            )
        );

        if (isset($_POST["submit"])) {
            $data["user_name"] = trim($this->input->post("user_name"));

			$data["user_status"] = trim($this->input->post("status"));
            $data["user_email"] = trim($this->input->post("user_email"));
            $this->form_validation->set_rules("user_email", "User Email", "required|valid_email");
            //$this->form_validation->set_rules("user_password", "User Password", "required|matches[user_password2]");
            if($this->form_validation->run() === TRUE) {
                $ins_data = array(
                    "email" => $data["user_email"],
					"status" => $data["user_status"]
                );
                $this->cquery->upd_rec("user", "user_id", $id, $ins_data);
                $data["message"]=$this->cfun->code_sending(200,"User details updated successfully");
            } // end of form validation

        }
        else {
            $data["edit_user"] = $this->cquery->sel_spe_rec("user", "user_id", $id);

        }
        $this->load->view("admin/users/edit_user", $data);

    }
	
	public function details($id)
	{   $data["breadcrumb"]=array(
            array(
                "name"=>"Dashboard",
                "url"=>site_url("dashboard")
            ),
            array(
                "name"=>"Users",
                "url"=>site_url("c_users")
            ),
			array(
                "name"=>"User Details",
                "url"=>""
            )
        );
		$data["user"] = $this->m_common->sel_spe_rec("users","user_id",$id);
		$data["trans"] = $this->cquery->sel_spe_rec("tbl_transactions","trans_user", $id);
        $this->load->view("users/user_details", $data);
		
	}


}
