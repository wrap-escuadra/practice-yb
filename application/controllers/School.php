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
		        'name' => 'school_year',
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
	    		'sortable' => false,
	    		'style' => array('text-align' => 'center')
	    		
    		),
    		array(
	    		'name' => 'default_pw',
	    		'title'=>'PASSWORD',
	    		// 'visible' => false,
	    		'filterable' => false,
	    		'sortable' => false,
	    		// 'style' => array('text-align' => 'center'),
	    		'breakpoints' => 'xs sm md lg xl'
 	    		
    		)
    		

		);

		header('Content-Type: application/json');
		echo json_encode($columns, JSON_UNESCAPED_SLASHES);
		 
	}

	public function getSchoolStudents(){
		$sql = "SELECT *, concat(last_name, ', ', first_name, ', ', middle_name) AS fullname FROM vw_students ";
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
			$data[$ctr]['edit_link'] = '<a href="'.site_url('student/remove/'.iencode($res['profile_id'])).'" onclick="return confirm(\'Delete this user?\')"><span class="glyphicon glyphicon-remove"></span></a> &nbsp; <a href="'.site_url('student/edit/'.iencode($res['profile_id']) ).'"><span class="glyphicon glyphicon-edit"></span></a>';
			$data[$ctr]['default_pw'] = $res['default_password'] != '' ? $res['default_password'] : '<a href="#">reset password</a>';
			$ctr++;
		}
		header('Content-Type: application/json');
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
	}


	public function add_student()
	{
        if( $this->input->post() ){

            if($this->check_input('student_add') != FALSE)
            {
                $this->school_model->addStudent($this->input->post() );
                $msg = 'Student <u>'.$this->input->post("last_name").', '.$this->input->post('first_name').'</u> successfully added.';
                $this->msg_flash($msg);
                redirect(base_url('school/add_student'));
            }
        }
		$this->data = [
			'page_title' =>  $this->data['page_title']." : Add Student",
			'courses' => $this->school_model->sch_courses()->result_array(),
			'pageCSS' => array('bootstrap-select'),
			'customJS' => array('school','bootstrap-select'),
			'years' => $this->school_model->sch_years()->result_array(),
            'course_form' => $this->load->view('school/course_form_view',$this->data,TRUE),
            'batch_form' => $this->load->view('school/form_batch',$this->data,TRUE)
		];
		// debug($this->data['years']);die();



		$this->load->view('includes/head',$this->data);
		$this->load->view('school/add_student_view');
		$this->load->view('includes/footer');
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





	public function test()
	{
		$this->load->view('includes/head',$this->data);
		$this->load->view('test/fb_login');
		$this->load->view('includes/footer');
	}

//	private function _add_student_validation(){
//		if($this->input->post('email') != ''){
//			$valid_email = 'valid_email' ;
//		}else{
//			$valid_email = "";
//		}
//		$config = array(
//			  array(
//		            'field' => 'first_name',
//		            'label' =>  'first name',
//		            'rules' => 'required|max_length[50]'
//		        ),
//		        array(
//		            'field' => 'last_name',
//		            'label' =>  'last name',
//		            'rules' => 'required|max_length[50]'
//		        ),
//		        array(
//		            'field' => 'middle_name',
//		            'label' =>  'middle name',
//		            'rules' => 'max_length[50]'
//		        ),
//
//		        array(
//		            'field' => 'birth_date',
//		            'label' =>  'birth date',
//		            'rules' => 'required'
//		        ),
//		        array(
//		            'field' => 'course_id',
//		            'label' =>  'course',
//		            'rules' => 'required'
//		        ),
//		        array(
//		            'field' => 'email',
//		            'label' =>  'email',
//		            'rules' =>$valid_email
//		        ),
//			);
//		$this->form_validation->set_error_delimiters('<p class="text-bold text-danger">', '</p>');
//		$this->form_validation->set_rules($config);
//		// debug($this->form_validation->run(),true);
//		return $this->form_validation->run();
//		die();
//	}


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


	public function schoolyear_add()
    {

        if($this->input->post()){
            if($this->check_input('schoolyear_add')){
                $this->school_model->yearbookAdd($this->input->post('new_batch_year'));
                $batch = $this->school_model->sch_years();
                $data = [
                    'success' => TRUE,
                    'message' => 'School year successfully added.',
                    'batches' => $batch->result_array(),
                ];

                echo json_encode($data);
                die();
            }

        }
    }




}//end class
