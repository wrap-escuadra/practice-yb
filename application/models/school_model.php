<?php defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model
{
    
    public function school_users($school_id)
    {
        $sql = "SELECT * FROM vw_faculties WHERE school_id = '{$school_id}' ";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    public function school_info($school_id)
    {

        $sql = "SELECT * FROM mt_schools WHERE school_id = '{$school_id}'";
        $q = $this->db->query($sql);
        return $q->row_array();
    }

    public function sch_students($page)
    {
        $config["base_url"] = base_url('school/students/');
        $config["per_page"] = PER_PAGE;
        $config["uri_segment"] = 3;

        $page = is_numeric($page) ? $page : 0;
        $page_limit = PER_PAGE;

        $sql = "SELECT * FROM vw_students "; 

        $sql .=" WHERE school_id = {$this->session->userdata("school_id")} ";
        $q = $this->db->query($sql);
        $total_rows = $q->num_rows();
        $config["total_rows"]  = $total_rows;
       
        $sql .=" ORDER BY batch_year DESC, last_name ASC LIMIT {$page}, {$page_limit}";
        $q = $this->db->query($sql);

        $this->pagination->initialize($config);

        $data['total_rows'] = $total_rows;
        $data['result'] = $q->result_array();
        $data['num_rows'] = $q->num_rows();
        return $data;
    }

    function sch_courses()
    {
        $this->db->where('school_id',$this->session->userdata('school_id'))->order_by('course_desc');
        return $this->db->get('mt_courses');
    }


    function add_year()
    {

    }

    function sch_years()
    {
        $this->db->where('school_id',$this->session->userdata('school_id'))->order_by('school_year', 'DESC');
        return $this->db->get('mt_yearbooks');
    }

    
}