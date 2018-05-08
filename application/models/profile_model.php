<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    
    public function my_profile(){
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $q = $this->db->get('vw_students');
        return  $q->row_array();

    }

    public function awards()
    {
        $this->db->where('student_id',$this->session->userdata('student_id'));
        $q = $this->db->get('lu_student_awards');

        return $q->result_array();
    }

    public function grad_photos()
    {
        $this->db->where('student_id',$this->session->userdata('student_id'));
        $q = $this->db->get('lu_yb_images');

        return $q->result_array();
    }



    
}