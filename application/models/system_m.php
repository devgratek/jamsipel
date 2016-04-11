<?php 
/**
* author by cyberkay
*/
class System_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function log($kode='', $info='', $kategori='', $level='')
	{
		$getuser = $this->user_m->get();

		$this->log_code 	= $kode;
		$this->log_info 	= $info;
		$this->log_kategori = $kategori;
		$this->log_user 	= $getuser->usr_id;
		$this->log_level 	= $level;

		$query 	= $this->db->insert('cyb_logs', $this); 
		return $query;
	}
	function mylog()
	{
		$getuser = $this->user_m->get();

		$this->db->select('*');
		$this->db->from('cyb_logs');
		$this->db->where('log_user', $getuser->usr_id); 
		$this->db->order_by("log_id", "desc"); 

		$query = $this->db->get();
		return $query->result();
	}
	function visitor_count()
	{
		$this->db->select('*');
		$this->db->from('cyb_sessions');

		$query = $this->db->count_all_results();
		return $query;
	}
}
 ?>