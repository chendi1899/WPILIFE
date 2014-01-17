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
				'shop_type'		=> $this->input->post('shop_type'),
				'shop_title' 		=> $this->input->post('shop_title'),
				'shop_price' 		=> $this->input->post('shop_price'),
				'shop_content' 	=> $this->input->post('content'),
				'user_id'		=> $this->session->userdata('users_id'),
				'shop_image_cover'	=> $image,
				'shop_date' 	=> date("Y-m-d H:i:s"),
			);

			$this->shoplib->shop_add($dataArray);
			redirect('manage/shop/myList','refresh');
		}
		else
		{
			redirect('manage/shop/myList','refresh');
		}
		
	}
	
	function myList()
	{
		$data['list'] = $this->shoplib->get_shop_by_userID($this->session->userdata('users_id'), 'SELL');
		//print_r($data['list']);
		$this->load->view('manage/wpilife_shop', $data);
	}

	function item_update($id)
	{
		if(is_numeric($id))
		{
			$data['product'] = $this->shoplib->get_shop_by_two_ID($id, $this->session->userdata('users_id'));
			//print_r($data['product']);
			$this->load->view('manage/wpilife_shop_update',$data);
		}
	}

	function item_updates()
	{
		$shop_id = $this->input->post('shop_id');
		$this->load->library('imglib');
		$returnInfo = $this->imglib->ImageUpload();
		if($returnInfo['key'] == true)
		{
			//delete the previous image for this product (and thumb)
			unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.$this->input->post('shop_image_cover'));
			unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.substr_replace($this->input->post('shop_image_cover'), '_small', -4, 0));
			$image = $returnInfo['data']['file_name'];
			$thumbImage = $this->imglib->createThumb($image, '/images/shop/', 400, 325);
			$dataArray = array(
				'shop_title' 		=> $this->input->post('shop_title'),
				'shop_price' 		=> $this->input->post('shop_price'),
				'shop_content' 	=> $this->input->post('content'),
				'shop_image_cover'	=> $image,

			);
		}
		else
		{
			$dataArray = array(
				'shop_title' 		=> $this->input->post('shop_title'),
				'shop_price' 		=> $this->input->post('shop_price'),
				'shop_content' 	=> $this->input->post('content'),
			);
		}
		$this->shoplib->shop_update($shop_id, $dataArray);
		redirect('manage/shop/myList','refresh');
	}
	
	
	function item_delete($shop_id)
	{
		if(is_numeric($shop_id))
		{
			$dataArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
			$image =  $this->shoplib->get_image($dataArray);
			//die($image);
			if($this->db->delete('shop', $dataArray))
			{
				//delete the previous image for this product (and thumb)
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.$image);
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/shop/'.substr_replace($image, '_small', -4, 0));
			}
		}
		redirect('manage/shop/myList','refresh');
	}

	function item_close($shop_id)
	{
		$whereArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
		$dataArray = array('shop_available' => 0);
		$this->shoplib->shop_available($whereArray, $dataArray);
		redirect('manage/shop/myList','refresh');
	}

	function item_open($shop_id)
	{
		$whereArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
		$dataArray = array('shop_available' => 1);
		$this->shoplib->shop_available($whereArray, $dataArray);
		redirect('manage/shop/myList','refresh');
	}

}
?>