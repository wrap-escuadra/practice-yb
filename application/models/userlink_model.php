<?php defined('BASEPATH') OR exit('No direct script access allowed');

class userlink_model extends CI_Model
{
    protected $table = 'lu_userlink';
    function add($post){
        $post = (object) $post;
        $data = [
            'user_1' => $post->user_1,
            'user_2' => $post->user_2,
            'last_user' => $post->user_1
        ];

        return  $this->db->insert($this->table, $data);
         // echo $this->db->last_query();
    }

    function update($status_code){
        $this->db->where('user_1',$user_1);
        $this->db->where('user_2',$user_2);
        $data = [ 
            'status_code' => $status_code,
            'last_user' => $this->session->userdata('user_id'),
        ];
        return $this->db->update($this->table,input_prep($data));
    }

    function checkStatus($user_1,$user_2){
        // debug($this->table);
        $sql = "SELECT * FROM $this->table lk
                LEFT JOIN lu_userlink_status ls ON lk.status_code  = ls.status
                WHERE user_1 = '{$user_1}' AND user_2 = '{$user_2}' " ; //AND status_code = ".S_PENDING;
        $q = $this->db->query($sql);
        return ($q->num_rows() > 0) ? FALSE : $q->row_array();
    }

    function userlinks($user_id){
        $sql = "SELECT * FROM $this->table
                WHERE (user_1 = $user_id OR user_2 = $user_id)
                AND status_code = ".S_APPROVED;
        $q = $this->db->query($sql);
        return $q;
    }

    function pendingRequest(){
       $sql=  "SELECT * FROM {$this->table}
                WHERE (`user_1` = 1 OR `user_2` = 1)
                AND `status` = 0
                AND last_user != 1";
    }

    function requestSent(){//when visiting userpage
        $sql = "SELECT * FROM {$this->table}
                WHERE `user_1` = 1 AND `user_2` = 7";

    }

}

