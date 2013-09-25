<?php

class Blog extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->library('users');
		if($this->session->userdata('users_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	

		$data = $this->users->get_user_info($this->session->userdata('users_id'));
		$data['title'] = "Account Center";
		$data['page_title'] = "Personal Info:";
		$data['page_intro'] = "Hey, just convince us you are coming from Earth. Because mom says it is too dangerous to live with aliens.";
		$data['show_form'] = 1;
		$this->load->view('manage/blog',$data);

	}
	function passwordModify()
	{			
		$this->form_validation->set_rules('oldPassword', 'oldPassword', 'required|xss_clean|max_length[40]');	
		$this->form_validation->set_rules('oldPassword', 'oldPassword', 'callback_oldPassord_check');		
		$this->form_validation->set_rules('newPassword', 'newPassword', 'required|xss_clean|max_length[40]|matches[newPasswordConfirm]');			
		$this->form_validation->set_rules('newPasswordConfirm'.'newPasswordConfirm','required|xss_clean|max_length[40]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			if($this->input->get('action', false) == 'succeed')
			{
				$data['page_intro'] = "<span style='color:blue;'>Password is modified successfully! =)<span>";
			}
			else
			{
				$data['page_intro'] = "It's a good habit to change your password regularly!";
			}
			$data['title'] = "Account Center";
			$data['page_title'] = "Password Modification:";
			
			$data['show_form'] = 2;
			$this->load->view('manage/blog',$data);
		}
		else // passed validation proceed to post success logic
		{
		 	$this->users->user_password_update(set_value('newPassword'), $this->session->userdata('users_id')); 
		 	redirect('user/passwordModify?action=succeed','refresh');
		}
	}

	function avatarModify()
	{
		$data['title'] = "Account Center";
		$data['page_title'] = "Avatar Modification:";
		$data['page_intro'] = "Wow, why not show us the most fresh you?!";
		$data['show_form'] = 3;
		$this->load->view('blog',$data);
	}
	function avatarUpdate()
	{
		$this->users->user_avatar_update($this->session->userdata('users_id'));
		redirect('manage/user/avatarModify','refresh');
	}
	
		
}
?>