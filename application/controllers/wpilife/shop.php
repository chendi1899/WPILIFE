<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('paginationlib');
	}	
	
	public function index($page = 1)
	{
		$data['title'] = "SHOP | CSSA";
		$pageSize = 10;
		$listCount = $this->bloglib->get_list_count('SELL');
		$data['blog_list'] = $this->bloglib->get_blog_list('SELL',true, $pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/shop/', $listCount, $pageSize);
		$this->load->view('wpilife/shop',$data);
	}

	public function product($id)
	{
		if(is_numeric($id))
		{
			$data['title'] = "WPILIFE | EXTEND YOUR LIFE IN WPI";
			$data['product'] = $this->bloglib->get_blog_by_ID($id, 'SELL');
			if($data['product'] == false)
			{
				redirect('wpilife/shop','refresh');
			}
			else
			{
				$this->load->view('wpilife/product',$data);
			}
			
		}
		else
		{
			redirect('wpilife/shop','refresh');
		}
		
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('wpilife/shop','refresh');
		}
		$data['title'] = "Products List for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| WPILIFE";
		$data['blog_list'] = $this->shoplib->get_products_list_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('wpilife/shop',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */