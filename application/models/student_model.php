<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model
{
  
    
     function getStudents($profile_id=null)
    {

        if($profile_id != null)
        {
            $profile_id = idecode($profile_id);
            $this->db->where('profile_id',$profile_id);  
            $q = $this->db->get('vw_students');
            if($q->num_rows() < 1){
                redirect(base_url('school/students'));
            }
            return $q->row_array();
            
        }

        return $this->db->get()->result_array();
        
    }

    function getPictures($profile_id)
    {
        $profile_id = idecode($profile_id);
        $sql = "SELECT id,student_id as profile_id ,img FROM lu_yb_images WHERE student_id = '{$profile_id}'";
        $q = $this->db->query($sql);
        return $q->result_array();
    }


    function getAwards($profile_id)
    {
        $profile_id = idecode($profile_id);
        $sql = "SELECT * FROM lu_student_awards WHERE student_id = '{$profile_id}'";
        // die($sql);
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    function updateStudentInfo($post){
        $profile_id = idecode($post['profile_id']);
        $data = array(
            'last_name' => $post['last_name'],
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'],
            'batch_year' => $post['batch_year'],
            'email' => $post['email'],
            'birth_date' => $post['birth_date'],
            'course_id' => $post['course_id']
        );
        return $this->db->where('profile_id',$profile_id)
                ->update('mt_students',input_prep($data));
        // debug($this->db->last_query());
    }

    function updateAward($post)
    {
       $profile_id  = idecode($post['profile_id']);

       $this->db->where('student_id' ,$profile_id)
                ->delete('lu_student_awards');

        $data  = array();
        foreach ($post['awards'] as $aw) {
            if(trim($aw) != '')
            {
                $data[] = array(
                    'award_description' => $aw,
                    'student_id' => $profile_id
                );
            }
        }
         return $this->db->insert_batch('lu_student_awards',$data);


    }




    
}   