<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pohs extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('paginationlib');
	}
	
	public function index($page = 1)
	{
		$data['title'] = "Shop | WPILIFE";
		$pageSize = 10;
		$listCount = $this->shoplib->get_list_count('BUY');
		$data['shop_list'] = $this->shoplib->get_shop_list('BUY',true, $pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/pohs/', $listCount, $pageSize);
		$this->load->view('wpilife/pohs',$data);
	}

	public function detail($id)
	{
		if(is_numeric($id))
		{

			$data['title'] = "Detail | WPILIEF";
			$data['detail'] = $this->shoplib->get_shop_by_ID($id, 'BUY');
			if($data['detail'] == false)
			{
				redirect('wpilife/pohs','refresh');
			}
			else
			{
				echo $this->load->view('wpilife/detail',$data, TRUE);
			}
		}
		else
		{
			redirect('wpilife/pohs','refresh');
		}
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('wpilife/pohs','refresh');
		}
		$data['title'] = "Products List for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| WPILIFE";
		$data['shop_list'] = $this->shoplib->get_products_list_by_keyword($keyword, 'BUY');
		$data['pagination'] = "";
		$this->load->view('wpilife/pohs',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */