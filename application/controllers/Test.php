<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller{

	function __construct(){
		parent:: __construct();
	}
	public function index()
	{
		

		
        $this->file_upload();


		$this->load->view('includes/head',$this->data);
		$this->load->view('test/fileinput_view');

		$this->load->view('includes/footer');

	}




	private function file_upload()
	{
		if( count($_FILES['userfile']['size'])  > 0 ){
			
			$count =  count($_FILES['userfile']['size'] );
			$config = array(
	            // 'upload_path' => base_url('assets/_uploads/'),
		            'upload_path' => './assets/_uploads/',
		            'allowed_types' => 'gif|jpg|png|jpeg',
		            'max_size' => '2000',
		            'overwrite'  => FALSE,
		            'remove_spaces' =>  TRUE,
		        );
	        $this->load->library('upload',$config);
	        echo $config['upload_path'];
			// $num_of_files = count($_FILES) ;
			// debug(count($_FILES) );
	        foreach($_FILES as $key=>$value) :
				for($s=0; $s<=$count-1; $s++) {
					$_FILES['userfile']['name'] =$value['name'][$s];
			        $_FILES['userfile']['type']  = $value['type'][$s];
			        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
			        $_FILES['userfile']['error']  = $value['error'][$s];
			        $_FILES['userfile']['size']  = $value['size'][$s];

			        if($this->upload->do_upload()){
			        	echo '<h1> test</h1>';
			        }else{
			        	echo  $this->upload->display_errors();
			        }
				}
			endforeach;

		}
	}

	public function modal(){
		$this->load->view('includes/head',$this->data);
		$this->load->view('test/modal_view');
		$this->load->view('includes/footer');
	}


	public function bootstrap_select(){

		$this->data['courses'] = $this->db->get('mt_courses')->result_array();
		$this->load->view('includes/head',$this->data);
		$this->load->view('test/bs_select');
		$this->load->view('includes/footer');
	}

	public function lightbox()
	{
		$this->data['courses'] = $this->db->get('mt_courses')->result_array();
		$this->load->view('includes/head',$this->data);
		$this->load->view('test/lightbox');
		$this->load->view('includes/footer');
	}


	public function froala(){

		$this->load->view('includes/head',$this->data);
		$this->load->view('test/lightbox');
		$this->load->view('includes/footer');
	}

	public function textio()
	{
		if($this->input->post())
		{
			// var_dump(htmlspecialchars($this->input->post('io')));
			$data = [
				'value' => $this->input->post('io')
			];

			$this->db->insert('textio',$data);
			// echo 'Save successful';
		}
		$data['texts'] = $this->db->get('textio')->result_array();

		$this->load->view('test/textio',$data);
	}

}
