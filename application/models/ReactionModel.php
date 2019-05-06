<?php

//reactions
// "1" => like
// "-1" => dislike 

class ReactionModel extends CI_Model{
    public function __construct(){
        $this->load->library("session");
        $this->load->model("UserModel");
        $this->load->database();
    }
    public function comment($movieId,$comment){
        if(!$this->UserModel->isLoggedIn()) return FALSE;
        $this->db->insert("comments",array(
            "userid"=>$this->session->id,
            "movieid"=>$movieId,
            "comment"=>$comment,
        ));
        if($this->db->affected_rows()>0)return TRUE;
    }
    public function reaction($movieId,$reaction){
        if(!$this->UserModel->isLoggedIn()) return FALSE;
        $this->db->insert("reactions",array(
            "userid"=>$this->session->id,
            "movieid"=>$movieId,
            "reaction"=>$reaction,
        ));
        if($this->db->affected_rows()>0)return TRUE;
    }
    public function getMovieComments($movieId){
        $this->db->select("users.username,users.pp_url,comments.comment");
        $this->db->from("comments");
        $this->db->join("users","comments.userid=users.id");
        $this->db->where("comments.movieid=$movieId");
        $result=$this->db->get()->result();
        return $result;
    }
    
    //Data girildikten sonra deneyerek yapılacak...

    // public function getMovieComments($movieId){
    //     $this->db->select("users.username,users.p_url,comments.comment");
    //     $this->db->from("reactions");
    //     $this->db->join("users","reactions.userid=users.id");
    //     $this->where("reactions.movieid=$movieId");
    //     $result=$this->db->get()->result();
    //     return $result;
    // }

}

?>