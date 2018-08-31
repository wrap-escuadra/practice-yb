<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


 class My_Controller extends CI_Controller
{
    /**
	 * Class Constructor
	 *
	 * @return	void
	 */
	function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = "YB+";
		$this->must_logged_in();
		$this->load->helper('my_helper');
		// echo '<pre>';
//		 debug( $this->session->all_userdata(),true );
		// echo '</pre>';
	}

   
   	public function debug($var,$die = FALSE){
   		echo '<pre>';
   		var_dump($var);
   		echo '</pre>';
   		if($die)die();
   	}

   	public function check_input($config_name,$file_name='form_validation') 
   	{

   		$this->load->config($file_name); //file is found application/config 
   		// if(empty($this->config->item($config_name) ) ) die('config name not definded');
		$this->form_validation->set_rules($this->config->item($config_name));

        if($this->input->is_ajax_request() ){
            if($this->form_validation->run()){
                return TRUE;
            }else{
                $input_error = array();

                foreach($this->config->item($config_name) as $cfg){
                    $input_error[] = array(
                        'error' => form_error($cfg['field']),
                        'type' => $cfg['type'],
                        'field' => $cfg['field']
                    );
                }
                $data['success'] = FALSE;
                $data['errors'] = $input_error;
                die(json_encode($data));

            }
        }else{
            return $this->form_validation->run();
        }

   	}
    public function msg_flash($msg,$type='info'){
        // $var = '<div  class="alert alert-'.$type.' fade in " >'.
        //         $msg.'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
        $var = '<p class="text-bold text-'.$type.'">'.$msg.'</p>';
        $this->session->set_flashdata('pop',$var);
    }

 	

	

	protected function must_ajax()
    {
        $this->input->is_ajax_request() OR show_404();
    }

	/**
	 * Return Clean Digits of Microtime
	 *
	 * @return	string
	 */
	protected function clean_microtime()
	{
		$microtime = explode(' ', microtime());
		return $microtime[1] . (substr($microtime[0], 1, strlen($microtime[0])));
	}

	/**
	 * Generate ID/Reference Number
	 *
	 * @return	string
	 */
	protected function long_id()
	{
		$long_id  = microtime();
        $long_id  = str_replace(' ', '', $long_id);
        $long_id  = str_replace('.', '', $long_id);

        return $long_id . rand(10000, 99999);
	}

	/**
	 * Return false if index 'id' is not presented in session it
     *    assume that there is no session data
	 *
	 * @return	bool
	 */
	protected function is_logged_in()
	{
		return $this->session->userdata('tempo_logged_in') != false OR $this->session->userdata('logged_in') != false;
	}

	/**
	 * Must logged in
	 *
	 * @return	bool [true=redirect to login, false=show 404 page]
	 */
	protected function must_logged_in($redirect = true)
	{
        if(! $this->is_logged_in())
		{
            // if($this->is_ajax_request())
            // {
            //     exit;
            // }

            $this->session->set_userdata('before_url', uri_string());

            if($redirect)
            {
                redirect(site_url('tempo/login'));
            }
            else
            {
                show_404();
            }
		}
	}
}

