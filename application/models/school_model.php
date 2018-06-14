<?php defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model
{

    function __construct()
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
        if($this->session->userdata('user_role') == R_SCHOOLADMIN){
            $this->db->where('school_id',$this->session->userdata('school_id'));
        }
        
        $this->db->order_by('school_year', 'DESC');
        return $this->db->get('mt_yearbooks');
    }

     public function addStudent($post){
        // var_dump($this->input->post(''));
        if( $this->input->post('school_id') AND $this->input->post('school_id') != "" ) {
            $school_id = $this->input->post('school_id');
        }else{
            $school_id = $this->session->userdata('school_id');
        }

        $first_name = $post['first_name'];
        $last_name = $post['last_name'];
        $username = $this->create_username(strtolower($first_name),strtolower($last_name));



        $user_id = $this->add_yb_users($username,R_STUDENT);
        // $school_year = $this->_getYear($post['batch_year'])['school_year'];
        $data = array(
            'school_id' => $school_id,//hardcoded for testing only
            'batch_year' => $post['batch_year'],
            'first_name' => ucfirst($first_name),
            'last_name' =>  ucfirst($last_name),
            'middle_name' => $post['middle_name'],
            'birth_date' =>  mysql_date($post['birth_date']) ,
            'course_id' => $post['course_id'],
            'role_id' => R_STUDENT,
            'user_id' => $user_id,
            'email' => strtolower($post['email'])
        );


        $this->db->insert('mt_students',input_prep($data));
        $student_id = $this->db->insert_id();
//        $this->_yearbook_add($school_id,$post['batch_year']);

        $this->_upload_head_image($student_id);
        foreach($post['awards'] as $award){
            $data_awards = array(
                'award_description' => $award,
                'student_id' => $student_id,
            );

            if(trim($award) != ""){
                $this->db->insert('lu_student_awards',input_prep($data_awards));
            }
        }




    }

    
    private function create_username($first_name,$last_name)
    {
        $fullname = trim($first_name).trim($last_name);
        $fullname = str_replace(' ', '_', $fullname);
        $success = FALSE;
        $username = $fullname;
        $i = 1;
        do {
            $this->db->where('username',$username);
            $q = $this->db->get('mt_users');
            $res = $q->result_array();
            if($q->num_rows() < 1){
                $success == TRUE;
                return $username;
            }else{

                $username = $fullname.'_'.$i;
                $i++;
            }

        } while ( $success !== TRUE);



    }




    private function add_yb_users($username,$role)
    {
        $password = createDefaultPassword();

        $data = array(
            'username' => $username,
            'password' => md5($password),
            'user_role' => R_STUDENT,
            'default_password' => $password
        );
        $this->db->insert('mt_users',$data);
        return $this->db->insert_id();
    }
    private function _upload_head_image($student_id)
    {

        if (!isset($_FILES))return false;
        if( isset($_FILES)){

            $count = count($_FILES['userfile']['size']);
            // debug($count,true);
            $config = array(
                // 'upload_path' => base_url('assets/_uploads/'),
                'upload_path' => './assets/_uploads/profile_headers/',
                'allowed_types' => 'jpg|png|jpeg',
                'overwrite'  => FALSE,
                'remove_spaces' =>  TRUE,
            );
            $this->load->library('upload',$config);
            // echo $config['upload_path'];
            // $num_of_files = count($_FILES) ;
            // debug($this->input->post('userfile') );
            // debug($_FILES ,true);
            $uploading = true;
            foreach($_FILES as $key=>$value) :
                for($s=0; $s<=$count-1; $s++) {

                    $_FILES['userfile']['name'] =$value['name'][$s];
                    $_FILES['userfile']['type']  = $value['type'][$s];
                    $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['userfile']['error']  = $value['error'][$s];
                    $_FILES['userfile']['size']  = $value['size'][$s];
//
                    if($this->upload->do_upload()){

                        $pic_data = $this->upload->data();
                        $data = [
                            'student_id' => $student_id,
                            'img' => $pic_data['file_name'],
                        ];
                        $this->db->insert('lu_yb_images',$data);
//                        echo $this->db->last_query();
                        // die($this->db->insert_id());
                    }else{

                        $uploading = false;
//                       continue;

//                        $this->db->where('user_id',$student_id);
//                        $this->db->limit(1);
//                        $this->db->delete('mt_students');
//                        $this->db->where('user_id',$student_id);
//                        $this->db->delete('mt_users');

                    }

                }
            endforeach;

            // if(!$uploading){
            // 	echo $this->session->set_flashdata('pop',$this->upload->display_errors());
            // 	// redirect(base_url())1
            // }

        }

    }

    public function yearbookAdd($year,$school_id=null)
    {
        $school_id = is_null($school_id) ? $this->session->userdata('school_id') : $school_id;

        $this->db->where('schoolid_and_year',$school_id.$year);
        $q = $this->db->get('mt_yearbooks');
        if($q->num_rows() < 1){
            $data = array(
                'school_id' => $school_id,
                'school_year' => $year,
                'schoolid_and_year' => $school_id.$year,
                'created_by' => $this->session->userdata('user_id')
            );
            $this->db->insert('mt_yearbooks',$data);
        }
    }

    public function add_school_admin()
    {
        $data = array(
            'username' => $post['username'],
            'password' => md5($post['username']),
            'user_role' => R_SCHOOLADMIN,
            'default_password' => createDefaultPassword(),
        );

        if($this->db->insert('mt_users', input_prep($data) ))
        {

            $school_id = $post['school_id'];
            $school_id = idecode($school_id);
            $user_id = $this->db->insert_id();
            $data = array(
                'school_id' => $school_id,
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'middle_name' => $post['middle_name'],
                'email' =>  $post['email'],
                'mobile' => $post['mobile'],
                'landline' => $post['landline'],
                'user_id' => $user_id
 
            );
            // var_dump($this->db->insert('mt_faculties',input_prep($data)) );die();
            if( $this->db->insert('mt_faculties',input_prep($data)) === TRUE  )
            {
                $msg = '<span class="text-bold text-info">New school admin \''.$post['username'].'\' successfully added.</span>';
                $this->session->set_flashdata('pop',$msg);
// die(site_url( 'admin/schools/'.iencode($post['school_id']) ) );
                redirect( site_url( 'admin/schools/'.$post['school_id'] ) );
            }else{
                $this->db->where('user_id',$user_id);
                $this->db->delete('mt_faculties');

            }
        }
    }


    // private function _getYear($year_id){
    //   return   $this->db->where('id',$year_id)->get('mt_yearbooks')->row_array();
    // }



    
}