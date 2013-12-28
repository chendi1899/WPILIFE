<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		date_default_timezone_set('America/New_York');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->model('contact_model');
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'email', 'valid_email|max_length[96]');				
		$this->form_validation->set_rules('name', 'name', 'xss_clean|max_length[40]');			
		$this->form_validation->set_rules('comments'.'comments','required|xss_clean');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data['title'] = "Contact Us | EXTEND YOUR LIFE IN WPI";
			$data['display'] = "none";
			$this->load->view('contact',$data);
		}
		else 
		{
			$form_data = array(
					       	'name' => set_value('name'),
					       	'email' => set_value('email'),
					       	'comment' => $this->input->post('comments', TRUE),
					       	'date' => date("Y-m-d H:i:s"),
						);
			// run insert model to write data to db
			//die($form_data['comment']);
			if ($this->contact_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				$this->send_email($form_data);
				$data['title'] = "Thanks for your comment | EXTEND YOUR LIFE IN WPI";
				$data['display'] = "block";
				$this->load->view('contact',$data);
			}
			else
			{
				echo "Comment failed";
			}
		}
		
	}
	function send_email($form_data)
	{
		//https://exchange.wpi.edu/owa/
		$this->email->from('zhouhao@wpilife.org', 'WPILIFE');
		$this->email->to('wpilife@gmail.com'); 
		$this->email->subject('Comments | WPILIFE');
		$message = "Hi my Lord,<br/>
					Comment is coming as below:<br/>
					-----------------------------------------------<br/>
					From ".$form_data['name']."(".$form_data['email'].") <br/>
					Comment:<br/>" .
					$form_data['comment'].
					"
					<br/>
					-----------------------------------------------<br/><br/>
					Do not make our users wait!<br/>=)";
		$this->email->message($message);	
		$this->email->send();
	}
	//function 
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */