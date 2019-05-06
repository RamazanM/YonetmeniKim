<?php

class UserModel extends CI_Model {
    public function __construct(){
        $this->load->library('session');
        //$this->load->library('database');
        $this->load->database();
    }

    public $messages=array(
        "successfullogin"=>"Başarıyla giriş yapıldı.",
        "successfullogout"=>"Başarıyla çıkış yapıldı.",
        "usernotfound"=>"Kullanıcı adına karşılık gelen profil bulunamadı. Doğru kullanıcı adı girdiğinize emin olun",
        "wrongpassword"=>"Girdiğiniz şifre yanlış. Yöneticiye ulaşın veya şifrenizi hatırlamaya çalışın.",
        "dberror"=>"Veritabanıyla alakalı bir sorun oluştu, en kısa sürede çözeceğiz...",
        "alreadylogged"=>"Zaten giriş yapmışsınız, farklı bir hesaba giriş için önce çıkış yapınız."
    );

    public function isLoggedIn(){
        return isset($this->session->logged_in)&&$this->session->logged_in;
    }


    public function login($user,$pass){
        if($this->isLoggedIn())return array(TRUE,$this->messages["alreadylogged"]);

        $this->db->select();
        $this->db->from("users");
        $this->db->where("username='$user' AND password='$pass'");
        $result=$this->db->get()->result();
        if(sizeof($result)>0){
            print_r($result);
            $userdata = array(
                "username"=>$result[0]->username,
                "pp_url"=>$result[0]->pp_url,   
                "logged_in"=>TRUE   
            );
            $this->session->set_userdata($userdata);
            return array(TRUE,$this->messages["successfullogin"]);

        }
        else return array(FALSE,$this->messages["usernotfound"]);


    }

    public function logout(){
        $this->session->unset_userdata(array('username','profilephoto'));
        $this->session->set_userdata("logged_in",FALSE);
        return array(TRUE,$this->messages["successfullogout"]); 
    }

    public function getUserProfile($userID){
        return $this->session;
    }
}

?>