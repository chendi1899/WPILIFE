<?php
class Error404 extends CI_Controller
{
	function index()
	{
		$this->output->set_status_header('404');
		$this->load->view('error_404');
	}
}