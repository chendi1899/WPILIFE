<?php

class Events extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('Karaoke');
 		$this->load->helper('form');
	}	
	function index()
	{	
		$data['singers'] = $this->karaoke->get_distinct_singerID_with_vote_count();
		//var_dump($data['singers']);
		$this->load->view('events/karaoke',$data);
		
	}
	
	function singerInfo($singerID = 0)
	{
		if($singerID < 1)
		{
			redirect('events/','refresh');
		}
		else
		{
			$data['singer'] = $this->karaoke->get_singer_info($singerID);
			if($data['singer'])
			{
				//var_dump($data['singer']);
				$data['count'] = $this->karaoke->get_voting_count($singerID);
				$this->load->view('events/personalDes',$data);
			}
			else
			{
				redirect('events/','refresh');
			}
			
		}
		
	}

	function activity_archives($year=0, $month='')
	{
		if($year == 0)
		{
			$year  = date("Y");
			$month = date("F");
		}
		$data['title'] = "Activities Archives for <span style='color:#169fe6;'> ".$month." ".$year." </span>| CSSA";
		$data['activity_list'] = $this->activitycssalib->get_activity_list_by_year_with_month($year, $month);
		$data['pagination'] = "";
		$this->load->view('cssa/activity_list',$data);
	}
	
	function activity_search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('cssa/activity_list','refresh');
		}
		$data['title'] = "Activities List for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| CSSA";
		$data['activity_list'] = $this->activitycssalib->get_activity_list_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('cssa/activity_list',$data);
	}

	function activity($activities_id)
	{
		if(is_numeric($activities_id))
		{
			$data['title'] = "Activity | CSSA";
			$data['activity'] = $this->activitycssalib->get_activity_by_ID($activities_id);
			$this->load->view('cssa/activity',$data);
		}
		else
		{
			redirect('cssa/blog_list','refresh');
		}
		
	}
	
	function blog_list($page = 1)
	{
		$pageSize = 10;
		$listCount = $this->blogcssalib->get_list_count();
		$data['title'] = "Blog List | CSSA";
		$data['blog_list'] = $this->blogcssalib->get_blog_list_with_content($pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'cssa/blog_list/', $listCount, $pageSize);
		$this->load->view('cssa/blog_list',$data);
	}

	function blog_archives($year=0, $month='')
	{
		if($year == 0)
		{
			$year  = date("Y");
			$month = date("F");
		}
		$data['title'] = "Activities Archives for <span style='color:#169fe6;'> ".$month." ".$year." </span>| CSSA";
		$data['blog_list'] = $this->blogcssalib->get_blog_list_by_year_with_month($year, $month);
		$data['pagination'] = "";
		$this->load->view('cssa/blog_list',$data);
	}

	function blog_search()
	{
		$keyword = $this->input->get('keyword');
		if($keyword == '')
		{
			redirect('cssa/blog_list','refresh');
		}
		$data['title'] = "Blogs List for Keyword: <span style='color:#169fe6;'> ".$keyword." </span>| CSSA";
		$data['blog_list'] = $this->blogcssalib->get_blog_list_by_keyword($keyword);
		$data['pagination'] = "";
		$this->load->view('cssa/blog_list',$data);
	}
	
	function blog($blogs_id)
	{
		if(is_numeric($blogs_id))
		{
			$data['title'] = "Blog | CSSA";
			$data['blog'] = $this->blogcssalib->get_blog_by_ID($blogs_id);
			$this->load->view('cssa/blog',$data);
		}
		else
		{
			redirect('cssa/blog_list','refresh');
		}
		
	}

	function photograph()
	{
		$data['title'] = "Photograph | CSSA";
		$this->load->view('cssa/photograph',$data);
	}

	
	
}
?>