<?php

class Pohs extends CI_Controller 
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

		
		$this->load->view('manage/wpilife_pohs_add');
		
	}	

	function add()
	{
		$dataArray = array(
			'shop_type'			=> $this->input->post('shop_type'),
			'shop_title' 		=> $this->input->post('shop_title'),
			'shop_content' 		=> $this->input->post('content'),
			'user_id'			=> $this->session->userdata('users_id'),
			'shop_date' 		=> date("Y-m-d H:i:s"),
		);
		$this->shoplib->shop_add($dataArray);
		redirect('manage/pohs/myList','refresh');
	}

	function myList()
	{
		$data['list'] = $this->shoplib->get_shop_by_userID($this->session->userdata('users_id'), 'BUY');
		//print_r($data['list']);
		$this->load->view('manage/wpilife_pohs', $data);
	}

	function item_update($id)
	{
		if(is_numeric($id))
		{
			$data['product'] = $this->shoplib->get_shop_by_two_ID($id, $this->session->userdata('users_id'));
			//print_r($data['product']);
			$this->load->view('manage/wpilife_pohs_update',$data);
		}
	}

	function item_updates()
	{
		$shop_id = $this->input->post('shop_id');
		$dataArray = array(
			'shop_title' 		=> $this->input->post('shop_title'),
			'shop_content' 	=> $this->input->post('content'),
		);
		
		$this->shoplib->shop_update($shop_id, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}
	
	
	function item_delete($shop_id)
	{
		if(is_numeric($shop_id))
		{
			$dataArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
			$this->db->delete('shop', $dataArray);
		}
		redirect('manage/pohs/myList','refresh');
	}

	function item_close($shop_id)
	{
		$whereArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
		$dataArray = array('shop_available' => 0);
		$this->shoplib->shop_available($whereArray, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}

	function item_open($shop_id)
	{
		$whereArray = array('shop_id' => $shop_id, 'user_id' => $this->session->userdata('users_id'));
		$dataArray = array('shop_available' => 1);
		$this->shoplib->shop_available($whereArray, $dataArray);
		redirect('manage/pohs/myList','refresh');
	}

}
?>