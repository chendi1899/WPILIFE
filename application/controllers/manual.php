<?php

class Manual extends CI_Controller {
               
	function __construct(){
 		parent::__construct();
 		$this->load->library('manuallib');
	}	

	function index($id = 1){	
		$id =  $this->security->xss_clean($id);
		$content = $this->manuallib->getContent($id);
		
		if($content){
			$data['content'] = $content['text'];
			$data['title'] = $content['title']." | Manual";
			$data['head'] = $content['title'];
		} else {
			$data['content'] = "<h1>:(</h1><br/>No Content for this Item!";
			$data['title'] = "404 | Manual";
			$data['head'] = "404 Not Found";
		}

		$data['title'] = $content['title']." | Manual";
		$data['head'] = $content['title'];
		$data['list'] = $this->manuallib->getTitleList();
		$this->load->view('base/manual',$data);
	}
	
}
?>