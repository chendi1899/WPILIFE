<?php

class Sponsor extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
	}	
	function index()
	{	
		
		$data['title'] = "Sponsor";
		$data['content'] = "Yes, I am the content for About sponsor";
		$this->load->view('cssa/sponsor',$data);
		
	}
	
		
	
}
?>