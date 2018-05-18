<?php 
$CI =get_instance();

$config['school_add'] = array(
	array(
        'field' => 'school_name',
        'label' =>  'school name',
        'rules' => 'required'
    ),
    array(
        'field' => 'school_abbr',
        'label' =>  'school abbreviation',
        'rules' => 'required'
    ),
   
    array(
        'field' => 'school_address',
        'label' =>  'school address',
        'rules' => 'required'
    ),
    array(
        'field' => 'school_city',
        'label' =>  'city/province',
        'rules' => 'required'
    ),
    array(
        'field' => 'country',
        'label' =>  'school country',
        'rules' => 'required'
    ),
);

if($CI->input->post('email') != ''){
    $valid_email = 'valid_email' ;
}else{
    $valid_email = "";
}
$config['student_add'] = array(
    array(
        'field' => 'first_name',
        'label' =>  'first name',
        'rules' => 'required|max_length[50]'
    ),
    array(
        'field' => 'last_name',
        'label' =>  'last name',
        'rules' => 'required|max_length[50]'
    ),
    array(
        'field' => 'middle_name',
        'label' =>  'middle name',
        'rules' => 'max_length[50]'
    ),

    array(
        'field' => 'birth_date',
        'label' =>  'birth date',
        'rules' => 'required'
    ),
    array(
        'field' => 'course_id',
        'label' =>  'course',
        'rules' => 'required'
    ),
    array(
        'field' => 'email',
        'label' =>  'email',
        'rules' =>$valid_email
    ),
);
	  	
	

