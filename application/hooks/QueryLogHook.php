<?php 


/**
change hook config/config.php
$config['enable_hooks'] = FALSE; -> TRUE

---------------------------------------
ADD THE FF LINE IN hook/hooks.php

$hook['post_system'][] = array(
        'class' => 'QueryLogHook',
        'function' => 'log_queries',
        'filename' => 'QueryLogHook.php',
        'filepath' => 'hooks'
        );
---------------------------------------
**/
class QueryLogHook {

    function log_queries() {    
        $CI =& get_instance();
        $times = $CI->db->query_times;
        $dbs    = array();
        $output = NULL;     
        $queries = $CI->db->queries;

        if (count($queries) == 0)
        {
            $output .= $CI->db->last_query()."--no queries\n";
        }
        else
        {
            foreach ($queries as $key=>$query)
            {
                $output .= $query . "\n";
            }
            $took = round(doubleval($times[$key]), 3);
            $output .= "----------------[took:{$took}]------------------------\n\n";
        }
        // die(APPPATH  . "/logs/queries.log.txt");
        $CI->load->helper('file');
        if ( ! write_file(APPPATH  . "/logs/querylogs_".date('Y-m-d').".txt", $output, 'a+'))
        {
             log_message('debug','Unable to write query the file');
        }   
    }

}