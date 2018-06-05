<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('school_model');
		$this->load->model('student_model');

	}


	public function edit($profile_id)
	{

		if($this->input->post('action') == 'info'){
			$profile_id = $this->input->post('profile_id');
			if($this->check_input('student_edit') != FALSE){
	        	$this->student_model->updateStudentInfo($this->input->post());
	        	
	        	$msg = "User successfully updated.";
	        	$this->msg_flash($msg);
	            redirect(base_url('student/edit/'.$profile_id ));
	       	}
		}elseif($this->input->post('action') == 'award'){
			if($this->check_input('award_edit') != FALSE){
	        	$this->student_model->updateAward($this->input->post());
	        	
	        	$msg = "Award successfully updated.";
	        	$this->msg_flash($msg);
	            redirect(base_url('student/edit/'.$profile_id ));
	       	}
		}
			
		

		$this->data = [
			'student' => $this->student_model->getStudents($profile_id),
			'pictures' => $this->student_model->getPictures($profile_id),
			'awards' => $this->student_model->getAwards($profile_id),
			'pageCSS' => array('bootstrap-select'),
			'customJS' => array('school','bootstrap-select'),
			'course_form' => $this->load->view('school/course_form_view',$this->data,TRUE),
            'batch_form' => $this->load->view('school/form_batch',$this->data,TRUE),
            'years' => $this->school_model->sch_years()->result_array(),
            'courses' => $this->school_model->sch_courses()->result_array(),
		];
		
		$this->load->view('includes/head',$this->data);
		$this->load->view('student/edit');
		$this->load->view('includes/footer');

	}

	




}//end class