<?php

class UserController extends CI_Controller{
    public function index(){

    }

    public function login($user,$pass){
        $this->load->model("UserModel");
       print_r($this->UserModel->login($user,$pass));
       print($this->UserModel->getUserProfile(0)->username);
    }

    public function logout(){
        $this->load->model("UserModel");
        print($this->UserModel->getUserProfile(0)->username);
        print_r($this->UserModel->logout());
        print($this->UserModel->getUserProfile(0)->username);
    }
    
}


?>