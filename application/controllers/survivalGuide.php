<?php

class SurvivalGuide extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->output->cache(137);
	}	
	function index()
	{	
		$data['index'] = $this->sg->get_index();
		$data['title'] = "Survival Guide";
		$data['content'] = "Yes, I am the content for Survival Guide";
		$this->load->view('survivalGuide_cover',$data);
		
	}	
	function get_content($index)
	{
		//echo $index;
		$data['index'] = $this->sg->get_index();
		$data['title'] = "Survival Guide";
		$data['content'] = $this->sg->get_content($index);
		$this->load->view('survivalGuide',$data);
	}
}
?>