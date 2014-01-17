<?php

class Shop extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		if($this->session->userdata('users_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	
		$this->load->view('manage/wpilife_shop_add');
		
	}	

	function upload()
	{
		$this->load->library('imglib');
		$returnInfo = $this->imglib->ImageUpload();
		if($returnInfo['key'] == true)
		{
			$image = $returnInfo['data']['file_name'];
			$thumbImage = $this->imglib->createThumb($image, '/images/shop/', 400, 325);
			$dataArray = array(
				'blogs_type'		=> $this->input->post('blogs_type'),
				'blogs_title' 		=> $this->input->post('blogs_title'),
				'blogs_price' 		=> $this->input->post('blogs_price'),
				'blogs_content' 	=> $this->input->post('content'),
				'blogs_author'		=> $this->session->userdata('users_id'),
				'blogs_image_cover'	=> $image,
				'blogs_year'	=> date("Y"),
				'blogs_month'	=> date("F"),
				'blogs_day'		=> date("d"),
				'blogs_date' 	=> date("Y-m-d H:i:s"),
			);

			$this->bloglib->blog_add($dataArray);
			redirect('manage/shop/myList','refresh');
		}
		else
		{
			redirect('manage/shop/myList','refresh');
		}
		
	}
	
	function myList()
	{
		$data['list'] = $this->bloglib->get_blog_by_userID($this->session->userdata('users_id'), 'SELL');
		//print_r($data['list']);
		$this->load->view('manage/wpilife_shop', $data);
	}

	function item_update($id)
	{
		if(is_numeric($id))
		{
			$data['product'] = $this->bloglib->get_blog_by_two_ID($id, $this->session->userdata('users_id'));
			//print_r($data['product']);
			$this->load->view('manage/wpilife_shop_update',$data);
		}
	}

	function item_updates()
	{
		$blogs_id = $this->input->post('blogs_id');
		$this->load->library('imglib');
		$returnInfo = $this->imglib->ImageUpload();
		if($returnInfo['key'] == true)
		{
			//delete the previous image for this product (and thumb)
			unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.$this->input->post('blogs_image_cover'));
			unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.substr_replace($this->input->post('blogs_image_cover'), '_small', -4, 0));
			$image = $returnInfo['data']['file_name'];
			$thumbImage = $this->imglib->createThumb($image, '/images/shop/', 400, 325);
			$dataArray = array(
				'blogs_title' 		=> $this->input->post('blogs_title'),
				'blogs_price' 		=> $this->input->post('blogs_price'),
				'blogs_content' 	=> $this->input->post('content'),
				'blogs_image_cover'	=> $image,

			);
		}
		else
		{
			$dataArray = array(
				'blogs_title' 		=> $this->input->post('blogs_title'),
				'blogs_price' 		=> $this->input->post('blogs_price'),
				'blogs_content' 	=> $this->input->post('content'),
			);
		}
		$this->bloglib->blog_update($blogs_id, $dataArray);
		redirect('manage/shop/myList','refresh');
	}
	
	
	function item_delete($blogs_id)
	{
		if(is_numeric($blogs_id))
		{
			$dataArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
			$image =  $this->bloglib->get_image($dataArray);
			//die($image);
			if($this->db->delete('blogs', $dataArray))
			{
				//delete the previous image for this product (and thumb)
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.$image);
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.substr_replace($image, '_small', -4, 0));
			}
		}
		redirect('manage/shop/myList','refresh');
	}

	function item_close($blogs_id)
	{
		$whereArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
		$dataArray = array('blogs_available' => 0);
		$this->bloglib->blog_available($whereArray, $dataArray);
		redirect('manage/shop/myList','refresh');
	}

	function item_open($blogs_id)
	{
		$whereArray = array('blogs_id' => $blogs_id, 'blogs_author' => $this->session->userdata('users_id'));
		$dataArray = array('blogs_available' => 1);
		$this->bloglib->blog_available($whereArray, $dataArray);
		redirect('manage/shop/myList','refresh');
	}

}
?>