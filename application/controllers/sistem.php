<?php 
/**
* author by cyberkay
*/
class Sistem extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function info()
	{
		
		$this->load->view("system/sys_info");

		
	}
}
 ?>