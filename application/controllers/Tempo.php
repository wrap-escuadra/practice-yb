<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempo extends CI_Controller{

	function __construct(){
		parent:: __construct();
		
	}
	public function index()
	{
		redirect(site_url('tempo/login'));
		$this->load->view('includes/head',$this->data);
		$this->load->view('pages/career.php');
		$this->load->view('includes/footer');

	}

	public function login(){
		if($this->input->post()){
			if($this->input->post('username') == "admin" and $this->input->post('password') == "ybpassword" ){
				
				$this->session->set_userdata('tempo_logged_in',true);
				redirect(site_url('welcome'));
			}else{
				$msg = "Invalid username or password";
				$msg = '<div class="alert alert-danger alert-dismissable fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    '.$msg.'</div>';
				$this->session->set_flashdata('pop',$msg);

				redirect(site_url('tempo/login'));
			}
		}
		if($this->session->userdata('logged_in') == true){
			redirect(site_url('welcome')); 
		}
		$this->load->view('tempo/login_view');
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('tempo/login'));
	}
}
