<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yearbook extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('school_model');

	}

	public function index(){
		$this->data = [
			'page_title' =>  $this->data['page_title'],
			'yearbooks' => array(),

		];

		$this->load->view('includes/head',$this->data);
		$this->load->view('school/students_view');
		$this->load->view('includes/footer');
	}

	public function creator()
	{
		$this->data = [
			'page_title' =>  $this->data['page_title']

		];



		$this->load->view('includes/head',$this->data);
		$this->load->view('school/students_view');
		$this->load->view('includes/footer');
	}

}

