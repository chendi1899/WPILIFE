<?php

class Events extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('Karaoke');
 		$this->load->helper('form');
	}	
	function index()
	{	
		$data['singers'] = $this->karaoke->get_distinct_singerID_with_vote_count();
		//var_dump($data['singers']);
		$this->load->view('events/karaoke',$data);
		
	}
	
	function singerInfo($singerID = 0)
	{
		$voteID = $this->session->userdata('users_id');
		if($singerID < 1)
		{
			redirect('events/','refresh');
		}
		else
		{
			$data['singer'] = $this->karaoke->get_singer_info($singerID);
			if($data['singer'])
			{
				//var_dump($data['singer']);
				$data['count'] = $this->karaoke->get_voting_count($singerID);
				$data['remain'] = 3 - $this->karaoke->times_voting_today($voteID);
				$this->load->view('events/personalDes',$data);
			}
			else
			{
				redirect('events/','refresh');
			}
			
		}
		
	}

	function voting()
	{
		if($this->session->userdata('users_id') != null)
		{
			$voteID = $this->session->userdata('users_id');
			var_dump($voteID);
			$singerID = $this->input->post('singerID');
			//'blogs_date' 	=> date("Y-m-d H:i:s"),
			/*
			$dataArray = array(
						'blogs_title' 	=> $this->input->post('blogs_title', TRUE),
						'blogs_content' => $this->input->post('content', TRUE),
						'blogs_year'	=> date("Y"),
						'blogs_month'	=> date("F"),
						'blogs_day'		=> date("d"),
						'blogs_date' 	=> date("Y-m-d H:i:s"),
						'blogs_author' 	=>$this->session->userdata('users_id'),
							);
							*/ 
			var_dump($this->karaoke->times_voting_today($voteID));
		}
		else
		{
			redirect('events/','refresh');
		}

	}
	
}
?>