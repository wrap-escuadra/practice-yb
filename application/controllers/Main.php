<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller{

	function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		$this->load->view('includes/head',$this->data);
		$this->load->view('main/index');
		$this->load->view('includes/footer');
	}
}
