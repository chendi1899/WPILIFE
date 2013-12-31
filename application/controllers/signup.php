<?php

class Signup extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		date_default_timezone_set('America/New_York');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->model('signup_model');
		$this->load->library('parser');
	}	
	function index()
	{	
		$this->form_validation->set_rules('users_email_address', 'users_email_address', 'valid_email|max_length[96]');	
		$this->form_validation->set_rules('users_email_address', 'users_email_address', 'callback_email_check');				
		$this->form_validation->set_rules('users_password', 'users_password', 'required|xss_clean|max_length[40]|matches[users_password_confirm]');			
		$this->form_validation->set_rules('users_password_confirm'.'users_password_confirm','required|xss_clean|max_length[40]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data['title'] = "WPILIFE";
			$data['show_form'] = true;
			$this->load->view('signup',$data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			$password = do_hash(set_value('users_password'), 'md5'); // MD5
			$form_data = array(
					       	'users_email_address' => set_value('users_email_address'),
					       	'users_password' => $password
						);
			$this->send_actvation_email(set_value('users_email_address'), $password);

			
			$data['title'] = "Activate your account";

			// run insert model to write data to db
			
			if ($this->signup_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				$data['title'] = "WPILIFE";
				$data['show_form'] = false;
				$this->load->view('signup',$data);
				//redirect(base_url().'signup/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
	///
	// Now user can only register with email @ wpi.edu 
	//
	function email_check($str)
	{
		//return true;

		$emai_subfix = explode("@", $str);
		//check whether it is a wpi email address
		if($emai_subfix[1] != 'wpi.edu')
		{
			$this->form_validation->set_message('email_check','Only WPI email supported now');
			return false;
		}
		else //check whether this email has been registered or not
		{
			$duplicated_email_check_sql = " SELECT COUNT( * ) AS count
											FROM  `users` 
											WHERE  `users_email_address` =  '". $str. "' ";
			$duplicated_count = $this->db->query($duplicated_email_check_sql);	
			foreach($duplicated_count->result() as $row)		
			{
				if($row->count > 0) 
				{
					$this->form_validation->set_message('email_check','This email has already been registered!');
					return false;
				}
				else
				{
					return true;
				}
				
			}						
			
		}
	}
	function send_actvation_email($to_email, $password_md5)
	{
		//https://exchange.wpi.edu/owa/
		$this->email->from('zhouhao@wpilife.org', 'WPILIFE');
		$this->email->to($to_email); 
		$this->email->subject('Activate You Account Now | WPILIFE');

		$data = array(
            'email' => $to_email,
            'activationLink' => base_url() ."login/activation/".$to_email."_".$password_md5
            );
		$message = $this->parser->parse('templates/activationEmail', $data, TRUE);

		$this->email->message($message);	
		$this->email->send();
		/*
		echo $this->email->print_debugger();
		die("");
		*/
	}
		
}
?>