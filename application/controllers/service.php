<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {
	function __construct() {
 		parent::__construct();
	}

	public function index() {
		
	}

	public function airportPicker(){
		$data['title'] = "Airport Pickup  | CSSA";
		$data['info'] = "The Airport Pickup Page is Under Construction!";
		$this->load->view('templates/msgDisplay',$data);
	}

	public function tmpHouse(){
		$data['title'] = "Temporary Residence | CSSA";
		$data['info'] = "The Temporary Residence Page is Under Construction!";
		$this->load->view('templates/msgDisplay',$data);
	}

}
