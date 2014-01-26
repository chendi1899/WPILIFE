<?php

class Bonus extends CI_Controller {
               
	function __construct()	{
 		parent::__construct();
 		$this->load->library('bonuslib');
	}

	function index($hashCode = '') {	
		$hashCode = trim($hashCode);
		if($hashCode == ''){
			redirect('bonus/add','refresh');
		} else {
			$data['title'] = "Love U Forver";
			$data['love'] = $this->bonuslib->getLover($hashCode);
			$this->load->view('bonus/bonus',$data);
		}
	}

	function add(){
		$data['title'] = "Love U Forver";
		$this->load->view('bonus/addLover',$data);
	}

	function submit(){
		$boy 	= $this->input->post('boyName', TRUE);
		$girl	= $this->input->post('girlName', TRUE);
		$from	= $this->input->post('from', TRUE);
		$to		= $this->input->post('to', TRUE) ;
		$crtTime =  time();

		$hashCode =  do_hash($boy.$girl.$from.$to.$crtTime, 'md5'); // MD5

		$dataArray = array(
			'boy' 		=> $boy,
			'girl' 		=> $girl,
			'from' 		=> $from,
			'to' 		=> $to,
			'startDate' => $this->input->post('startDate'),
			'hashCode' 	=>$hashCode,
			'date' 		=> date("Y-m-d H:i:s"),
		);
		//var_dump($dataArray);
		//die("");
		$this->bonuslib->loverAdd($dataArray);
		$link = base_url()."bonus/index/".$hashCode;

		$data['title'] = "Get Link | I Love U";
		$data['info'] = "Thank you!<br/> You love link is below, copy it to the Guy you love!<br/>".anchor($link, $link);
		$this->load->view('templates/msgDisplay',$data);
	}
}
?>