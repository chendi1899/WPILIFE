<?php

class Sponsor extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
	}	
	function index()
	{	
		$data['index'] = $this->sponsorlib->get_index();

		$data['title'] = "Sponsor";
		$data['content'] = "<h1>Yes, I am the content for sponsor Cover page</h1>";
		$this->load->view('cssa/sponsor',$data);
		
	}

	function get_content($index)
	{
		//echo $index;
		$data['index'] = $this->sponsorlib->get_index();
		$data['title'] = "Sponsor";
		$data['content'] = $this->sponsorlib->get_content($index);
		$this->load->view('cssa/sponsor',$data);
	}
		
	
}
?>