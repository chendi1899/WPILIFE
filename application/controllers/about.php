<?php

class About extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
	}	
	function index()
	{	
		
		$this->website();
		
	}
	function cssa()
	{
		$data['title'] = "About CSSA";
		$data['content'] = "Yes, I am the content for About CSSA";
		$this->load->view('about/cssa',$data);
	}
	function website()
	{
		$data['title'] = "About Website";
		$data['content'] = "Yes, I am the content for About Website";
		//$data['country'] = $this->sg->get_country();
		$this->load->view('about/website',$data);
	}	
	function us()
	{
		$data['title'] = "About Us";
		$data['content'] = "Yes, I am the content for About Us";
		$this->load->view('about/us',$data);
	}		
}
?>