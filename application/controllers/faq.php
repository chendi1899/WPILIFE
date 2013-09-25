<?php

class Faq extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
	}	
	function index()
	{	
		$data['title'] = "FAQ";
		$data['content'] = "Yes, I am the content for FAQ";
		$data['faq'] = $this->faqlib->get_faq();
		$this->load->view('faq',$data);
		
	}
	function filter($type = '')
	{
		$type =  $this->security->xss_clean($type);
		$data['title'] = "FAQ";
		$data['content'] = "Yes, I am the content for FAQ";
		$data['faq'] = $this->faqlib->get_faq_by_type($type);
		$this->load->view('faq',$data);
	}
}
?>