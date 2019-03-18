<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller{

	function __construct(){
		parent:: __construct();
		// debug($this->session->all_userdata());	
	}
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$this->load->view('includes/head',$this->data);
		}else{
			$this->load->view('includes/raw_header',$this->data);
		}		
		// $this->load->view('pages/home.php');
		$this->load->view('pages/new_home.php');
		$this->load->view('includes/footer');

	}
}
