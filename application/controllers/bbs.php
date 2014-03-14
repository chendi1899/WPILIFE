<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bbs extends CI_Controller {
	function __construct() {
 		parent::__construct();
 		$this->load->library("bbslib");
 		$this->load->library("paginationlib");
	}

	public function index($page = 1) {
		$pageSize = 50;
		$data['title'] = "BBS | WPILIFE";
		$data['page'] = $page;
		$data['list'] = $this->bbslib->getList($pageSize*($page-1), $pageSize);
		$listCount = $this->bbslib->getCount();
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'bbs/', $listCount, $pageSize);
		$this->load->view("bbs/index",$data);
	}

	public function search() {
		$keyword = $this->input->get('keyword');
		if($keyword == '' || $keyword == 'Search') redirect('bbs','refresh');
		$data['page'] = 1;
		$data['title'] = "BBS result for ".$keyword;
		$data['list'] = $this->bbslib->getListByKeyword($keyword);
		$data['pagination'] = "";
		$this->load->view('bbs/index',$data);
	}


}
