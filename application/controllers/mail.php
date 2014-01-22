<?php

class Mail extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
	}

	function index()
	{
		$to_email = "zhouhao028841@gmail.com";
		$password = "123456";
		$this->load->library('parser');
		$this->load->library('email');
		$this->email->from('no-reply@wpilife.org', 'WPILIFE');
		$this->email->to($to_email); 
		$this->email->subject('Your Passcode has been reset | WPILIFE');

		$data = array(
			'email' 	=> $to_email,
			'password' 	=> $password,
			'year'		=> date('Y'),
			'baseUrl'	=> base_url(),
			'loginLink' => base_url() ."login/?account=".$to_email
			);
		$message = $this->parser->parse('templates/activationEmail', $data, TRUE);
		$this->email->message($message);	
		$this->email->send();
		echo $this->email->print_debugger();
	}

	
}
?>