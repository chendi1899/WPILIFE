<?php

class CaptchaCodeRefresh extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('captchalib');
	}

	function index()
	{	
		$data['captcha'] = $this->captchalib->generateCaptchaCode();
		$this->session->set_userdata('captcha', $data['captcha']['word']);
		echo $data['captcha']['image'];
	}

	
		
}
?>