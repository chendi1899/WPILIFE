<?php

class House extends CI_Controller 
{
               
	function __construct()
	{
 		parent::__construct();
		$this->load->helper('form');
		$this->load->library('houselib');
		if($this->session->userdata('users_id')==null)
		{
			redirect('','refresh');
		}
	}	
	function index()
	{	
		$this->load->view('manage/wpilife_house_add');
		
	}	

	function upload()
	{
		$this->load->library('imglib');
		$returnInfo = $this->imglib->ImageUpload();
		if($returnInfo['key'] == true)
		{
			$image = $returnInfo['data']['file_name'];
			$thumbImage = $this->imglib->createThumb($image, '/images/house/', 400, 325);
			$dataArray = array(
				'houses_type'		=> $this->input->post('houses_type'),
				'houses_title' 		=> $this->input->post('houses_title'),
				'houses_price' 		=> $this->input->post('houses_price'),
				'houses_content' 	=> $this->input->post('content'),
				'houses_author'		=> $this->session->userdata('users_id'),
				'houses_image_cover'	=> $image,
				'houses_year'	=> date("Y"),
				'houses_month'	=> date("F"),
				'houses_day'		=> date("d"),
				'houses_date' 	=> date("Y-m-d H:i:s"),
			);

			$this->houselib->house_add($dataArray);
			redirect('manage/house/myList','refresh');
		}
		else
		{
			redirect('manage/house/myList','refresh');
		}
		
	}
	
	function myList()
	{
		$data['list'] = $this->houselib->get_house_by_userID($this->session->userdata('users_id'));
		$this->load->view('manage/wpilife_house', $data);
	}

	function item_update($id)
	{
		if(is_numeric($id))
		{
			$data['house'] = $this->houselib->get_house_by_two_ID($id, $this->session->userdata('users_id'));
			if($data['house'] != false)
			{
				$this->load->view('manage/wpilife_house_update',$data);
			}
			else
			{
				redirect('manage/house/myList','refresh');
			}
		}
		else
		{
			redirect('manage/house/myList','refresh');
		}
	}

	function item_updates()
	{
		$houses_id = $this->input->post('house_id');
		$dataArray = array(
			'addr' 					=> $this->input->post('addr'),
			'month_rent' 			=> $this->input->post('monthRent'),
			'bedrooms_count' 		=> $this->input->post('bedroomCount'),
			'water_included' 		=> $this->input->post('water') == null ? 0 : 1,
			'electricity_included' 	=> $this->input->post('electricity') == null ? 0 : 1,
			'heat_included' 		=> $this->input->post('heater') == null ? 0 : 1,
			'des' 					=> $this->input->post('content', TRUE),
		);
		$this->houselib->house_update($houses_id, $dataArray);
		redirect('manage/house/myList','refresh');
	}
	
	
	function item_delete($houses_id)
	{
		if(is_numeric($houses_id))
		{
			$dataArray = array('houses_id' => $houses_id, 'houses_author' => $this->session->userdata('users_id'));
			$image =  $this->houselib->get_image($dataArray);
			//die($image);
			if($this->db->delete('houses', $dataArray))
			{
				//delete the previous image for this product (and thumb)
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/house/'.$image);
				unlink($_SERVER['DOCUMENT_ROOT'].'/images/house/'.substr_replace($image, '_small', -4, 0));
			}
		}
		redirect('manage/house/myList','refresh');
	}

	function item_close($houses_id)
	{
		$whereArray = array('houses_id' => $houses_id, 'houses_author' => $this->session->userdata('users_id'));
		$dataArray = array('houses_available' => 0);
		$this->houselib->house_available($whereArray, $dataArray);
		redirect('manage/house/myList','refresh');
	}

	function item_open($houses_id)
	{
		$whereArray = array('houses_id' => $houses_id, 'houses_author' => $this->session->userdata('users_id'));
		$dataArray = array('houses_available' => 1);
		$this->houselib->house_available($whereArray, $dataArray);
		redirect('manage/house/myList','refresh');
	}

}
?>