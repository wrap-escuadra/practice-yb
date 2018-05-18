<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller{

	function __construct(){
		parent:: __construct();

	}
	public function index()
	{	
		$this->load->model('profile_model');
		$this->data = [
			'page_title' =>  $this->data['page_title']." : My Profile",
			'user' => $this->profile_model->my_profile(),
			'awards' => $this->profile_model->awards($this->session->userdata('student_id')),
			'grad_photos' => $this->profile_model->grad_photos($this->session->userdata('student_id')),
		];

		$this->load->view('includes/head',$this->data);
		$this->load->view('profile/myprofile.php');
		$this->load->view('includes/footer');

	}

	public function school_admin()
    {

    }

	public function add()
	{	
		$this->load->library('form_validation');
		$this->data = [
			'page_title' =>  $this->data['page_title']." : New Profile",
			'courses' => $this->db->get('mt_courses')->result_array(),
		];
		if( $this->input->post() ){

			if($this->_add_student_validation() !== FALSE){

				$this->_add_student($this->input->post());
			}
		}

		$this->load->view('includes/head',$this->data);
		$this->load->view('profile/new_view.php');
		$this->load->view('includes/footer');
	}

	private function _add_student($post){
		
		$data = array(
				'school_id' => 1,//hardcoded for testing only
				'batch_year' => $post['batch_year'],
				'first_name' => $post['first_name'],
				'last_name' => $post['last_name'],
				'middle_name' => $post['middle_name'],
				'birth_date' =>  mysql_date($post['birth_date']) ,
				'course_id' => $post['course_id'],
				'role_id' => ROLE_STUDENT,
				'email' => strtolower($post['email'])
 			);
		
		$this->db->insert('mt_students',input_prep($data));
		$student_id = $this->db->insert_id();
		$this->_upload_head_image($student_id);
		foreach($post['awards'] as $award){
			$data = array(
				'award_description' => $award,
				'student_id' => $student_id,
			);

			if(trim($award) != ""){
				$this->db->insert('lu_student_awards',input_prep($data));	
			}
		}
		
		
		$this->msg_flash('successful adding hahah');
		redirect(base_url('profile/add'));
	}

	private function _add_student_validation(){
		$config = array(
			  array(
		            'field' => 'first_name',
		            'label' =>  'first name',
		            'rules' => 'required'
		        ),
		        array(
		            'field' => 'last_name',
		            'label' =>  'last name',
		            'rules' => 'required'
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
		            'rules' => 'required|valid_email'
		        ),
			);
		$this->form_validation->set_error_delimiters('<p class="text-bold text-danger">', '</p>');
		$this->form_validation->set_rules($config);
		// debug($this->form_validation->run(),true);
		return $this->form_validation->run();
		die();
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
		            'max_size' => '2000',
		            'overwrite'  => FALSE,
		            'remove_spaces' =>  TRUE,
		        );
	        $this->load->library('upload',$config);
	        echo $config['upload_path'];
			// $num_of_files = count($_FILES) ;
			// debug($this->input->post('userfile') );
			// debug($_FILES ,true);
	        foreach($_FILES as $key=>$value) :
				for($s=0; $s<=$count-1; $s++) {
					
					$_FILES['userfile']['name'] =$value['name'][$s];
			        $_FILES['userfile']['type']  = $value['type'][$s];
			        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['userfile']['error']  = $value['error'][$s];
			        $_FILES['userfile']['size']  = $value['size'][$s];
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
			        	echo  $this->upload->display_errors();
			        }
				}
			endforeach;

		}
	
	}



}//end class
