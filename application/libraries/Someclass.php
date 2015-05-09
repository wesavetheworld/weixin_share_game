<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Someclass {

    public function some_function()
    {
    	$CI =& get_instance();
  		$CI->load->helper('url');
		$CI->load->library('session');
		$CI->config->item('base_url');   
		$newdata = array(   
                   'username'  => 'johndoe1111111111111',
                   'email'     => 'johndoe@some-site.com',
                   'logged_in' => TRUE
               );
		$CI->session->set_userdata($newdata);
		$data = $CI->session->all_userdata();
		var_dump($newdata);

    }
    
}

/* End of file Someclass.php */