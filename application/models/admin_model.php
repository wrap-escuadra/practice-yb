<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    
    public function school_users($school_id)
    {
        $sql = "SELECT * FROM vw_faculties WHERE school_id = '{$school_id}' ";
        $q = $this->db->query($sql);
        return $q;
    }

    public function school_info($school_id)
    {
        $sql = "SELECT * FROM mt_schools WHERE school_id = '{$school_id}'";
        $q = $this->db->query($sql);
        return $q->row_array();
    }


    public function get_countries()
    {
        return $this->db->get('yb_countries'); //->result_array();
    }
}