<?php 
/**
* author by cyberkay dev
*/
class Pelatihan_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get()
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan');
		$this->db->join('cyb_pelatihan_jenis', 'cyb_pelatihan_jenis.jns_id = cyb_pelatihan.pel_jenis');
		$this->db->order_by('pel_id','DESC');
		
		$query		= $this->db->get();
		return $query->result();
	}
	function getlast()
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan');
		$this->db->join('cyb_pelatihan_jenis', 'cyb_pelatihan_jenis.jns_id = cyb_pelatihan.pel_jenis');
		$this->db->order_by('pel_id','DESC');
		$query		= $this->db->get();
		return $query->row(0);
	}
	function getbyid($id)
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan');
		$this->db->join('cyb_pelatihan_jenis', 'cyb_pelatihan_jenis.jns_id = cyb_pelatihan.pel_jenis');
		$this->db->where('pel_id', $id);

		$query		= $this->db->get();
		return $query->row(0);
	}
	function getbynpp($npp)
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan');
		$this->db->join('cyb_pelatihan_jenis', 'cyb_pelatihan_jenis.jns_id = cyb_pelatihan.pel_jenis');
		$this->db->join('cyb_pelatihan_peserta', 'cyb_pelatihan_peserta.plt_pel_id = cyb_pelatihan.pel_id');
		$this->db->join('cyb_users', 'cyb_users.usr_id = cyb_pelatihan_peserta.plt_usr_id');
		$this->db->where('usr_username', $npp);

		$query		= $this->db->get();
		return $query->result();
	}
	function save()
	{
		$this->pel_info				= 0;
		$this->pel_kode				= $this->input->post('kode');
		$this->pel_nama				= $this->input->post('nama');
		$this->pel_jenis			= $this->input->post('jenis');
		$this->pel_tempat			= $this->input->post('tempat');
		$this->pel_penyelenggara	= $this->input->post('penyelenggara');
		$this->pel_keterangan		= $this->input->post('ket');

		$query 	= $this->db->insert('cyb_pelatihan', $this);
		return $query;

	}
	function materi($pel_id)
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan_materi');
		$this->db->where('mtr_pel_id', $pel_id);

		$query		= $this->db->get();
		return $query->result();
	}
	function materi_jml($pel_id)
	{
		$this->db->select('mtr_id');
		$this->db->from('cyb_pelatihan_materi');
		$this->db->where('mtr_pel_id', $pel_id);

		$query		= $this->db->get();
		return $query->num_rows();
	}
	function materi_add($data)
	{
		$this->db->insert('cyb_pelatihan_materi', $data); 
	}
	function materi_drop($pel_id, $mtr_id)
	{
		$this->db->where('mtr_pel_id', $pel_id);
		$this->db->where('mtr_id', $mtr_id); 
		$this->db->delete('cyb_pelatihan_materi'); 
	}
	function peserta($pel_id)
	{
		$this->db->select('*');
		$this->db->from('cyb_pelatihan_peserta');
		$this->db->join('cyb_users', 'cyb_pelatihan_peserta.plt_usr_id = cyb_users.usr_id');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('plt_pel_id', $pel_id);
		
		$query		= $this->db->get();
		return $query->result();
	}
	function peserta_add($pel_id, $usr_id)
	{
		$this->db->set('plt_pel_id', $pel_id);
		$this->db->set('plt_usr_id', $usr_id); 
		$this->db->insert('cyb_pelatihan_peserta'); 
	}
	function peserta_drop($pel_id, $usr_id)
	{
		$this->db->where('plt_pel_id', $pel_id);
		$this->db->where('plt_id', $usr_id); 
		$this->db->delete('cyb_pelatihan_peserta'); 
	}

	function peserta_jml($pel_id)
	{
		$this->db->select('usr_id');
		$this->db->from('cyb_pelatihan_peserta');
		$this->db->join('cyb_users', 'cyb_pelatihan_peserta.plt_usr_id = cyb_users.usr_id');
		$this->db->join('cyb_jabatan', 'cyb_jabatan.jb_id = cyb_users.usr_jabatan');
		$this->db->join('cyb_unit_kerja', 'cyb_unit_kerja.uk_id = cyb_jabatan.jb_unit_kerja');
		$this->db->where('plt_pel_id', $pel_id);

		
		$query		= $this->db->get();
		return $query->num_rows();
	}

	function getjenis()
	{
		$query 	= $this->db->get('cyb_pelatihan_jenis');
		return $query->result();
	}
}
 ?>