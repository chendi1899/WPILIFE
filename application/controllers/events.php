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
				if($this->session->userdata('users_id') != null)
				{
					$voteID = $this->session->userdata('users_id');
					$data['IsVotedToday'] = $this->karaoke->Is_voted_for_this_singer_today($voteID, $singerID);
					$timeLeft = 3 - $this->karaoke->times_voting_today($voteID);
					$data['remain'] = "<br/><p>Voting times left of you: " . $timeLeft . "</p>";
				}
				
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
		$voterID = $this->session->userdata('users_id');
		$singerID = $this->input->post('singerID');
		if($voterID != null && $singerID != null && $this->karaoke->times_voting_today($voterID) < 3)
		{
			
			//var_dump($voterID);
			if($this->karaoke->Is_voted_for_this_singer_today($voterID, $singerID) == false)
			{
				$dataArray = array(
									'voterID'   => $voterID,
									'singerID' => $singerID,
									'date' 	   => date("Y-m-d"),
								  );
				$this->karaoke->voting($dataArray);
				redirect('events/singerInfo/'.$singerID,'refresh');
			}
			else
			{
				redirect('events/','refresh');
			}

			
							
			//var_dump($this->karaoke->times_voting_today($voterID));
		}
		else
		{
			redirect('events/','refresh');
		}

	}
	
}
?>