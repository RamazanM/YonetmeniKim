<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyController extends CI_Controller {
	public function index($yon_id)
	{
		$this->load->view('my_view');
	}
}
