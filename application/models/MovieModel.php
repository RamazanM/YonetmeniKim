<?php
#4911090aa0d1931243b21d8643044239
class MovieModel extends CI_Model 
{


    private function curlIt($url){
        $request_headers = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $res=json_decode($data);
        curl_close($ch);
        return $res;
    }

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
    }

    public function getSingleMovie($movieID){
        $url="https://api.themoviedb.org/3/movie/".$movieID."?api_key=4911090aa0d1931243b21d8643044239&language=tr-TR";
        return $this->curlIt($url);
    }
    public function searchMovies($keyword,$page=1){
        $url="https://api.themoviedb.org/3/search/movie?api_key=4911090aa0d1931243b21d8643044239&language=tr-TR&query=".$keyword."&page=".$page."&include_adult=false";
        return $this->curlIt($url);
    }
    public function popularMovies(){
        $url="https://api.themoviedb.org/3/movie/popular?api_key=4911090aa0d1931243b21d8643044239&language=tr-TR&page=1";
        return $this->curlIt($url);
    }
}

?>