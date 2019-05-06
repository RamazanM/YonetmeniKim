<?php
class MovieController extends CI_Controller{
    
    public function index(){
        $this->load->model("MovieModel");
        $this->load->view("header");
        $this->load->view("movie_view",array("data"=>$this->MovieModel->popularMovies()));

    }

    public function movie($movieID){
        $this->load->view("header");
        $this->load->model("MovieModel");
        $this->load->model("ReactionModel");
        $data=array(
            "movieData"=>$this->MovieModel->getSingleMovie($movieID),
            "comments"=>$this->ReactionModel->getMovieComments($movieID)
        );
        $this->load->view("movie_view",$data);
    }
    public function search($keyword,$page=1){
        $this->load->model("MovieModel");
        $this->load->view("movie_view",array("data"=>$this->MovieModel->searchMovies($keyword,$page)));

    }
   

}
?>