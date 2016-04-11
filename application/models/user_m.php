<?php 
/**
* author by cyberkay
*/
class User_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function validation($username, $password)
	{
		$valid 	= FALSE;
		$query = $this->db->get_where('cyb_users',array('usr_username' => $username, 'usr_password' => md5($password), 'usr_blocked' => 0));

		foreach ($query->result() as $row)
		{
		    $valid 	= TRUE;
		    $this->session->set_userdata('sess_userid', $row->usr_id);
		}
		return $valid;
	}
	function get()
	{
		$this->db->select('*');
		$this->db->from('cyb_users');
		$this->db->join('cyb_levels', 'cyb_levels.lvl_id = cyb_users.usr_level');
		$this->db->where('usr_id', $this->session->userdata('sess_userid'));


		$query = $this->db->get();
		return $query->row(0);
	}
	function save($data)
	{

		
		$this->usr_firstname	= htmlspecialchars($_POST['usr_firstname']);
		$this->usr_lastname 	= htmlspecialchars($_POST['usr_lastname']);
		$this->usr_jk 			= $_POST['usr_jk'];
		$this->usr_tempat_lhr 	= $_POST['usr_tempat_lhr'];
		$this->usr_tanggal_lhr 	= $_POST['usr_tanggal_lhr'];
		$this->usr_email	 	= $_POST['usr_email'];
		$this->usr_photo	 	= "default.png";
		$this->usr_jabatan	 	= (isset($_POST['usr_jabatan'])) ? 1 : $_POST['usr_jabatan'] ;
		$this->usr_golongan 	= (isset($_POST['usr_golongan'])) ? 1 : $_POST['usr_golongan'] ;
		$this->usr_ruangan	 	= (isset($_POST['usr_ruang'])) ? 1 : $_POST['usr_ruang'] ;
		$this->usr_baris	 	= (isset($_POST['usr_baris'])) ? 1 : $_POST['usr_baris'] ;
		$this->usr_agama	 	= $_POST['usr_agama'];
		$this->usr_status	 	= $_POST['usr_status'];
		$this->usr_level	 	= $_POST['usr_level'];
		$this->usr_blocked	 	= 0;

		$query 	= $this->db->insert('cyb_users', $data); 
		return $query;
	}
	function save_password()
	{
		$npp 				= $this->input->post('usr_username');
		$password 			= $this->input->post('usr_password_new');

		$this->usr_password = md5($password);


		$this->db->where('usr_username', $npp);
		$query = $this->db->update('cyb_users', $this); 
		return $query;
	}
	function update($data, $npp)
	{
		$this->db->where('usr_username', $npp);
		$query 	= $this->db->update('cyb_users', $data); 
		return $query;
	}
	function delete($npp='')
	{
		$query	= $this->db->delete('cyb_users', array('usr_username' => $npp)); 
		return $query;
	}
	function records()
	{
		$this->db->join('cyb_levels', 'cyb_levels.lvl_id = cyb_users.usr_level');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('usr_status !=', '99');
		$query 	= $this->db->get('cyb_users');
		return $query->result();
	}
	function userbyid($id='')
	{
		$this->db->join('cyb_levels', 'cyb_levels.lvl_id = cyb_users.usr_level');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('usr_id', $id);
		$query 	= $this->db->get('cyb_users');
		return $query->row(0);
	}
	function userbynpp($npp='')
	{
		$this->db->join('cyb_levels', 'cyb_levels.lvl_id = cyb_users.usr_level');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->join('cyb_golongan', 'cyb_golongan.gol_id = cyb_users.usr_golongan');
		$this->db->join('cyb_baris', 'cyb_baris.br_id = cyb_users.usr_baris');
		$this->db->join('cyb_ruang', 'cyb_ruang.ru_id = cyb_users.usr_ruangan');
		$this->db->where('usr_username', $npp);
		$query 	= $this->db->get('cyb_users');
		return $query->row(0);
	}
	function count()
	{
		$this->db->join('cyb_levels', 'cyb_levels.lvl_id = cyb_users.usr_level');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('usr_status', '1');
		$query 	= $this->db->get('cyb_users');
		return $query->num_rows();
	}
	function levels()
	{
		$query 	= $this->db->get('cyb_levels');
		return $query->result();
	}
	function unit_kerja()
	{
		$query 	= $this->db->get('cyb_unit_kerja');
		return $query->result();
	}
	function unit_kerja_kriteria($kondisi)
	{
		$this->db->where($kondisi);
		$query 	= $this->db->get('cyb_unit_kerja');
		return $query->result();
	}
	function unit_kerja_save()
	{
		$this->uk_kode 			= $_POST['uk_kode'];
		$this->uk_nama 			= $_POST['uk_nama'];
		$this->uk_desc 			= $_POST['uk_desc'];
		$this->uk_departemen 	= $_POST['uk_departemen'];
		$this->uk_order 		= $_POST['uk_order'];

		$query 	= $this->db->insert('cyb_unit_kerja', $this); 
		return $query;
	}
	function unit_kerja_delete($kode)
	{
		$this->db->where('uk_kode', $kode);
		$query 	= $this->db->delete('cyb_unit_kerja'); 
		return $query;
	}
	function jabatan()
	{
		$this->db->select('*');
		$this->db->from('cyb_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$query 	= $this->db->get();
		return $query->result();
	}
	function jabatanbyid($uk_id='')
	{
		$this->db->select('*');
		$this->db->from('cyb_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('uk_id', $uk_id);
		$query 	= $this->db->get();
		return $query->result();
	}
	function jabatan_save()
	{
		$this->jb_kode 			= $_POST['jb_kode'];
		$this->jb_nama 			= $_POST['jb_nama'];
		$this->jb_desc 			= $_POST['jb_desc'];
		$this->jb_unit_kerja 	= $_POST['jb_unit_kerja'];
		$this->jb_order 		= $_POST['jb_order'];

		$query 	= $this->db->insert('cyb_jabatan', $this); 
		return $query;
	}
	function jabatan_delete($kode)
	{
		$this->db->where('jb_kode', $kode);
		$query 	= $this->db->delete('cyb_jabatan'); 
		return $query;
	}
	function golongan()
	{
		$query 	= $this->db->get('cyb_golongan');
		return $query->result();
	}
	function baris()
	{
		$query 	= $this->db->get('cyb_baris');
		return $query->result();
	}
	function ruang()
	{
		$query 	= $this->db->get('cyb_ruang');
		return $query->result();
	}
	// function auto($baris)
	// {
	// 	$this->db->set('ru_nama', $baris); 
	// 	$this->db->insert('cyb_ruang'); 
	// }
}
 