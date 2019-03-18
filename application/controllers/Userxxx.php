<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

	function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		redirect(site_url('page/login'));

	}

	public function login(){
		$this->load->view('includes/head',$this->data);
		$this->load->view('admin/new_school_view');
		$this->load->view('includes/footer');
	}

	public function logout(){
		$this->load->view('includes/head',$this->data);
		$this->load->view('admin/new_school_view');
		$this->load->view('includes/footer');
	}
}
