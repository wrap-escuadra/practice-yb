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

    public function getComments(){
       $sql = "SELECT pc.*
                    ,concat(concat(ms.first_name,' '),ms.last_name) receiver
                    ,concat(concat(ms2.first_name,' '),ms2.last_name) commentor
                FROM profile_comments pc
                LEFT JOIN mt_students ms on pc.profile_id = ms.profile_id 
                LEFT JOIN mt_students ms2 on pc.commentor = ms2.profile_id 
                WHERE pc.profile_id = '".$this->session->userdata('student_id')."'
                ORDER BY created_at";
        $q = $this->db->query($sql);
        // debug($this->db->last_query());
        return $q->result_array();
    }



    
}