<?php 
class MY_Form_validation extends CI_Form_validation
{
    function alpha_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    }


    function unique_course_desc($course_desc)
    {
    	$ci = get_instance();
    	$ci->db->where('school_id',$ci->session->userdata('school_id'));
    	$ci->db->where('course_desc',$course_desc);
    	$q =  $ci->db->get('mt_courses');
    	return ($q->num_rows() > 0) ?  FALSE : TRUE;
    }


    function unique_course_code($course_code)
    {
    	$ci = get_instance();
    	$ci->db->where('school_id',$ci->session->userdata('school_id'));
    	$ci->db->where('course_code',$course_code);
    	$q =  $ci->db->get('mt_courses');
    	return ($q->num_rows() > 0) ?  FALSE : TRUE;
    }

    function unique_sch_year(){
        $ci =get_instance();
        $schoolid_and_year = $ci->session->userdata('school_id').$ci->input->post('new_batch_year');
        $ci->db->where('schoolid_and_year',$schoolid_and_year);
        $q = $ci->db->get('mt_yearbooks');
        return ($q->num_rows() > 0) ?  FALSE : TRUE;
    }

    function edit_unique_email($email)
    {
        $ci = get_instance();
        $id = idecode($ci->input->post('profile_id'));
        $sql = "SELECT * FROM mt_students WHERE profile_id <> '{$id}' AND email = '{$email}'";
        // die($sql);
        $q = $ci->db->query($sql);

        return ($q->num_rows() > 0 ) ? FALSE : TRUE;
    }

    function current_password($password){
        $ci = get_instance();
        $sql = "SELECT * FROM mt_users WHERE 
                user_id = '".$ci->session->userdata('user_id')."' AND 
                password = '".md5($password)."'";
        $q = $ci->db->query($sql);
// die($sql);
        return ($q->num_rows() > 0) ? TRUE : FALSE;

    }
   
}


 ?>