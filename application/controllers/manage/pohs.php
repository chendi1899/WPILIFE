<?php

class Pohs extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->helper('form');
		if($this->session->userdata('users_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	

		
		$this->load->view('manage/wpilife_pohs_add');
		
	}	

	function add()
	{
		$dataArray = array(
			'blogs_type'		=> $this->input->post('blogs_type'),
			'blogs_title' 		=> $this->input->post('blogs_title'),
			'blogs_content' 	=> $this->input->post('content'),
			'blogs_author'		=> $this->session->userdata('users_id'),
			'blogs_year'		=> date("Y"),
			'blogs_month'		=> date("F"),
			'blogs_day'			=> date("d"),
			'blogs_date' 		=> date("Y-m-d H:i:s"),
		);
		$this->bloglib->blog_add($dataArray);
		redirect('manage/pohs/myList','refresh');
	}

	function myList()
	{
		$data['list'] = $this->bloglib->get_blog_by_userID($this->session->userdata('users_id'), 'BUY');
		//print_r($data['list']);
		$this->load->view('manage/wpilife_pohs', $data);
	}

	function item_update($id)
	{
		if(is_numeric($id))
		{
			$data['product'] = $this->bloglib->get_blog_by_two_ID($id, $this->session->userdata('users_id'));
			//print_r($data['product']);
			$this->load->view('manage/wpilife_pohs_update',$data);
		}
	}

	function item_updates()
	{
		$blogs_id = $this->input->post('blogs_id');
		$dataArray = array(
			'blogs_title' 		=> $this->input->post('blogs_title'),
			'blogs_content' 	=> $this->input->post('content'),
		);
		
		$this->bloglib->blog_update($blogs_id, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}
	
	
	function item_delete($blogs_id)
	{
		if(is_numeric($blogs_id))
		{
			$dataArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
			$this->db->delete('blogs', $dataArray);
		}
		redirect('manage/pohs/myList','refresh');
	}

	function item_close($blogs_id)
	{
		$whereArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
		$dataArray = array('blogs_available' => 0);
		$this->bloglib->blog_available($whereArray, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}

	function item_open($blogs_id)
	{
		$whereArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
		$dataArray = array('blogs_available' => 1);
		$this->bloglib->blog_available($whereArray, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}

}
?>