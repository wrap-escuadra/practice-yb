<?php 

function input_prep($string){ //use to handle inputs before going to database
    if(is_array($string)){
        foreach ($string as $key => $value) {
             $string[$key] = clean_string($value);
        }
    }else{
        $string = clean_string($string);
    }
   
   return $string;
    
}


function clean_string($string){
    $string = trim($string);
    $string = str_replace("'", "''", $string);
    return $string;
}

function mysql_date($date,$fs = "-"){ //formatting date for mysql
    return date('Y'.$fs.'m'.$fs.'d',strtotime($date) );
}

function iencode($string){
        // return base64_encode($text .'jaskdjfklsdj');
        // return base64_encode(ASIN.$text.ASIN);
        // return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        $secret_key = ASIN;
    $secret_iv = ENC_IV;
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    return $output;
    }

function idecode($encrypted_text){
    // $decrypted_id_raw = base64_decode($encrypted_text);
    // return preg_replace(sprintf('/%s/', ASIN), '', $decrypted_id_raw);
    // return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));

    $secret_key = ASIN;
    $secret_iv = ENC_IV;
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    return $output;
}
function school_status($status=null){
    $ci = get_instance();
    // echo $status;
    if($status != null){
        $ci->db->where('id',$status);
        $q = $ci->db->get('lu_school_status');
        return $q->row_array();
    }else{
        return $ci->db->get('lu_school_status')->result_array();
    }
}

function debug($data,$die=FALSE){
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
    if($die){
        die();
    }
}


function set_popmsg($msg)
{
    $ci = get_instance();
    $ci->session->set_flashdata('pop',$msg);
}

 ?>