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
		
	}
	
}
?>