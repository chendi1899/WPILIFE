<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paginationlib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
		$this->CI->load->library('pagination');
	}

	public function get_pagination($baseUrl, $totalRows, $perPage=20)
	{
		$config['base_url'] = $baseUrl;
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $perPage; 
		$this->CI->pagination->initialize($config); 
		
		return $this->CI->pagination->create_links();
				   
		
	}

	
}

?>
