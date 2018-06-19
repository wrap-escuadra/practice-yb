<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function school_users($school_id)
    {
        $sql = "SELECT * FROM vw_faculties WHERE school_id = '{$school_id}' ";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    public function school_info($school_id)
    {
        $sql = "SELECT * FROM vw_schools WHERE school_id = '{$school_id}'";
        $q = $this->db->query($sql);
        return $q->row_array();
    }

    public function faculty_info($user_id)
    {
        $sql = "SELECT * FROM vw_faculties WHERE user_id = '{$user_id}' ";
        $q = $this->db->query($sql);
        return $q->row_array(); 
    }

    public function student_info($user_id){
        // $this->db->where('profile_id',$user_id);
        // $q=  $this->db->get('vw_students');
        $sql = "SELECT * FROM vw_students WHERE user_id = '{$user_id}'";
        $q = $this->db->query($sql);
        return $q->row_array();
    }



    public function userInfo($user_id){
        $q = $this->db->where('user_id',$user_id)->get('mt_users');
        return $q->row_array();
    }

    public function changePassword($post){
        $input = (object) $post;
        $data = [
            'username' => $input->username,
            'password' => md5($input->password),
            'default_password' => null
        ];
        $this->db->where('username',$input->old_username);
        $this->db->update('mt_users',$data);
        $this->session->set_userdata(['username' => $this->input->post('username')]);

        
       
        

    }
}