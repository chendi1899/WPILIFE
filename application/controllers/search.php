<?php

class Search extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('searchlib');
	}	
	function index()
	{	
		
		$this->cssa();
	}
	function cssa()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('','refresh');
		}
		$data['title'] = "Search CSSA Issues for <span style='color:#169fe6;'> ".$keyword." </span>";
		$data['list'] = $this->searchlib->get_list_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('search',$data);
	}
	
}
?>