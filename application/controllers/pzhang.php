<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pzhang extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('bloglib');
	}
	public function index()
	{
		$data['title'] = "WPILIFE | EXTEND YOUR LIFE IN WPI";
		$data['sentence']="nihao, today is 9/11/2013";
		$this->load->view('nihao',$data);
	}
	
}