<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    protected $table = 'profile_comments';
    public function fetch($student_id){
       $sql = "SELECT pc.*
                    ,concat(concat(ms.first_name,' '),ms.last_name) receiver
                    ,concat(concat(ms2.first_name,' '),ms2.last_name) commentor
                    ,yi.img
                FROM  $this->table pc 
                LEFT JOIN mt_students ms ON pc.profile_id = ms.profile_id 
                LEFT JOIN mt_students ms2 ON pc.commentor = ms2.profile_id 
                LEFT JOIN lu_student_primary sp ON pc.commentor = sp.profile_id
                LEFT JOIN lu_yb_images yi ON sp.img_id = yi.id
                WHERE pc.profile_id = '".idecode($student_id)."'
                ORDER BY created_at";
        $q = $this->db->query($sql);

        return $q->result_array();
    }


    public function save(){
        // debug($this->session->userdata('student_id'));die();
        $profile_id = $this->input->post('profile_id');
        $data = [
            'profile_id' => idecode($profile_id) ,
            'commentor' => $this->session->userdata('student_id'),
            'comment' => $this->input->post('comment')
        ];
        return  $this->db->insert('profile_comments',input_prep($data));

    }



    
}   