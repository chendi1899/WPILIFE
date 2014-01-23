<?php

class Todolist extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
	}	
	function index()
	{	
		
		$data['title'] = "To Do List";
		$this->load->view('todolist',$data);
		
	}	
}
?>