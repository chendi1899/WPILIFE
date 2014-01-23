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


	function sendPasswordResetEmail($to_email, $hashStr)
	{
		$this->load->library('email');
		$this->load->library('parser');
		$this->email->from('no-reply@wpilife.org', 'WPILIFE');
		$this->email->to($to_email); 
		$this->email->subject('Your Passcode Reset Link | WPILIFE');

		$data = array(
			'email' 	=> $to_email,
			'year'		=> date('Y'),
			'baseUrl'	=> base_url(),
			'resetLink' => base_url() ."login/passwdReset/".$hashStr
			);
		$message = $this->parser->parse('templates/passwordResetEmail', $data, TRUE);
		$this->email->message($message);	
		$this->email->send();
		
	}

	function forgetPassword()
	{
		$data['title'] = "Password Recovery| WPILIFE";
		$this->load->view('base/forgetPassword',$data);
	}

	function passwordRecovery()
	{
		$email = $this->input->post('email');
		$email = trim($email);

		$today = date('Ymd');
		$randString = random_string('alnum', 8);
		$extraAuth = $email.do_hash($today, 'md5').$randString;
		$hashStr = do_hash($extraAuth, 'md5');

		$dataArray= array(
				'random_string' => $randString,
				'extra_field'	=> $hashStr
			);
		if($this->users->userPasswdInfoUpdate($dataArray, $email) == 1){
			$this->sendPasswordResetEmail($email, $hashStr);

			$data['title'] = "Password Reset Link | WPILIFE";
			$data['info'] = "New password reset link has been sent to your email, please have a check!<br/>Have fun :-)";
			$this->load->view('templates/msgDisplay',$data);
		} else {
			echo "<script>alert('No account for this email!');</script>";
			echo "<script>window.location.href = '".base_url()."login/forgetPassword/';</script>";
		}

		
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
	}

	function passwdReset($hashStr){
		list($email, $user_id) = $this->users->hashStrCheckAndReturnEmail($hashStr);
		if($email){

			$data['title'] = "Password Reset| WPILIFE";
			$data['hashStr'] = $hashStr;
			$data['email'] = $email;
			$data['user_id'] = $user_id;
			$this->load->view('base/forgetReset',$data);
			//echo $email . " " .$user_id;
		} else {
			switch ($user_id) {
				case '2':
					$data['info'] = "You password reset link is expired!";
					break;

				default:
					$data['info'] = "You password reset link is wrong!";
					break;
			}
			$data['title'] = "Error Link | WPILIFE";
			$this->load->view('templates/msgDisplay',$data);
		}
	}

	function reset(){
		$code = $this->input->post('code');
		$newPasswd = $this->input->post('newpasswd');
		$cfmPasswd = $this->input->post('cfmpasswd');

		if($newPasswd != $cfmPasswd){
			echo "<script>alert('Passwords are not the same!');</script>";
			echo "<script>window.location.href = '".base_url()."login/passwdReset/".$code."';</script>";
		} else {
			$user_id = $this->input->post('id', TRUE);
			$email = $this->input->post('email');

			$salt = $this->config->item('encryption_key');
			$tmp = do_hash($newPasswd, 'md5'); 
			$passwordMD5 = do_hash($salt.$tmp, 'md5'); 

			$dataArray = array(
				'users_password'=>$passwordMD5,
				'extra_field' 	=> ''
				);
			$this->users->userPasswordUpdate($dataArray, $user_id, $email);

			$data['title'] = "Password Reset Successfully | WPILIFE";
			$data['info'] = "Your password has been updated successfully!";
			$this->load->view('templates/msgDisplay',$data);
		}

	}
}
?>