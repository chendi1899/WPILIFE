<?php

class Cssa extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library('paginationlib');
 		$this->load->library('officerscssalib');
 		
	}	
	function index()
	{	
		
		$this->blog_list();
		
	}
	
	function activity_list($page = 1)
	{
		$data['title'] = "Activities List | CSSA";
		$pageSize = 10;
		$listCount = $this->activitycssalib->get_list_count();
		$data['activity_list'] = $this->activitycssalib->get_activity_list_with_content($pageSize*($page-1),$pageSize);
		$data['pagination'] = $this->paginationlib->get_pagination(base_url().'cssa/activity_list/', $listCount, $pageSize);
		$this->load->view('cssa/activity_list',$data);
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

	function photograph($album = "")
	{
		$album = trim($album);
		$this->load->library('imglib');
		if($album == "")
		{
			$data['title'] = "Album | CSSA";
			//$this->imglib->addWaterMarking("1");
			$data['albums'] = $this->imglib->getAlbums();
			$this->load->view('cssa/albums',$data);
		}
		else
		{

			$data['title'] = "Photograph | CSSA";
			$data['album'] = $album;
			$data['images'] = $this->imglib->getImagesForAlbum($album);
			if($data['images'] == false) redirect('cssa/photograph','refresh');
			$this->load->view('cssa/photograph',$data);
		}
		
	}

	function imageProcessAlbum($album)
	{
		$this->load->library('imglib');
		$album = trim($album);
		$images =  $this->imglib->getImagesForAlbum($album);
		if($album != "")
		{
			foreach($images as $image)
			{
				$path = "/elfinder/files/".$album."/";
				$this->imglib->createThumb($image, $path, 220, 147, ".");
				$imagePath = $album."/".$image;
				
				$this->imglib->addWaterMarking($imagePath);
			}
		}

		echo "done!";
	}

	function officers($year = 0)
	{
		
		if($year == 0)
		{
			$year = $this->officerscssalib->get_lastest_years();
		}

		$data['title'] = "Officers For CSSA | $year";
		$data['officers'] = $this->officerscssalib->get_officers($year);
		if($data['officers'] == false)
		{
			$data['officers'] = $this->officerscssalib->get_officers($this->officerscssalib->get_lastest_years());
		}
		$this->load->view('cssa/officers',$data);
	}
	
	
}
?>