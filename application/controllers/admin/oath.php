<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oath extends CI_Controller {

    public function __construct(){
        parent::__construct();
    $this->load->model("allfunction","cquery");
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }
	
	public function front_end_login()
	{
		echo "here";
	}

    public function login(){
        $data["message"]="";
        if(isset($_POST["submit"])) {
            $data["user_name"] = $this->input->post("user_name");
            $data["user_password"] = $this->input->post("user_password");

            $this->form_validation->set_rules("user_name", "User Name", "required");
            $this->form_validation->set_rules("user_password", "Password", "required");
            $cd= array(
                "user_name"=> $data["user_name"],
                "user_password"=> $this->encrypt->decode($data["user_password"]));
            $d = $this->cquery->sel_spe_row_fields("users",$cd ,"user_id");


            if ($d) {
                $this->session->set_userdata("user_name", $data["user_name"]);
                $this->session->set_userdata("user_id", $d["user_id"]);
                $this->session->set_userdata("login",TRUE);
                redirect(site_url("dashboard"));
            } else {
                
                $data["message"]=$this->m_functions->code_sending("100", "Enter Valid User Name and Password");
            }
        }

        $this->load->view("admin/index", $data);

    }

    public function ajax_login(){
        $data["message"]="";
        if(isset($_POST["user_name"])) {
            $data["user_name"] = $this->input->post("user_name");
            $data["user_password"] = $this->input->post("user_password");

            $this->form_validation->set_rules("user_name", "User Name", "required");
            $this->form_validation->set_rules("user_password", "Password", "required");
            $cd= array(
                "user_name"=> $data["user_name"],
                "user_password"=> $data["user_password"]);
            $d = $this->m_common->sel_spe_row_fields("users",$cd ,"user_id");


            if ($d) {
                $this->session->set_userdata("user_name", $data["user_name"]);
                $this->session->set_userdata("user_id", $d["user_id"]);
                $this->session->set_userdata("login",TRUE);
            } else {
                echo "Invalid Inputs!";
//                $this->m_functions->code_sending("100", "Enter Valid User Name and Password");
            }
        }

//       echo '{ "message":"It is login page just", "code": "100" }';

    }

    public function global_config_lang(){
		
        $data["language"] = $this->input->post("language");
        $this->session->set_userdata("language", $data["language"]);
      
       
    }
	 public function global_config_cur(){
        $data["currency"] = $this->input->post("currency");
        $this->session->set_userdata("currency", $data["currency"]);
		if($data["currency"]=="dollar")
		$this->session->set_userdata("currency-logo", "$");
		else if($data["currency"]=="lira")
		$this->session->set_userdata("currency-logo", "<label class="."currency-logo".">&#8378;</label>");
       
    } 
    /**
     *
     * logout .
     */
    public function logout(){
        $this->session->unset_userdata("user_id", "");
        $this->session->unset_userdata("user_name", "");
        $this->session->unset_userdata("login", FALSE);
         session_start();
		unset($_SESSION["products"]);
        $this->session->sess_destroy();
        redirect(site_url("oath/login"));
    }

    public function user_logout(){
        $this->session->unset_userdata("user_id", "");
        $this->session->unset_userdata("user_name", "");
        $this->session->unset_userdata("login", FALSE);
		 session_start();
		unset($_SESSION["products"]);
        redirect(site_url());
    }

    public  function add_user_ajax(){

        if (isset($_POST["user_name"])) {

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
                echo $data["user_name"]."Added successfully";
                //json_encode($this->cfun->code_sending(200,"User \"".$data["user_name"]."\" Added successfully"));

            }
            else{
                echo "Invalid Inputs!";
                // json_encode($this->cfun->code_sending(100,"Validate User \"".$data["user_name"]."\" "));
            }


        } else{
            echo "Not Submitted!";
        }
//    echo "outside";
    }

public  function  forget_password($email){

    $dd=$this->m_common->sel_spe_rec("users","user_name",$email);
    if(isset($dd) && is_array($dd)) {
        foreach ($dd as $row){
            echo "User Email  :".$row["user_email"]."</br>";
            echo "User Password  :".$row["user_name"]."</br>";
            echo "User password  :".$row["user_password"]."</br>";
        }
    } else{
        echo "not valid email";
    }

    $this->email->from('shehbaz.bsee1395@outlook.com', 'Admin');
    $this->email->to("shehbaz.bsee1395@gmail.com");
//    $this->email->cc('another@another-example.com');
//    $this->email->bcc('them@their-example.com');

    $this->email->subject('Forget Password');
    $this->email->message('Testing the email class.');


    if ( ! $this->email->send())
    {
        echo "Failure";
    }
    else{
        echo "success";
    }

    echo $this->email->print_debugger();

}

//   testing  function

    public function logdata(){
         echo br(4);
        echo "new var dump";
        echo br(2);
        var_dump($this->session->all_userdata());
        echo br(4);
        echo "seperate user name";

        var_dump($this->session->userdata("user_id"));
        var_dump($this->session->userdata("user_name"));
        var_dump($this->session->userdata("login"));

        echo br(3);
        echo "<h1>session variables :</h1>";
        var_dump($_SESSION);
        echo br(3);
        echo "<h1>cookie variables</h1>";
       var_dump($this->input->cookie("ci23sess12"));
        echo br(2);
       var_dump($this->input->cookie("ci_session"));
        echo br(4);
        var_dump($this->input->cookie(true));
        echo br(3);
        var_dump($_COOKIE);
        echo br(3);
        echo "mathch ";
        echo $this->session->sess_match_useragent;
        echo br(3);
        echo "var dump";
        var_dump($this->session->sess_match_useragent);
        echo br(2);
        if(isset($this->session->sess_match_useragent)){
            echo "match working";
        }
        else{
            echo "matche is not working";
        }

    }

    public function  test(){
        echo "id" ;
         echo br(2);
        echo $this->m_common->sel_id("users",'user_name','asdf','user_id');


    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */