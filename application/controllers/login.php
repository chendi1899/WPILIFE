<?php

class Login extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->library('users');
	}	
	function index()
	{					
		$this->form_validation->set_rules('users_email_address', 'users_email_address', 'valid_email|max_length[96]');				
		$this->form_validation->set_rules('users_password', 'users_password', 'required|xss_clean|max_length[40]');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data['title'] = "WPILIFE | EXTEND YOUR LIFE IN WPI";
			$data['show_form'] = true;
			$this->load->view('login',$data);
		}
		else // passed validation proceed to post success logic
		{
			$password = do_hash(set_value('users_password'), 'md5'); // MD5
			$form_data = array(
					       	'users_email_address' => set_value('users_email_address'),
					       	'users_password' => $password
						);
			$this->users->generate_session($form_data);

			redirect(base_url(),'refresh');
		}
	}
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
	function logout()
	{
		$this->session->sess_destroy();
		$data['title'] = "WPILIFE | EXTEND YOUR LIFE IN WPI";
		$data['show_form'] = false;
		$data['info'] = "Thank you!<br/> You are logout now!";
		$this->load->view('login',$data);
	}
	
}
?>