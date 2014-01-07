<?php

class Cssa extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->session->userdata('users_id')==null || $this->session->userdata('cssa_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	

		$this->suvivalGuide();
		
	}	

	function suvivalGuide($index_id = 1)
	{
		$data['index_id'] = $index_id;
		$data['index'] = $this->sg->get_root_index();
		$data['content'] = $this->sg->get_content($index_id);
		$data['title'] = "Account Center";
		$data['page_title'] = "Suvival Guide:";
		$data['page_intro'] = "Suvival Guide information Update.";
		$this->load->view('manage/cssa_sg',$data);
	}
	function sg_update()
	{
		$dataArray = array(
			'content' => $this->input->post('content'),		
		);

		$id = $this->input->post('index');
		$this->sg->sg_update($id, $dataArray);
		redirect('manage/cssa/suvivalGuide/'.$id,'refresh');
		
	}

	function faq_type()
	{
		$data['faq_type'] = $this->faqlib->get_faq_type();
		//print_r($this->faqlib->get_faq_type());
		$this->load->view('manage/cssa_faq_type',$data);
	}

	function faq_type_update()
	{
		$dataArray = array(
			'type' => $this->input->post('faq_type'),		
		);

		$id = $this->input->post('id');
		$this->faqlib->faq_type_update($id, $dataArray);
		redirect('manage/cssa/faq_type','refresh');
	}
	function faq_type_add()
	{
		$dataArray = array(
			'type' => $this->input->post('faq_type'),		
		);

		$this->faqlib->faq_type_add($dataArray);
		redirect('manage/cssa/faq_type','refresh');
	}

	function faq()
	{
		$data['faq'] = $this->faqlib->get_faq();
		$this->load->view('manage/cssa_faq',$data);
	}
	
	function faq_update($id)
	{
		$data['faq_type'] = $this->faqlib->get_faq_type();
		$data['faq'] = $this->faqlib->get_faq_by_ID($id);
		//print_r($this->faqlib->get_faq_by_ID($id));
		$this->load->view('manage/cssa_faq_update',$data);
	}

	function faq_updates()
	{
		$faq_id = $this->input->post('faq_id'); 
		$dataArray = array(
			'faq_type' => $this->input->post('faq_type'),		
			'faq_questions' => $this->input->post('question'),	
			'faq_answers' => $this->input->post('content'),	
		);
		$this->faqlib->faq_update($faq_id, $dataArray);
		redirect('manage/cssa/faq_update/'.$faq_id,'refresh');
	}
	
	function faq_add()
	{
		$data['faq_type'] = $this->faqlib->get_faq_type();
		$this->load->view('manage/cssa_faq_add',$data);
	}
	function faq_adds()
	{
		$dataArray = array(
			'faq_type' => $this->input->post('faq_type'),		
			'faq_questions' => $this->input->post('question'),	
			'faq_answers' => $this->input->post('content'),	
		);
		$this->faqlib->faq_add($dataArray);
		redirect('manage/cssa/faq','refresh');
	}

	function faq_delete($faq_id)
	{
		if(is_numeric($faq_id))
		{
			$this->db->delete('faq', array('faq_id' => $faq_id)); 
		}
		redirect('manage/cssa/faq','refresh');
	}

	function blog()
	{
		$data['blog_list'] = $this->blogcssalib->get_blog_list();
		$this->load->view('manage/cssa_blog',$data);
	}
	function blog_add()
	{
		$this->load->view('manage/cssa_blog_add');
	}

	function blog_adds()
	{
		if($this->session->userdata('users_id') != null)
		{
			$dataArray = array(
						'blogs_title' 	=> $this->input->post('blogs_title', FALSE),
						'blogs_content' => $this->input->post('content', FALSE),
						'blogs_year'	=> date("Y"),
						'blogs_month'	=> date("F"),
						'blogs_day'		=> date("d"),
						'blogs_date' 	=> date("Y-m-d H:i:s"),
						'blogs_author' 	=>$this->session->userdata('users_id'),
							);
			$this->blogcssalib->blog_add($dataArray);
		}
		redirect('manage/cssa/blog','refresh');
	}
	function blog_update($id)
	{
		$data['blog'] = $this->blogcssalib->get_blog_by_ID($id);
		$this->load->view('manage/cssa_blog_update',$data);
	}
	function blog_updates()
	{
		$blogs_id = $this->input->post('blogs_id'); 
		$dataArray = array(
			'blogs_title' 	=> $this->input->post('blogs_title', FALSE),
			'blogs_content' => $this->input->post('content', FALSE),
			'blogs_date' 	=> date("Y-m-d H:i:s"),
		);
		$this->blogcssalib->blog_update($blogs_id, $dataArray);
		redirect('manage/cssa/blog_update/'.$blogs_id,'refresh');
	}

	function blog_delete($blog_id)
	{
		if(is_numeric($blog_id))
		{
			$this->db->delete('cssa_blogs', array('blogs_id' => $blog_id)); 
		}
		redirect('manage/cssa/blog','refresh');
	}

	function activity()
	{
		$data['activity_list'] = $this->activitycssalib->get_activity_list();
		$this->load->view('manage/cssa_activity',$data);
	}
	function activity_add()
	{
		$this->load->view('manage/cssa_activity_add');
	}

	function activity_adds()
	{
		if($this->session->userdata('users_id') != null)
		{
			$dataArray = array(
						'activities_title' 	=> $this->input->post('activities_title', TRUE),
						'activities_content' => $this->input->post('content', TRUE),
						'activities_year'	=> date("Y"),
						'activities_month'	=> date("F"),
						'activities_day'		=> date("d"),
						'activities_date' 	=> date("Y-m-d H:i:s"),
						'activities_author' 	=>$this->session->userdata('users_id'),
							);
			$this->activitycssalib->activity_add($dataArray);
		}
		redirect('manage/cssa/activity','refresh');
	}
	function activity_update($id)
	{
		$data['activity'] = $this->activitycssalib->get_activity_by_ID($id);
		$this->load->view('manage/cssa_activity_update',$data);
	}
	function activity_updates()
	{
		$activities_id = $this->input->post('activities_id'); 
		$dataArray = array(
			'activities_title' 	=> $this->input->post('activities_title', TRUE),
			'activities_content' => $this->input->post('content', TRUE),
			'activities_date' 	=> date("Y-m-d H:i:s"),
		);
		$this->activitycssalib->activity_update($activities_id, $dataArray);
		redirect('manage/cssa/activity_update/'.$activities_id,'refresh');
	}

	function activity_delete($activity_id)
	{
		if(is_numeric($activity_id))
		{
			$this->db->delete('cssa_activities', array('activities_id' => $activity_id)); 
		}
		redirect('manage/cssa/activity','refresh');
	}

	function officerList()
	{
		$data['officer_list'] = $this->users->cssa_officer_list();
		$data['user_list'] = $this->users->user_list();
		//print_r($data['list']);
		//die();
		$this->load->view('manage/cssa_officer_list',$data);
	}

	function officerAdd($user_id)
	{
		if(is_numeric($user_id))
		{
			$this->db->insert('cssa_manager_list', array('user_id' => $user_id)); 
		}
		redirect('manage/cssa/officerList','refresh');
	}

	function officerDelete($id)
	{
		if(is_numeric($id))
		{
			$this->db->delete('cssa_manager_list', array('id' => $id)); 
		}
		redirect('manage/cssa/officerList','refresh');
	}

	function officer_title_update()
	{
		$id = $this->input->post('id');
		$dataArray = array(
			'user_title' 	=> $this->input->post('user_title'),
		);
		$this->users->officer_title_update($id, $dataArray);
		redirect('manage/cssa/officerList','refresh');
	}
}
?>