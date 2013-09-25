<?php

class Faq extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('sg');
		if($this->session->userdata('users_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	

		$this->suvivalGuide();
		
	}	

	function suvivalGuide($index_id = 1)
	{
		$data['index_id'] = $index_id;
		$data['index'] = $this->sg->get_root_index();
		$data['content'] = $this->sg->get_content($index_id);
		$data['title'] = "Account Center";
		$data['page_title'] = "Suvival Guide:";
		$data['page_intro'] = "Suvival Guide information Update.";
		$this->load->view('manage/cssa_sg',$data);
	}
	function sg_update()
	{
		$dataArray = array(
			'content' => $this->input->post('content'),		
		);

		$id = $this->input->post('index');
		$this->sg->sg_update($id, $dataArray);
		redirect('manage/cssa/suvivalGuide/'.$id,'refresh');
		
	}

	function faq_type()
	{
		
	}
}
?>