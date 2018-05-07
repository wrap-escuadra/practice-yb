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
   
}


 ?>