<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hzhou extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
	}
	public function index()
	{
		$data['title'] = "hzhou | WPILIFE";
		$data['string'] = "This is a test string!";
		$data['info']= "I am from CS!";
		$this->load->view('hzhou',$data);
	}


	public function showinfo($var="")
	{
		j
		$data['title'] = "hzhou's info | WPILIFE";
		$data['string'] = "This is a test string!";
		$data['array'] = array(
				'name' => 'Hao',
				'gender' => "male",
		);
		$data['info']= $var;
		$this->load->view('hzhou',$data);
	}
	
}