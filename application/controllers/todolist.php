<?php

class Todolist extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('imglib');
	}	
	function index()
	{	
		
		$data['title'] = "To Do List";
		$this->load->view('todolist',$data);
		
	}

	function imageTest()
	{
		//$this->image_lib->clear();
		//$config['image_library'] = 'imagemagick';
		/*
		$config['source_image']	= $_SERVER['DOCUMENT_ROOT'].'/images/shop/test.jpg';
		$config['x_axis'] = 1;
		$config['y_axis'] = 1;
		$config['maintain_ratio'] = FALSE;
		$config['new_image'] = $_SERVER['DOCUMENT_ROOT'].'/images/shop/test1.jpg';
		$config['width'] = 150;
   		$config['height'] = 150;	
		$this->load->library('image_lib', $config); 
		$this->image_lib->initialize($config);

		if ( ! $this->image_lib->crop())
		{
		    echo $this->image_lib->display_errors();
		}
		else
		{
			echo base_url().'images/shop/test.jpg';
		}
		*/
		$this->imglib->createThumb('/images/shop/','test.jpg');
		
	}
	
}
?>