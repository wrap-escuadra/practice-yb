<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller{

	function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		$this->load->view('includes/head',$this->data);
		$this->load->view('pages/career.php');
		$this->load->view('includes/footer');

	}
}
