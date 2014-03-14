<?php

class Bbs extends CI_Controller {
               
	function __construct() {
 		parent::__construct();
		$this->load->library('bbslib');
		if($this->session->userdata('users_id') == null) redirect('','refresh');
	}	

	function index() {	
		$this->load->view('bbs/add');
	}

	function add() {
		$dataArray = array(
			'user_id'				=> $this->session->userdata('users_id'),
			'bbs_title' 			=> $this->input->post('bbs_title'),
			'bbs_text' 				=> $this->input->post('content'),
			'bbs_time' 				=> date("Y-m-d H:i:s")
		);
		$this->bbslib->add($dataArray);
		redirect('manage/bbs/myList','refresh');

		
	}
	
	function myList() {
		$data['list'] = $this->bbslib->getBBSListByUserID($this->session->userdata('users_id'));
		$this->load->view('bbs/list', $data);
	}

	function update($id) {
		if(is_numeric($id)) {
			$data['bbs'] = $this->bbslib->getBBSByTwoID($id, $this->session->userdata('users_id'));
			if($data['bbs'] != false) {
				$this->load->view('bbs/update',$data);
			} else {
				redirect('manage/bbs/myList','refresh');
			}
		} else {
			redirect('manage/bbs/myList','refresh');
		}
	}

	function updates() {
		$bbs_id = $this->input->post('bbs_id');
		$dataArray = array(
			'bbs_title' 			=> $this->input->post('bbs_title'),
			'bbs_text' 				=> $this->input->post('content')
		);
		$this->bbslib->update($bbs_id, $this->session->userdata('users_id'), $dataArray);
		redirect('manage/bbs/update/'.$bbs_id,'refresh');
	}
	
	
	function delete($bbs_id) {
		if(is_numeric($bbs_id)) {
			$dataArray = array('bbs_id' => $bbs_id, 'user_id' => $this->session->userdata('users_id'));
			$this->db->delete('bbs', $dataArray);
		}
		redirect('manage/bbs/myList','refresh');
	}

	function close($bbs_id) {
		$dataArray = array('isDelete' => 0);
		$this->bbslib->bbs_update($bbs_id, $this->session->userdata('users_id'), $dataArray);
		redirect('manage/bbs/myList','refresh');
	}

	function open($bbs_id) {
		$dataArray = array('isDelete' => 1);
		$this->bbslib->bbs_update($bbs_id, $this->session->userdata('users_id'), $dataArray);
		redirect('manage/bbs/myList','refresh');
	}
}
?>