<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('school_model');

	}

	public function testt(){
		$this->data['students'] = $this->db->get('vw_students')->result_array();
		$this->load->view('includes/head',$this->data);
		$this->load->view('school/testtable');
		$this->load->view('includes/footer');
	}
	public function index()
	{
		redirect(site_url('school/students'));

	}

	public function students($page= 0)
	{
		$this->data['page_title'] =  $this->data['page_title']."-Students";
		$this->load->view('includes/head',$this->data);
		$this->load->view('school/students_view');
		$this->load->view('includes/footer');
	}

	public function studentColumns(){
		$columns = array(
		
			array (
		        'name' => 'fullname',
		        'title' => 'NAME',
		        'filterable' => true
		    ),
	
		    array (
		        'name' => 'username',
		        'title' => 'USERNAME',
		        'breakpoints' => 'xs sm',
		    ),
		    array (
		        'name' => 'batch_year',
		        'title' => 'BATCH',
		        // 'visible' => false
		    ),
		    array(
		    	'name'=> 'course_desc',
		    	'title' => 'COURSE',
		    	'breakpoints' => 'xs sm',
		    	
	    	),
	    	array(
	    		'name' => 'edit_link',
	    		'title'=>'',
	    		// 'visible' => false,
	    		'filterable' => false,
	    		'sortable' => true,
	    		'style' => array('text-align' => 'center')
	    		
    		)
		);

		header('Content-Type: application/json');
		echo json_encode($columns, JSON_UNESCAPED_SLASHES);
		 
	}

	public function getSchoolStudents(){
		$sql = "SELECT 
					*,
					concat(last_name, ', ', first_name, ', ', middle_name) AS fullname	
				FROM
				vw_students ";
		if(	$this->session->userdata('user_role') == R_SCHOOLADMIN)
		{
			$sql .= "WHERE school_id = '".$this->session->userdata('school_id')."'";
		}

		$sql .="		ORDER BY last_name asc, first_name asc ,middle_name asc";
		
		$q = $this->db->query($sql);
		$ctr = 0;
		$data = array();
		foreach($q->result_array() as $res)
		{
			$data[$ctr] = $res;
			$data[$ctr]['edit_link'] = '<a href="#" ><span class="glyphicon glyphicon-remove"></span></a> &nbsp; <a href="'.site_url('students/edit/'.iencode($res['profile_id']) ).'"><span class="glyphicon glyphicon-edit"></span></a>'; 
			$ctr++;
		}
		header('Content-Type: application/json');
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
	}


	public function add_student()
	{
		$this->data = [
			'page_title' =>  $this->data['page_title']." : Add Student",
			'courses' => $this->school_model->sch_courses()->result_array(),
			'pageCSS' => array('bootstrap-select'),
			'customJS' => array('school','bootstrap-select'),
			'years' => $this->school_model->sch_years()->result_array(),
		];
		// debug($this->data['years']);die();
		if( $this->input->post() ){
			if($this->_add_student_validation() !== FALSE){
				$this->_add_student($this->input->post());
			}
		}
		$this->data['course_form'] = $this->load->view('school/course_form_view',$this->data,TRUE);

		$this->load->view('includes/head',$this->data);
		$this->load->view('school/add_student_view');
		$this->load->view('includes/footer');
	}

	private function _add_student($post){
		// var_dump($this->input->post(''));
		if( $this->input->post('school_id') AND $this->input->post('school_id') != "" ) {
			$school_id = $this->input->post('school_id');
		}else{
			$school_id = $this->session->userdata('school_id');
		}

		$first_name = $post['first_name'];
		$last_name = $post['last_name'];
		$username = $this->create_username(strtolower($first_name),strtolower($last_name));
		$user_id = $this->add_yb_users($username,R_STUDENT);

		$data = array(
				'school_id' => $school_id,//hardcoded for testing only
				'batch_year' => $post['batch_year'],
				'first_name' => $first_name,
				'last_name' =>  $last_name,
				'middle_name' => $post['middle_name'],
				'birth_date' =>  mysql_date($post['birth_date']) ,
				'course_id' => $post['course_id'],
				'role_id' => R_STUDENT,
				'user_id' => $user_id,
				'email' => strtolower($post['email'])
 			);
		

		$this->db->insert('mt_students',input_prep($data));
		$student_id = $this->db->insert_id();
		$this->_yearbook_add($school_id,$post['batch_year']);
		
		$this->_upload_head_image($student_id);
		foreach($post['awards'] as $award){
			$data_awards = array(
				'award_description' => $award, 
				'student_id' => $student_id,
			);

			if(trim($award) != ""){
				$this->db->insert('lu_student_awards',input_prep($data_awards));	
			}
		}

		
		
		$this->msg_flash('Student <u>'.$data["last_name"].', '.$data["first_name"].'</u> successfully added.<br><b>Username: '.$username.'</b>');
		redirect(base_url('school/add_student'));
	}

	private function add_yb_users($username,$role)
	{
		$username = $username;
		$data = array(
			'username' => $username,
			'password' => md5($username),
			'user_role' => R_STUDENT
		);
		$this->db->insert('mt_users',$data);
		return $this->db->insert_id();
	}
	private function _upload_head_image($student_id)
	{	
		
		if (!isset($_FILES))return false;
		if( isset($_FILES)){
			
			$count = count($_FILES['userfile']['size']);
			// debug($count,true);
			$config = array(
	            // 'upload_path' => base_url('assets/_uploads/'),
		            'upload_path' => './assets/_uploads/profile_headers/',
		            'allowed_types' => 'gif|jpg|png|jpeg',
		            'max_size' => 2000,
		            'overwrite'  => FALSE,
		            'remove_spaces' =>  TRUE,
		        );
	        $this->load->library('upload',$config);
	        // echo $config['upload_path'];
			// $num_of_files = count($_FILES) ;
			// debug($this->input->post('userfile') );
			// debug($_FILES ,true);
			$uploading =true;
	        foreach($_FILES as $key=>$value) :
				for($s=0; $s<=$count-1; $s++) {
					
					$_FILES['userfile']['name'] =$value['name'][$s];
			        $_FILES['userfile']['type']  = $value['type'][$s];
			        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['userfile']['error']  = $value['error'][$s];
			        $_FILES['userfile']['size']  = $value['size'][$s];
			        echo $value['size'][$s];
			        debug($_FILES['userfile']);
			        if($this->upload->do_upload()){
			        	$pic_data = $this->upload->data();
			        	$data = [
			        		'student_id' => $student_id,
			        		'img' => $pic_data['file_name'],
			        	];
			        	$this->db->insert('lu_yb_images',$data);
			        	// die($this->db->insert_id());	
			        }else{
			        	
			        	$uploading = false;
			        	$this->db->where('user_id',$student_id);
			        	$this->db->limit(1);
			        	$this->db->delete('mt_students');
			        	$this->db->where('user_id',$student_id);
			        	$this->db->delete('mt_users');

			        }
				}
			endforeach;
			// if(!$uploading){
			// 	echo $this->session->set_flashdata('pop',$this->upload->display_errors());
			// 	// redirect(base_url())1
			// }

		}
	
	}

	private function _upload_validation()
	{

	}

	public function yearbook_create()
	{
		$this->data = [
			'page_title' =>  $this->data['page_title']." - Create",
		];
		$this->load->view('includes/head',$this->data);
		$this->load->view('school/yb_create');
		$this->load->view('includes/footer');
	}

	private function _yearbook_add($school_id,$year)
	{
		$this->db->where('schoolid_and_year',$school_id.$year);
		$q = $this->db->get('mt_yearbooks');
		if($q->num_rows() < 1){
			$data = array(
				'school_id' => $school_id,
				'school_year' => $year,
				'schoolid_and_year' => $school_id.$year,
				'created_by' => $this->session->userdata('user_id')
			);
			$this->db->insert('mt_yearbooks',$data);
		}
	}

	private function create_username($first_name,$last_name)
	{
		$fullname = trim($first_name).trim($last_name);
		$fullname = str_replace(' ', '-[', $fullname);
		$success = FALSE;
		$username = $fullname;
		$i = 1;
		do {
			$this->db->where('username',$username);
			$q = $this->db->get('mt_users');
			$res = $q->result_array();
			if($q->num_rows() < 1){
				$success == TRUE;
				return $username;
			}else{
				
				$username = $fullname.'_'.$i;
				$i++;
			}

		} while ( $success !== TRUE);



	}

	public function test()
	{
		$this->load->view('includes/head',$this->data);
		$this->load->view('test/fb_login');
		$this->load->view('includes/footer');
	}

	private function _add_student_validation(){
		if($this->input->post('email') != ''){
			$valid_email = 'valid_email' ;
		}else{
			$valid_email = "";
		}
		$config = array(
			  array(
		            'field' => 'first_name',
		            'label' =>  'first name',
		            'rules' => 'required|max_length[50]'
		        ),
		        array(
		            'field' => 'last_name',
		            'label' =>  'last name',
		            'rules' => 'required|max_length[50]'
		        ),
		        array(
		            'field' => 'middle_name',
		            'label' =>  'middle name',
		            'rules' => 'max_length[50]'
		        ),
		       
		        array(
		            'field' => 'birth_date',
		            'label' =>  'birth date',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'course_id',
		            'label' =>  'course',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'email',
		            'label' =>  'email',
		            'rules' =>$valid_email
		        ),
			);
		$this->form_validation->set_error_delimiters('<p class="text-bold text-danger">', '</p>');
		$this->form_validation->set_rules($config);
		// debug($this->form_validation->run(),true);
		return $this->form_validation->run();
		die();
	}


	public function edit()
	{	
		if($this->input->post('course_add'))
		{
			
		}
		$this->load->view('includes/head',$this->data);
		$this->load->view('school/course_form_view');
		$this->load->view('includes/footer');
	}

	public function course_add()
	{
		 if(!$this->input->is_ajax_request() ){
		 	// redirect(base_url());
		 	$this->data['success'] = false;
		 } 
		$result = $this->_course_add_validation();
		if($result)
		{	
			$data = [
				'course_code' => strtoupper($this->input->post('course_code')),
				'course_desc' => $this->input->post('course_desc'),
				'school_id' => $this->session->userdata('school_id')
			];
			$this->db->insert('mt_courses',input_prep($data));
			$courses = $this->school_model->sch_courses();
			$data['courses'] = $courses->result_array();
			$data['message'] = 'Success';
		}else{
			$data['message'] = validation_errors();
		}
		
		$data['success'] = $result;
		echo json_encode($data);

		
	}

	private function _course_add_validation(){
		if($this->input->post('email') != ''){
			$valid_email = 'valid_email' ;
		}else{
			$valid_email = "";
		}
		$config = array(
			 array(
	            'field' => 'course_code',
	            'label' =>  'course code',
	            'rules' => 'required|max_length[20]|alpha_space|unique_course_code'
	        ),
			array(
	            'field' => 'course_desc',
	            'label' =>  'course code',
	            'rules' => 'required|max_length[100]|alpha_space|unique_course_desc'
		    ),
		        
		);
		$this->form_validation->set_error_delimiters('<p class="text-left text-danger">', '</p>');
		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	
	}
}//end class
