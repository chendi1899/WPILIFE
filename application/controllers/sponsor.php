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

		$data['title'] = "Sponsor | WPI CSSA";
		$this->load->view('cssa/sponsor_cover',$data);
		
	}

	function get_content($index)
	{
		//echo $index;
		$data['index'] = $this->sponsorlib->get_index();
		$data['title'] = "Sponsor | WPI CSSA";
		$data['content'] = $this->sponsorlib->get_content($index);
		$this->load->view('cssa/sponsor',$data);
	}
		
	
}
?>