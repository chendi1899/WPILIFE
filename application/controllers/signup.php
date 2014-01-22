<?php

class Signup extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('captchalib');
		$this->load->library('email');
		$this->load->library('parser');
	}	
	function index()
	{	
		$data['title'] = "Sign Up | WPILIFE";
		$data['captcha'] = $this->captchalib->generateCaptchaCode();
		$this->session->set_userdata('captcha', $data['captcha']['word']);
		$this->load->view('signup',$data);
	}

	function submit()
	{
		// generate password
		$salt = $this->config->item('encryption_key');
		$password = random_string('alnum', 8);
		$tmp = do_hash($password, 'md5'); 
		$passwordMD5 = do_hash($salt.$tmp, 'md5'); 

		// add this tuple into database
		$captcha =intval(trim($this->input->post('captcha')));
		if($captcha == $this->session->userdata('captcha'))
		{
			$email = trim($this->input->post('users_email_address'));
			if($this->isEmailValid($email))
			{
				$userDataArray = array(
						'users_email_address' 	=> $email,
						'users_firstname' 		=> $this->input->post('users_firstname'),
						'users_lastname' 		=> $this->input->post('users_lastname'),
						'users_password' 		=> $passwordMD5,
						);

				$this->users->addNewUser($userDataArray);

				// send passcode to costomer
				$this->sendPasswordEmail($email,$password);
				$data['title'] = "Sign Up successfully | WPILIFE";
				$data['info'] = "Succeed<br/>The password has been sent to your email";
			}
			else
			{
				$data['title'] = "Sign Up failed | WPILIFE";
				$data['info'] = "Failed<br/>Email is not valid!";
			}
		}
		else
		{
			$data['title'] = "Sign Up failed | WPILIFE";
			$data['info'] = "Failed<br/>Captcha code is wrong!";
		}
		$this->session->unset_userdata('captcha');

		$this->load->view('templates/msgDisplay',$data);
		
	}

	function isEmailValid($email)
	{
		$this->load->helper('email');
		$email_subfix = explode("@", $email);

		//check whether it is a wpi email address
		if($email_subfix[1] == 'wpi.edu')
		{
			if (valid_email($email) && !$this->users->isEmailDuplicated($email))
			{
				return true;
			}
		}
		return false;
	}

	function sendPasswordEmail($to_email, $password)
	{
		$this->load->library('parser');
		$this->email->from('no-reply@wpilife.org', 'WPILIFE');
		$this->email->to($to_email); 
		$this->email->subject('Your Passcode Has Been Set | WPILIFE');

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
		
	}
		
}
?>