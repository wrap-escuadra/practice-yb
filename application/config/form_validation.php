<?php
$config['error_prefix']= '<p class="input-error">';
$config['error_sufix']=  '</p>';


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
    $valid_email = 'valid_email|is_unique[mt_students.email]' ;
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

$config['schoolyear_add'] = array(
    array(
        'field' => 'new_batch_year',
        'label' =>  'batch year',
        'rules' => 'required|exact_length[4]|greater_than[1960]|unique_sch_year',
        'type' => 'input'
    ),

);

$config['student_edit'] = array(
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
        'rules' => 'valid_email|edit_unique_email'
    ),
    array(
        'field' => 'batch_year',
        'label' =>  'batch year',
        'rules' => 'required|numeric|max_length[4]'
    ),
    

);

$config['award_edit'] = array(
    'field' => 'awards[]',
    'label' => 'awards',
    'rules' =>  'alpha_numeric_spaces|max_length[100]'
);


$config['comment_add'] = array(
    array(
        'field' => 'comment',
        'label' =>  'comment',
        'rules' => 'required|max_length[250]|alpha_numeric_spaces',
        'type' => 'input'
    ),

);

$is_unique = '';
if($CI->input->post('old_username') !=  $CI->input->post('username')){
    $is_unique = '|is_unique[mt_users.username]';
}
$config['change_password'] = array(
    array(
        'field' => 'username',
        'label' =>  'username',
        'rules' => 'required|max_length[30]|alpha_numeric_spaces'.$is_unique,
        'type' => 'input'
    ),
    array(
        'field' => 'current_password',
        'label' =>  'current password',
        'rules' => 'required|current_password',
        'type' => 'password'
    ),
    array(
        'field' => 'password',
        'label' =>  'new password',
        'rules' => 'required|min_length[6]|max_length[30]|alpha_numeric_spaces|matches[password_confirmation]',
        'type' => 'password'
    ),
    array(
        'field' => 'password_confirmation',
        'label' =>  'password confirmation',
        'rules' => 'required|min_length[6]|max_length[30]|alpha_numeric_spaces',
        'type' => 'password'
    )

);
	  	
	

