<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recs extends CI_Controller 
{
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('paginationlib');
	}	
	
	public function index($page = 1)
	{
		$data['title'] = "Recommendation | WPILIFE";
		$pageSize = 10;
		$listCount = $this->recslib->get_all_count();
		$data['recs_list'] = $this->recslib->get_recs_list(true, $pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/recs/', $listCount, $pageSize);
		$this->load->view('wpilife/recs',$data);
	}

	public function item($id)
	{
		if(is_numeric($id))
		{
			$data['item'] = $this->recslib->get_recs_by_ID($id);
			$data['title'] = $data['item']['recs_title']." | WPILIFE";
			if($data['item'] == false)
			{
				redirect('wpilife/recs','refresh');
			}
			else
			{
				$this->load->view('wpilife/item',$data);
			}
			
		}
		else
		{
			redirect('wpilife/recs','refresh');
		}
		
	}

	public function type($type,$page = 1)
	{
		if(is_numeric($type))
		{
			$pageSize = 10;
			$listCount = $this->recslib->get_recs_count_by_type($type);
			$type_name = $this->recslib->get_type_name_by_id($type);
			if($type_name)
			{
				$data['recs_list'] = $this->recslib->get_recs_list_by_type(true, $pageSize*($page-1),$pageSize,$type);
				$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/recs/type/', $listCount, $pageSize);
				$data['title'] = $type_name." | WPILIFE";
				$this->load->view('wpilife/recs',$data);
			}
			else
			{
				redirect('wpilife/recs','refresh');
			}
		}
		else
		{
			redirect('wpilife/recs','refresh');
		}
	}

	public function user($user,$page = 1)
	{
		if(is_numeric($user))
		{
			$pageSize = 10;
			$listCount = $this->recslib->get_recs_count_by_user($user);
			$user_name = $this->recslib->get_user_name_by_id($user);
			if($user_name)
			{
				$data['recs_list'] = $this->recslib->get_recs_list_by_user(true, $pageSize*($page-1),$pageSize,$user);
				$data['pagination'] = $this->paginationlib->get_pagination(base_url().'wpilife/recs/user/', $listCount, $pageSize);
				$data['title'] = $user_name."'recommendations | WPILIFE";
				$this->load->view('wpilife/recs',$data);
			}
			else
			{
				redirect('wpilife/recs','refresh');
			}
		}
		else
		{
			redirect('wpilife/recs','refresh');
		}
	}

	public function search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('wpilife/recs','refresh');
		}
		$data['title'] = "items List for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| WPILIFE";
		$data['recs_list'] = $this->recslib->get_item_list_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('wpilife/recs',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */