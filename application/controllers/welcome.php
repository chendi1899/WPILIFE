<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('shoplib');
	}
	public function index()
	{
		$data['title'] = "WPILIFE | EXTEND YOUR LIFE IN WPI";
		$data['items'] =  $this->shoplib->get_shop_list_by_count(9,'SELL');
		//$data['activity_list'] = $this->activitycssalib->get_activity_list_by_count(2);
		$data['blog_list'] =  $this->blogcssalib->get_blog_list_by_count(4);
		$this->load->view('welcome',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */