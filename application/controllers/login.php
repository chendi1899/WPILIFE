<?php

class Login extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
		$this->load->database();
	}

	function index()
	{
		if($this->session->userdata('users_id') != null)
		{
			redirect('','refresh');
		}

		$data['title'] = "Login | WPILIFE";
		$data['account'] = $this->input->get("account");
		$data['ref'] = str_replace('logout', '', $this->input->get("ref"));
		$this->load->view('login',$data);
	}

	function submit()
	{
		$ref = $this->input->post("ref");
		$email = trim($this->input->post('users_email_address'));
		// generate password
		$salt = $this->config->item('encryption_key');
		$password = $this->input->post('users_password');
		$tmp = do_hash($password, 'md5');
		$passwordMD5 = do_hash($salt.$tmp, 'md5'); // MD5

		$this->users->login($email, $passwordMD5);
		if($this->session->userdata('users_id') != null)
		{
			redirect($ref,'refresh');
		}
		else
		{
			echo "<script>alert('Email or Password Error! =(');</script>";
			echo "<script>window.location.href = '".base_url()."login/?ref=".$ref."';</script>";
		}
	}

	// This function is not used in my new version
	// And I will send the user the password through email
	function activation($activation_string)
	{
		$data['title'] = 'WPILIFE';
		$data['show_form'] = false;
		$param = explode("_", $activation_string);
		$email = $param[0];
		$password = $param[1];
		$query = $this->db->query("SELECT users_id 
								   FROM users 
								   WHERE users_email_address = '". $email ."' and 
								   		 users_password = '". $password ."'");

		if ($query->num_rows() > 0)
		{
			$query = $this->db->query("UPDATE users 
								   	   SET users_activated = 1 
								   	   WHERE users_email_address = '". $email ."'");
			$data['info'] = "Your account has beem activated! Now, click here to <a href='http://wpilife.org/login'>login</a>";
		}
		else
		{
			$data['info'] = "Sorry, it seems that the actvation link is wrong. If you have any question, please contact wpilife@gmail.com";
		}
		$this->load->view('login',$data);
		
	}

	function forgetPassword()
	{
		$data['title'] = "Password Recovery| WPILIFE";
		$this->load->view('base/forgetPassword',$data);
	}

	function passwordRecovery()
	{
		$salt = $this->config->item('encryption_key');
		$password = random_string('alnum', 8);
		$tmp = do_hash($password, 'md5');
		$passwordMD5 = do_hash($salt.$tmp, 'md5'); // MD5

		$email = $this->input->post('email');
		$email = trim($email);

		// update new password into database
		$this->users->passwordUpdatebyEmail($email, $passwordMD5);

		$this->sendPasswordRecoveryEmail($email, $password);

		$data['title'] = "Password Recovery | WPILIFE";
		$data['info'] = "New password has been sent to your email, please have a check!<br/>Have fun :-)";
		$this->load->view('templates/msgDisplay',$data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		$data['title'] = "Logout | WPILIFE";
		$data['info'] = "Thank you!<br/> You are logout now!";
		$this->load->view('templates/msgDisplay',$data);
	}
	
	function sendPasswordRecoveryEmail($to_email, $password)
	{
		$this->load->library('parser');
		$this->load->library('email');
		$this->email->from('no-reply@wpilife.com', 'WPILIFE');
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
		
	}
}
?>