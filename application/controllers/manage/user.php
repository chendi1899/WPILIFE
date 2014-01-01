<?php

class User extends CI_Controller 
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
		//$test = $this->input->post('comments', false);
		//echo $test;
		$this->form_validation->set_rules('firstName', 'users_firstname', 'required|xss_clean|max_length[32]');	
		$this->form_validation->set_rules('lastName', 'users_lastname', 'required|xss_clean|max_length[32]');
		$this->form_validation->set_rules('major', 'users_major', 'required|xss_clean|max_length[20]');	
		$this->form_validation->set_rules('university', 'users_graduate_university', 'required|xss_clean|max_length[64]');				
		$this->form_validation->set_rules('address', 'users_address', 'required|xss_clean|max_length[100]');	
		$this->form_validation->set_rules('hometown', 'users_city', 'required|xss_clean|max_length[40]');	
		$this->form_validation->set_rules('qq', 'users_qq', 'xss_clean|max_length[24]');
		$this->form_validation->set_rules('telephone', 'users_telephone', 'xss_clean|max_length[12]');	
		$this->form_validation->set_rules('gender', 'users_gender', 'required|xss_clean|max_length[1]');	
		$this->form_validation->set_rules('comment', 'users_description', 'required|xss_clean');	
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data = $this->users->get_user_info($this->session->userdata('users_id'));
			$data['title'] = "Account Center";
			$data['page_title'] = "Personal Info:";
			$data['page_intro'] = "Hey, just convince us you are coming from Earth. Because mom says it is too dangerous to live with aliens.";
			$data['show_form'] = 1;
			$this->load->view('manage/user',$data);
		}
		else // passed validation proceed to post success logic
		{	
			$dataArray = array(
					       	'users_firstname' => set_value('firstName'),
					       	'users_lastname' => set_value('lastName'),
					       	'users_major' => set_value('major'),
					       	'users_address' => set_value('address'),
					       	'users_graduate_university' => set_value('university'),
					       	'users_city' => set_value('hometown'),
					       	'users_qq' => set_value('qq'),
					       	'users_telephone' => set_value('telephone'),
					       	'users_gender' => set_value('gender'),
					       	'users_description' => set_value('comment'),
						);
			//print_r($dataArray);
			$this->users->user_info_update($dataArray, $this->session->userdata('users_id'));
			redirect('manage/user','refresh');
		}
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
			$this->load->view('manage/user',$data);
		}
		else // passed validation proceed to post success logic
		{
		 	$this->users->user_password_update(set_value('newPassword'), $this->session->userdata('users_id')); 
		 	redirect('manage/user/passwordModify?action=succeed','refresh');
		}
	}
	function oldPassord_check($str)
	{
		if($this->users->oldPassword_check($str, $this->session->userdata('users_id'))==true)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('oldPassord_check','Old password is wrong!');
			return false;
		}
		
	}
	function avatarModify()
	{
		$data['title'] = "Account Center";
		$data['page_title'] = "Avatar Modification:";
		$data['page_intro'] = "Wow, why not show us the most fresh you?!";
		$data['show_form'] = 3;
		$this->load->view('manage/user',$data);
	}
	function avatarUpdate()
	{
		$this->users->user_avatar_update($this->session->userdata('users_id'));
		redirect('manage/user/avatarModify','refresh');
	}
	
		
}
?>