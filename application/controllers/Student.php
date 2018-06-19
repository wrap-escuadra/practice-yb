<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('school_model');
		$this->load->model('student_model');

	}
	public function test(){
// debug($this->input->post());
		if($this->input->post()){
			$this->img_upload();
		}

		$this->load->view('includes/head',$this->data);
		$this->load->view('student/frm_image');
		$this->load->view('includes/footer');
	}

	public function img_upload()
	{
		// debug($_FILE);

		$config['upload_path']          = './assets/_uploads/profile_headers';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
               $msg = $this->upload->display_errors();
               $data['success'] = false;
               $data['message'] = '<span class="text-danger">'.$msg.'</span>';
              
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $msg = "Image successfully updated. ";
            $profile_id = idecode($this->input->post('profile_id'));
            $img_id = idecode($this->input->post('img_id'));

            $this->update_img($profile_id,$img_id);
            $this->msg_flash($msg);


            $data['success'] = true;
           	$data['message'] = $msg;
           	
            
        }

        header('Content-Type: application/json');
        echo json_encode($data);
	}

	public function update_img($profile_id,$img_id){
		//delete previous image
		if($img_id != ''){
			$image_name = $this->db->where('id',$img_id)->get('lu_yb_images')->row_array()['img'];
			if($image_name != '')
			{
				$path = './assets/_uploads/profile_headers/';
				unlink($path.$image_name);
			}
			
			$this->db->where('id',$img_id)->delete('lu_yb_images');

		}
		
		//save new data
		return $this->save_image_data($profile_id,$img_id);
	}

	public function save_image_data($profile_id=null,$img_id=null){
		$this->load->library('image_lib');
		$pic_data = $this->upload->data();
		
        $data = [
            'student_id' => $profile_id,
            'img' => $pic_data['file_name'],
        ];
 		$path = './assets/_uploads/profile_headers/';
        create_thumb($path,$pic_data['file_name']);
        return $this->db->insert('lu_yb_images',$data);
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
            'frm_image' => $this->load->view('student/frm_image',$this->data,TRUE),
            'primary_img' => $this->student_model->getPrimaryImg($profile_id)
		];
		
		$this->load->view('includes/head',$this->data);
		$this->load->view('student/edit');
		$this->load->view('includes/footer');

	}

	public function remove($profile_id)
    {
        $id = idecode($profile_id);
        $query = $this->db->where('profile_id',$id)->get('mt_students');

        if($query->num_rows() > 0){
            $user_id = $query->row()->user_id;

            $this->db->trans_begin();

            $this->db->where('profile_id',$id)
                    ->delete('mt_students');
            echo $this->db->last_query();
            $this->db->where('user_id',$user_id)
                    ->delete('mt_users');
            echo $this->db->last_query();



            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            }else{
                $msg = "Student successfully deleted.";
                $this->msg_flash($msg);
                $this->db->trans_commit();
            }
        }

        redirect($_SERVER['HTTP_REFERER']);



    }

    public function imgRemove(){
    	if(!$this->input->is_ajax_request()) return false;
    	$img_id = idecode($this->input->post('img_id'));
    	$query = $this->db->where('id',$img_id)->get('lu_yb_images');
    	$image_name = $query->row_array()['img'];

    	if($image_name != '')
		{
			$path = './assets/_uploads/profile_headers/';
	    	if(file_exists($path.$image_name))unlink($path.$image_name);
	    	$thumb_file = $path.'thumbnail/thumb_'.$image_name;
	    	if(file_exists($thumb_file))unlink($thumb_file);
		}
    	
    	

    	

    	if( $this->db->where('id',$img_id)->delete('lu_yb_images')){
    		$data['success'] = true;
    		$msg = "Image successfully deleted";
    	}else{
    		$data['success'] = false;
    		$msg = "Soemthing went wrong please try again";

    	}
		$this->msg_flash($msg);
    	header('Content-Type: application/json');
    	echo json_encode($data);
    }

    public function profile($student_id=null){
    	if($student_id===null)redirect(site_url());

    }

    public function set_primary(){
    	$profile_id = idecode( $this->input->post('profile_id'));
    	$img_id = idecode( $this->input->post('img_id'));
    	$q = $this->db->where('profile_id',$profile_id)->get('lu_student_primary');
    	if($q->num_rows() == 0){
    		$data = [
    			'profile_id' => $profile_id,
    			'img_id' => $img_id,
    		];
    		$this->db->insert('lu_student_primary',input_prep($data));
    	}else{
    		$data = [ 'img_id' => $img_id ];
    		$this->db->where('profile_id',$profile_id)->update('lu_student_primary',input_prep($data));
    	}


    	
    }

	




}//end class
