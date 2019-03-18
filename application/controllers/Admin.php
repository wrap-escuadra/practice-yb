<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('admin_model');
		$this->load->model('school_model');
		$this->form_validation->set_error_delimiters('<p class=" text-danger"><i class="glyphicon glyphicon-remove-sign hide"></i>  ', '</p>');
		if($this->session->userdata('user_role') != R_SYSADMIN )
		{
			redirect(site_url());
		}

	}

	public function index()
	{
		redirect(site_url('admin/schools'));
		$this->data = [
			'page_title' =>  $this->data['page_title']." : My Profile",

		];

		$this->load->view('includes/head',$this->data);
		echo '<br><br><br><br><br><br><br><h1>NO PAGE TO DISPLAY</h1>';
		$this->load->view('includes/footer');
	}

	public function schools($school_id=null){
		$this->data += [
			'page_title' => $this->data['page_title']." : Schools",

		];
		if($school_id == null)
		{
			$this->data['schools'] = $this->db->get('vw_schools')->result_array();
			$this->load->view('includes/head',$this->data);
			$this->load->view('admin/schools_view');
			$this->load->view('includes/footer');
		}else{
			$school_decrypt = $school_id;
			$school_id = idecode($school_id);
			$q = $this->db->where('id',$school_id)->get('vw_schools');
			if($q->num_rows() > 0){
				$this->data['school'] = $q->row_array();
				$this->data['school_users'] = $this->admin_model->school_users($school_id);
				$this->data['school_id'] = $school_decrypt;
				$this->load->view('includes/head',$this->data);
				$this->load->view('admin/school_info_view');
				$this->load->view('includes/footer');
			}else{
				$link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url('admin/schools');
				redirect($link);
			}
		}
		
	}

	public function schoolColumns(){
		$columns = array(
		
			array (
		        'name' => 'school',
		        'title' => 'SCHOOL',
		    ),
	
		    array (
		        'name' => 'school_address',
		        'title' => 'ADDRESS',
		        'breakpoints' => 'xs sm',
		    ),
		    array (
		        'name' => 'school_abbr',
		        'title' => 'ABBR',
		        // 'breakpoints' => 'xs sm md lg',
		        'visible' => false,
		    ),
		    array (
		        'name' => 'school_city',
		        'title' => 'CITY',
		        'breakpoints' => 'xs sm ',
		    ),
		    array(
		    	'name'=> 'status_desc',
		    	'title' => 'STATUS',
		    	
		    	
	    	),
	    	array(
		    	'name'=> 'edit_link',
		    	'title' => '',
		    	'filterable' => false,
		    	'style' => array('text-align' => 'center')
		    
		    	
	    	),
	    	array(
	    		'name'=> 'action_link',
		    	'title' => '',
		    	'filterable' => false,
		    	'style' => array('text-align' => 'center'),
		    	'breakpoints' => 'xs sm md lg',
    		)
	    
		);

		header('Content-Type: application/json');
		echo json_encode($columns, JSON_UNESCAPED_SLASHES);
		 
	}

	public function getSchools(){
		$sql = "SELECT *, concat(school_name, ' (', school_abbr , ')') as school FROM  vw_schools a";
		
		$q = $this->db->query($sql);
		$ctr = 0;
		foreach($q->result_array() as $res)
		{
			$data[$ctr] = $res;
			$data[$ctr]['edit_link'] = '<a href="'.site_url('admin/schools/'.iencode($res['id']) ).'">View</a>'; 
			$action =  ($res['status']== 1) ? 'Deactivate' : 'Activate';
			$data[$ctr]['action_link'] = '<a href="'.site_url('admin/activation/'.iencode($res['id']) ).'">'.$action.'</a>'; 
			$ctr++;
		}
		header('Content-Type: application/json');
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
	}

	public function schoolUserColumns(){
		$columns = array(
		
			array (
		        'name' => 'username',
		        'title' => 'Usename',
		    ),
	
		    array (
		        'name' => 'role_desc',
		        'title' => 'Role',
		        
		    ),
		    array (
		        'name' => 'last_name',
		        'title' => 'Last Name',
		        'breakpoints' => 'xs sm ',
		      
		    ),
		    array (
		        'name' => 'first_name',
		        'title' => 'First Name',
		        'breakpoints' => 'xs sm ',
		    ),
		    array(
		    	'name'=> 'middle_name',
		    	'title' => 'Middle Name',
		    	'breakpoints' => 'xs sm',
		    	
	    	),
	    	array(
		    	'name'=> 'links',
		    	'title' => '',
		    	// 'filterable' => false,
		    	'sortable' => false,
		    	'style' => array('text-align' => 'center')
		    
		    	
	    	),
	    
	    
		);

		header('Content-Type: application/json');
		echo json_encode($columns, JSON_UNESCAPED_SLASHES);
		 
	}

	public function getSchoolUser($school_id){
		$school_id = idecode($school_id);
		
		$q_users = $this->admin_model->school_users($school_id);
		
		$data = array();
		$ctr = 0;
		foreach($q_users->result_array() as $res)
		{
			$data[$ctr] = $res;
			$data[$ctr]['links'] = '<a href="#" title="edit"> <span class="glyphicon glyphicon-edit"></span></a> 
									
									<a href="#"> Deactivate </a>
									<a href="#" title="delete"> <span class="glyphicon glyphicon-remove"></span></a> 
									';
			$ctr++;
		}
		header('Content-Type: application/json');
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
	}
	public function school_add()
	{
		$this->data['page_title'] .= " Xxxx";
		$this->data += [
			'pageCSS' => array('bootstrap-select'),
			'customJS' => array('admin','bootstrap-select'),
			'countries' =>  $this->admin_model->get_countries()->result_array()
		];
		if($this->input->post())
		{
			// debug($this->input->post());
			if($this->check_input('school_add') != FALSE)
			{
				$this->admin_model->add_school($this->input->post());
				// $school_id = $this->db->insert_id();
				// $this->_upload_school_images($school_id);
				$msg = 'School successfully added';
				$this->msg_flash($msg);
				redirect(base_url('admin/school_add'));
			}
		}
		$this->data['country_form'] = $this->load->view('admin/country_form_view',$this->data,TRUE);

		$this->load->view('includes/head',$this->data);
		$this->load->view('admin/new_school_view');
		// $this->load->view('admin/country_form_view');
		$this->load->view('includes/footer');
	}

	

	public function activation($school_id){
		$school_id = idecode($school_id);

		$this->db->where('id',$school_id);
		 $q = $this->db->get('mt_schools');
		 if($q->num_rows() < 1){
		 	redirect(site_url('admin/schools'));
		 }

		 $school_info = $q->row_array();


		$this->db->where('id',$school_id);
		if($school_info['status'] == 1){
			$data = ['status' => 0];
			$action = "deactivated";
		}else{
			$data = ['status' => 1];
			$action = "activated";
		}
		
		$this->db->update('mt_schools',input_prep($data));

		$msg = $school_info['school_name']." (".$school_info['school_abbr'].") has been $action";
		set_popmsg($msg);

		redirect(site_url('admin/schools'));

	}

	private function _add_school_validation(){
		// $config = array(
		// 	  array(
		//             'field' => 'school_name',
		//             'label' =>  'school name',
		//             'rules' => 'required'
		//         ),
		//         array(
		//             'field' => 'school_abbr',
		//             'label' =>  'school abbreviation',
		//             'rules' => 'required'
		//         ),
		       
		//         array(
		//             'field' => 'school_address',
		//             'label' =>  'school address',
		//             'rules' => 'required'
		//         ),
		//         array(
		//             'field' => 'school_city',
		//             'label' =>  'city/province',
		//             'rules' => 'required'
		//         ),
		//         array(
		//             'field' => 'country',
		//             'label' =>  'school country',
		//             'rules' => 'required'
		//         ),
		// 	);
		$this->load->config('form_validation');
		$this->form_validation->set_rules($this->config->item('school_add'));
		return $this->form_validation->run();
	}

	private function _upload_school_images($school_id='')
	{
		$this->load->library('upload');
		$config['upload_path']          = './assets/_uploads/school_logos/';
	    $config['allowed_types']        = 'jpeg|jpg|png';
	  	$this->upload->initialize($config);


	    if ( ! $this->upload->do_upload('school_logo'))
	    {
          // echo  $this->upload->display_errors();die();

            // $this->load->view('upload_form', $error);
	    }
	    else
	    {
            $data = $this->upload->data();
            // debug($data,true);
            $school_logo = $data['file_name'];
	    }



	    $config['upload_path']          = './assets/_uploads/school_banners/';
	    $config['allowed_types']        = 'jpeg|jpg|png';
	 	
	 	$this->upload->initialize($config);
	    if ( ! $this->upload->do_upload('school_banner'))
	    {
          echo  $this->upload->display_errors();
          //die();

            // $this->load->view('upload_form', $error);
	    }
	    else
	    {
            $data =  $this->upload->data();
            $school_banner = $data['file_name'];
	    }

	    $data = ['school_logo' => $school_logo, 'school_banner' => $school_banner];
	    $this->db->where('id',$school_id);
	    $this->db->update('mt_schools',$data);
	}

	public function school_admin_add($school_id)
	{	
		if($this->input->post() AND $this->_validate_new_school_admin() !== FALSE )
		{	
			$this->school_model->add_school_admin($this->input->post());
		}
			$dec_school_id = idecode($school_id);
			$q = $this->db->where('id',$dec_school_id)->get('vw_schools');

			if($q->num_rows() > 0){
				$this->data['school_id'] = $school_id;
				$this->data['school_info'] = $q->row_array();
				$this->load->view('includes/head',$this->data);
				$this->load->view('admin/school_admin_add_view');
				$this->load->view('includes/footer');
			}
	}

	private function _validate_new_school_admin(){
		$config = array(
			array(
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required|min_length[6]|alpha_numeric|is_unique[mt_users.username]',
			),
			array(
				'field' => 'last_name',
				'label' => 'last name',
				'rules' => 'required|max_length[50]',
			),
			array(
				'field' => 'first_name',
				'label' => 'first name',
				'rules' => 'required|max_length[50]',
			),
			array(
				'field' => 'middle',
				'label' => 'middle name',
				'rules' => 'max_length[50]',
			),
			array(
				'field' => 'email',
				'label' => 'email ',
				'rules' => 'required|valid_email',
			),
			array(
				'field' => 'mobile',
				'label' => 'mobile',
				'rules' => 'required|numeric|min_length[9]',
			),
			array(
				'field' => 'landline',
				'label' => 'landline',
				'rules' => 'numeric|min_length[7]',
			),
			
		);
		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	}


	public function _add_school_admin($post)
	{	
		
		
		
	}


	public function country_add()
	{
		$data = [
			'country_name' => $this->input->post('country'),
			'country_code' => $this->input->post('country_code')
		];

		$result = $this->_validate_add_country();
		if($result){
			$this->db->insert('yb_countries',input_prep($data) );
		}
		 
		if($this->input->is_ajax_request()){
			if($result){
				$data['message'] = 'successfully added new countrys';
				$countries = $this->admin_model->get_countries();
				 $data['countries'] = $countries->result_array(); 
				 $data['rowcount'] =  $countries->num_rows();
			}else{
				$data['message'] = validation_errors();
				// var_dump($this->validation_errors());
			}
			$data['success'] = $result;
			echo json_encode($data);
			
		}else{
			redirect(site_url('admin/school_add'));
		}
	}

	private function _validate_add_country()
	{
		$config = [
			array(
				'field' => 'country',
				'label' => 'country',
				'rules' => 'required|alpha_space|is_unique[yb_countries.country_name]'
			),
			array(
				'field' => 'country_code',
				'label' => 'country code',
				'rules' => 'numeric|max_length[5]|is_unique[yb_countries.country_code]'
			),
		];

		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	}

	public function fetchCountries()
	{
		$countries = $this->admin_model->get_countries();
		 $data['countries'] = $countries->result_array(); 
		 $data['rowcount'] =  $countries->num_rows();
		 echo json_encode($data);
	}



	



}//end class
