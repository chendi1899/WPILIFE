<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('paginationlib');
 		$this->load->library('houselib');
	}	
	
	public function index($page = 1)
	{
		$data['title'] = "House | WPILIFE";
		$pageSize = 10;
		$listCount = $this->houselib->get_list_count();
		$data['house_list'] = $this->houselib->get_house_list($pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/house/', $listCount, $pageSize);
		$this->load->view('wpilife/house',$data);
	}

	public function getHouse($id)
	{
		if(is_numeric($id))
		{
			$data['title'] = "House | WPILIFE";
			$data['house'] = $this->houselib->get_house_by_houseID($id);
			if($data['house'] == false)
			{
				redirect('wpilife/house','refresh');
			}
			else
			{

				$this->load->view('wpilife/house_des',$data);
			}
			
		}
		else
		{
			redirect('wpilife/house','refresh');
		}
		
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('wpilife/house','refresh');
		}
		$data['title'] = "Result for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| WPILIFE";
		$data['house_list'] = $this->houselib->get_house_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('wpilife/house',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */