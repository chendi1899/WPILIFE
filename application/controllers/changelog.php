<?php
class Changelog extends CI_Controller 
{
	function __construct()	{
 		parent::__construct();
	}	
	function index(){
		$this->load->library("changeloglib");
		$data['changelog'] = $this->changeloglib->getAll();
		$this->load->view('base/changelog',$data);
	}	
}
?>