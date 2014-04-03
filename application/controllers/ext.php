<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ext extends CI_Controller  {
	function __construct() {
 		parent::__construct();
 		$this->load->library('paginationlib');
	}

	function index() {
		$this->job();
	}

	function job($id = 0) {
		if(!is_numeric($id) || $id == 0){
			$data['title'] = "Job Opportunity";
			$data['job_list'] = $this->joboppolib->get_job_opportunity_list(true, 0, 20);
			$this->load->view('job/index',$data);
		} else {
			$data['title'] =  $this->joboppolib->get_job_name_by_id($id);
			$data['job'] = $this->joboppolib->get_job_opportunity_by_ID($id);
			$this->load->view('job/detail',$data);
		}
	}
	
	function jobType($id = 0){
		if(!is_numeric($id) || $id == 0) redirect('ext/job','refresh');

		$data['title'] = $this->joboppolib->get_type_name_by_id($id);
		$listCount = $this->joboppolib->get_job_opportunity_count_by_type($id);
		$data['job_list'] = $this->joboppolib->get_job_opportunity_list_by_type(true, 0, $listCount, $id);
		$this->load->view('job/index',$data);
	}
}
?>