<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docs extends CI_Controller {
	function __construct() {
 		parent::__construct();
 		$this->load->library('docslib');
	}

	public function index() {
		$this->api();
	}

	public function api($id = 1){
		$data['title'] = "API document  | WPILIFE";
		$id =  $this->security->xss_clean($id);
		$content = $this->docslib->getContent($id);
		
		if($content){
			$data['api'] = $content;
			$data['list'] = $this->docslib->getTitleList();
			$this->load->view('docs/api',$data);
		} else {
			redirect('docs/api','refresh');
		}
	}

}
