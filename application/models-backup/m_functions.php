<?php

/**
 *
 * Class M_functions
 */
class M_functions extends CI_Model
{
    public function __construct()
    {

    }

    public function login_control(){
        $se_login=$this->session->userdata("login");
        $se_user_id=$this->session->userdata("user_id");
        $se_user_name=$this->session->userdata("user_name");
        if(    $se_login===FALSE
            && $se_user_id===FALSE
            && $se_user_name==FALSE
        ){
            redirect(site_url("admin/oath/login"));
        } else{

        }

    }
    /**
     * 100 => Error
     * 200 => Success
     * 300 => Warning
     *
     * @param $code
     * @param $message
     * @return array
     */
    public function code_sending($code, $message)
    {

        switch ($code) {
            case 100:
                $class = "error";
                $header = "Error";
                break;
            case 200:
                $class = "success";
                $header = "Success";
                break;
            case 300:
                $class = "warning";
                $header = "Warning";
                break;
            default;
                $class = "";
                $header = "";

        }

        return array(
            "code"=>$code,
            "msg_header"=>$header,
            "msg_class"=>$class,
            "msg_body"=>$message
        );
    }
}