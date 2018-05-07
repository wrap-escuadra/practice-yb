<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->data = array();
		$this->load->model('user_model');
	}
	public function index()
	{
		redirect(site_url('page/login'));

	}

	public function login(){
		if($this->session->userdata('logged_in') == TRUE){
			redirect(site_url());
		}
		$this->data = [ 'page_title' => 'Yearbook+'];
		if($this->input->post()){
			if($this->_login_validation() !== FALSE)
			{

				$this->_login_auth($this->input->post());
			}
		}
		$this->load->view('includes/raw_header',$this->data);
		// $this->load->view('pages/login_v');
		$this->load->view('pages/login_view');
		$this->load->view('includes/footer');
	}

	public function loginx(){
		if($this->session->userdata('logged_in') == TRUE){
			redirect(site_url());
		}
		$this->data = [ 'page_title' => 'Yearbook Plus'];
		if($this->input->post()){
			if($this->_login_validation() !== FALSE)
			{
				$this->_login_auth($this->input->post());
			}
		}
		$this->load->view('includes/head',$this->data);
		$this->load->view('pages/login_v');
		// $this->load->view('pages/login_view');
		$this->load->view('includes/footer');
	}

	private function _login_validation(){
		$config = array(
			  array(
		            'field' => 'username',
		            'label' =>  'username',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'password',
		            'label' =>  'password',
		            'rules' => 'required'
		        ),
		       
			);
		$this->form_validation->set_error_delimiters('<p class=" text-danger"><i class="glyphicon glyphicon-remove-sign"></i>  ', '</p>');
		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	}

	private function _login_auth($post)
	{
		$username = $post['username'];
		$this->db->where('username',$username);

		$sql = "SELECT * FROM mt_users WHERE UPPER(username) = '".strtoupper($username)."'";
		$q = $this->db->query($sql);
		$user = $q->row_array();
		$user_id = $user['user_id'];
		if($q->num_rows() > 0 )
		{
			if($user['password'] == md5($post['password']) ){
				$sess_data = array();
				switch ($user['user_role']){
					case R_SYSADMIN:
						
						break;
					case R_SCHOOLADMIN:
					case R_SCHOOLENCODER:	
						$faculty = $this->user_model->faculty_info($user['user_id'] ); 
						$sess_data += [
							'school_id' => $faculty['school_id'],
							'first_name' => $faculty['first_name'],
							'last_name' => $faculty['last_name'],
							'middle_name' => $faculty['middle_name'],
						];
						$redirect_url = 'school/';
						break;
					case R_STUDENT:
						$student = $this->user_model->student_info($user['user_id'] );
						$sess_data += [
							'student_id' => $student['profile_id']
						];
						break;
					
					default:
						$msg = '<span class="text-bold text-danger">Ooops something went wrong please try logging in again.</span>';
						$this->session->set_flashdata('pop', $msg);
						redirect(site_url());
						break;
				}
				
				$sess_data += [
					'username' => $user['username'],
					'logged_in' => TRUE,
					'user_role' => $user['user_role'],
					'user_id' => $user_id
				];
				
				
				$msg = '<span class="text-bold text-info">You have successfully logged in as '.$user['username'].'</span>';
				$this->session->set_userdata($sess_data);
				$this->session->set_flashdata('pop', $msg);
				
				if(isset($redirect_url)){
					redirect(base_url($redirect_url));
				}
				redirect(site_url());
			}else{
				//incorrect password
				$msg = '<span class="text-bold text-danger">Invalid password.</span>';
				$this->session->set_flashdata('pop', $msg);
				redirect(site_url('user/login'));
			}
		}else{
			//incorrect username
			$msg = '<span class="text-bold text-danger">Invalid username.</span>';
			$this->session->set_flashdata('pop', $msg);
			
			redirect(site_url('user/login'));
		}
		
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('user/login'));

	}
}
