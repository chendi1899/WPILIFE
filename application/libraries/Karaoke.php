<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Karaoke
{

	public $CI = NULL;
	public function __construct()
	{	
		date_default_timezone_set('America/New_York');
		$this->CI =& get_instance();
		$this->CI->load->helper('security');
	}

	public function get_distinct_singerID_with_vote_count()
	{
		$this->CI->db->select('karaoke2013.singerID, song,users.users_firstname, users.users_lastname, users.users_gender, count(*) as count');
		$this->CI->db->group_by("karaoke2013.singerID"); 
		$this->CI->db->order_by("count", "desc");
		$this->CI->db->from('karaoke2013');
		$this->CI->db->join('singer2013', 'karaoke2013.singerID = singer2013.singerID');
		$this->CI->db->join('users', 'karaoke2013.singerID = users.users_id');
		$query = $this->CI->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->result(); 
			return $result; 
		}		
		else
		{
			return false;
		}					   
		
	}

	public function get_singer_info($singerID = 0)
	{
		$this->CI->db->select('singer2013.singerID, singer2013.songlink, singer2013.song, singer2013.des, users.users_firstname, users.users_lastname');
		$this->CI->db->from('singer2013');
		$this->CI->db->join('users', 'singer2013.singerID = users.users_id');
		$this->CI->db->where('singer2013.singerID', $singerID); 
		$query = $this->CI->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result; 
		}		
		else
		{
			return false;
		}					   
		
	}

	public function get_voting_count($singerID = 0)
	{
		$this->CI->db->select('singerID, count(*) as count');
		$this->CI->db->group_by("singerID"); 
		$this->CI->db->from('karaoke2013');
		$this->CI->db->where('singerID', $singerID); 
		$query = $this->CI->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result; 
		}		
		else
		{
			return false;
		}					   
		
	}

	public function times_voting_today($userID)
	{
		$this->CI->db->select('voterID, count(*) as count');
		$this->CI->db->group_by("voterID"); 
		$this->CI->db->from('karaoke2013');
		$this->CI->db->where('voterID', $userID); 
		$this->CI->db->where('date', date("Y-m-d")); 
		//var_dump($this->CI->db->_compile_select()); 
		$query = $this->CI->db->get();
		//var_dump($this->CI->db->last_query()); 
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return (int)$result['count']; 
		}		
		else
		{
			return false;
		}		
	}
	
}
?>
