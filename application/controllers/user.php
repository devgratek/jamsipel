<?php 
/**
* author by cyberkay
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function login()
	{
		$this->load->view('user/user_login');
	}
	function auth()
	{
		$u 			= $this->input->post('username');
		$p 			= $this->input->post('password');

		$data['u'] 	= $u;
		$data['p'] 	= $p;

		if ($this->user_m->validation($u, $p)) {
			$this->session->set_userdata('sess_login','172jmsiplkay104');
			
			echo "Please wait...";
			$this->system_m->log('LOGIN', "Aktifitas login dengan username <b>$u</b> .", 'Aktifitas', 4);
			redirect(base_url(), 'refresh');
		} else {
			$templete		 	= 'user/user_login';
			$data['title']		= "Please Check your identity...";
			$data['notify']		= "Username or password does'n match !!!";

			$this->load->view($templete, $data);
		}
	}
	function logout()
	{
		echo "Please wait...";
		$getuser 	= $this->user_m->get();
		$this->system_m->log('LOGOUT', "Aktifitas logout <b>$getuser->usr_username</b> terakhir.", 'Aktifitas', 4);
		$this->session->unset_userdata('sess_login');
		redirect(base_url(), 'refresh');
	}
	
	function manager($notify = '')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Users Manager";
		$data['contents'] = "user/user_manager";

		$data['getusers'] 		= $this->user_m->records();
		
		$this->load->view($templete, $data);
	}
	function registration($notify = '')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "User Registration";
		$data['contents'] 	= "user/user_registration";
		$data['edit'] 		= "0";

		$data['getlevels'] 	= $this->user_m->levels();
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();
		$data['getgolongan'] 	= $this->user_m->golongan();
		$data['getbaris'] 		= $this->user_m->baris();
		$data['getruang'] 		= $this->user_m->ruang();
		$data['getagama'] 		= array('ISLAM','KRISTEN','KATHOLIK','PROTESTAN','HINDU','BUDHA');
		$this->load->view($templete, $data);
	}
	function edit_password($npp)
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Edit Password";
		$data['contents'] 	= "user/user_edit_password";
		$npp 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $npp);
		$npp 				= $this->encrypt->decode($npp);
		if ($npp == "") {
			$npp = "";
		}

		$data['npp'] 		= $npp;

		$this->load->view($templete, $data);
	}

	function save_password()
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Edit Password";
		$npp 				= $this->input->post('usr_username');

		$u 			= $this->input->post('usr_username');
		$p 			= $this->input->post('usr_password_now');
		$p1 			= $this->input->post('usr_password_new');
		$p2 			= $this->input->post('usr_password_new2');

		

		if($p1 != $p2){
			$data['notify']		= "Ups, Konfirmasi Password tidak sama...";
			$data['contents'] 	= "user/user_edit_password";

			$data['npp'] 		= $u;
			$this->load->view($templete, $data);
		}elseif ($this->user_m->validation($u, $p)) {
			$u 				= $this->encrypt->encode($u);
			$u 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $u);
			if ($this->user_m->save_password()) {
				
				$notify		= "<div class='alert alert-success alert-dismissable'>
	                                        <i class='fa fa-check'></i>
	                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                                        Password telah di perbaharui
	                           </div>";
				$this->profile($u, $notify);
				$this->system_m->log('UPDATED', "Aktifitas perubahan password username <b>$u</b> .", 'Aktifitas', 4);
			} else {
				$notify		= "<div class='alert alert-warning alert-dismissable'>
	                                        <i class='fa fa-ban'></i>
	                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                                        Password belum tersimpan, silahkan coba lagi
	                           </div>";
				$this->profile($u, $notify);
			}
			
			
		} else {
			$data['notify']		= "Ups, Password sekarang tidak benar...";
			$data['contents'] 	= "user/user_edit_password";
			$data['npp'] 		= $u;
			$this->load->view($templete, $data);
		}
		
	}
	function save($edit)
	{
		$config['upload_path'] = 'assets/images/profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1500';
		$config['max_filename']  = "30";


		$this->load->library('upload', $config);
		
		if ($_FILES['userfile']['name'] != "") {
			$uploading 		= $this->upload->do_upload();
			$upload_data 	= $this->upload->data();
			$this->usr_photo	 	= $upload_data['file_name'];
			//echo "upload";
		} else {
			$uploading = TRUE;
			//echo "tanpa upload";
		}
		//var_dump($upload_data);
		$npp				 	= htmlspecialchars($_POST['usr_username']);
		$id 					= $npp;
		$this->usr_firstname	= htmlspecialchars($_POST['usr_firstname']);
		$this->usr_lastname 	= htmlspecialchars($_POST['usr_lastname']);
		$this->usr_jk 			= $_POST['usr_jk'];
		$this->usr_tempat_lhr 	= $_POST['usr_tempat_lhr'];
		$this->usr_tanggal_lhr 	= $_POST['usr_tanggal_lhr'];
		$this->usr_email	 	= $_POST['usr_email'];
		$this->usr_hp		 	= $_POST['usr_hp'];
		
		$this->usr_jabatan	 	= (empty($_POST['usr_jabatan'])) ? '1' : $_POST['usr_jabatan'] ;
		$this->usr_golongan 	= (empty($_POST['usr_golongan'])) ? '1' : $_POST['usr_golongan'] ;
		$this->usr_ruangan	 	= (empty($_POST['usr_ruang'])) ? '1' : $_POST['usr_ruang'] ;
		$this->usr_baris	 	= (empty($_POST['usr_baris'])) ? '1' : $_POST['usr_baris'] ;
		$this->usr_agama	 	= $_POST['usr_agama'];

		if ($edit == 0) {
			$templete		 	= "templete/lte/layout";
			$data['title']		= "Users Manager";
			$data['contents'] 	= "user/user_manager";
			$nama 				= $this->input->post('usr_firstname') . " " . $this->input->post('usr_lastname') ;

			$this->usr_username 	= htmlspecialchars($_POST['usr_username']);
			$this->usr_password 	= md5($_POST['usr_password']);
			$this->usr_status	 	= $_POST['usr_status'];
			$this->usr_level	 	= $_POST['usr_level'];
			$this->usr_blocked	 	= 0;

			if ($this->user_m->userbynpp($_POST['usr_username'])) {
				$data['notify'] 	= "<div class='alert alert-warning alert-dismissable'>
	                                        <i class='fa fa-ban'></i>
	                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                                        Ups, karyawan <b>$nama</b> belum di simpan. terdapat duplikasi NPP, silahkan periksa kembali.
	                                    </div>";
			} else {
				if (!$uploading) {

					$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
			                                        <i class='fa fa-ban'></i>
			                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			                                        Jenis file untuk foto profile tidak didukung karena file terlalu besar/file bukan gambar, silahkan ganti gambar yang lain.
			                                    </div>";
				} else {
					if ($this->user_m->save($this)) {
						$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
		                                        <i class='fa fa-check'></i>
		                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		                                        Karyawan dengan nama <b>$nama</b> sudah disimpan.
		                                    </div>";
		             	$this->system_m->log('CREATE', "Karyawan dengan nama <b>$nama</b> sudah disimpan.", 'Registrasi', 3);
					} else {
						$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
			                                        <i class='fa fa-ban'></i>
			                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			                                        Ups, karyawan <b>$nama</b> belum di simpan, sepertinya ada Kesalahan system.
			                                    </div>";
					}
				}
				
				
			}
			$data['getusers'] 	= $this->user_m->records();
			$this->load->view($templete, $data);
		} else if($edit == 1) {
			$templete		 	= "templete/lte/layout";
			$data['title']		= "Users Manager";
			$data['contents'] 	= "user/user_manager";

			$npp 				= $this->encrypt->encode($npp);
			$npp 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $npp);

			$nama 				= $this->input->post('usr_firstname') . " " . $this->input->post('usr_lastname') ;

			$data['getusers'] 	= $this->user_m->records();
			if (!$uploading) {
					$error_upload = $this->upload->display_errors();
					$notify 	= "<div class='alert alert-danger alert-dismissable'>
			                                        <i class='fa fa-ban'></i>
			                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			                                        $error_upload
			                                    </div>";
			        $this->profile($npp, $notify);
			} else {
				if ($this->user_m->update($this, $id)) {
					$notify 	= "<div class='alert alert-success alert-dismissable'>
	                                        <i class='fa fa-check'></i>
	                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                                        perubahan data <b>$nama</b> sudah disimpan.
	                                    </div>";
	             	$this->system_m->log('UPDATED', "perubahan data <b>$nama</b> sudah disimpan.", 'Perubahan', 3);
	             	$this->profile($npp, $notify);
				} else {
					$notify 	= "<div class='alert alert-danger alert-dismissable'>
		                                        <i class='fa fa-ban'></i>
		                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		                                        Ups, karyawan <b>$nama</b> belum di simpan, sepertinya ada Kesalahan system.
		                                    </div>";
		            $this->profile($npp, $notify);
				}
			}
		}
		
	}
	function delete($npp='')
	{
			$templete		 	= "templete/lte/layout";
			$data['title']		= "Users Manager";
			$data['contents'] 	= "user/user_manager";

			$npp 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $npp);
			$npp 				= $this->encrypt->decode($npp);
			if ($npp == "") {
				$npp = "";
			}

			if ($this->user_m->delete($npp)) {
				$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-trash-o'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Karyawan dengan npp <b>$npp</b> sudah dihapus.
                                    </div>";
                $this->system_m->log('DELETING', "Karyawan dengan npp <b>$npp</b> sudah dihapus", 'Penghapusan', '3');
			} else {
				$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
	                                        <i class='fa fa-ban'></i>
	                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                                        Ups, karyawan <b>$nama</b> belum di hapus, sepertinya ada masalah system silahkan hubungi administrator.
	                                    </div>";
			}
			$data['getusers'] 	= $this->user_m->records();
			$this->load->view($templete, $data);
	}
	function profile($npp = '', $notify='')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Profile Karyawan";
		$data['contents'] 	= "user/user_profile";

		$npp 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $npp);
		$npp 				= $this->encrypt->decode($npp);
		if ($npp == "") {
			$npp = "";
		}

		$data['getprofile'] = $this->user_m->userbynpp($npp);
		$data['getlog'] 	= $this->system_m->mylog();
		$data['pelatihan'] = array();
		$data['notify'] 	= $notify;
		if (!$this->user_m->userbynpp($npp)) {
			$data['contents'] 	= "system/error_forbiden";
		}

		$this->load->view($templete, $data);
	}
	function edit_profile($npp = '', $notify='')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Edit Profile";
		$data['contents'] 	= "user/user_edit_profile";
		$data['edit'] 		= "1";

		$npp 				= str_replace(array('-', '_', '~'), array('+', '/', '='), $npp);
		$npp 				= $this->encrypt->decode($npp);
		if ($npp == "") {
			$npp = "";
		}
		$data['npp']		= $npp;
		$data['getprofile'] = $this->user_m->userbynpp($npp);
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();
		$data['getgolongan'] 	= $this->user_m->golongan();
		$data['getbaris'] 		= $this->user_m->baris();
		$data['getruang'] 		= $this->user_m->ruang();
		$data['getagama'] 		= array('ISLAM','KRISTEN','KATHOLIK','PROTESTAN','HINDU','BUDHA');
		$data['notify'] 	= $notify;

		if (!$this->user_m->userbynpp($npp)) {
			$data['contents'] 	= "system/error_forbiden";
		}

		$this->load->view($templete, $data);
	}
	function export($npp = '')
	{
		
	    // load dompdf
	    $this->load->helper('dompdf');
	    //load content html
	    $html = "Hallo Word dompdf";
	    // create pdf using dompdf
	    $filename = 'profile-' . $npp;
	    $paper = 'A4';
	    $orientation = 'potrait';
	    pdf_create($html, $filename, $paper, $orientation);
	    $this->system_m->log('GENRETING', "Mencetak Laporan Riwayat Pelatihan.", 'Aktifitas', 4);
	}
	function unit_jabatan($notify = '')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Unit Kerja dan Jabatan";
		$data['contents'] 	= "user/user_unit_jabatan";

		$unitpilihan 	= array('uk_departemen' => '0');
		$data['getunitkerjakriteria'] 	= $this->user_m->unit_kerja_kriteria($unitpilihan);
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();
		$this->load->view($templete, $data);
	}
	function unit_kerja_save()
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Unit Kerja dan Jabatan";
		$data['contents'] 	= "user/user_unit_jabatan";
		$unit 				= $_POST['uk_nama'];

		if ($this->user_m->unit_kerja_save()) {
			$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Unit Kerja <b>$unit</b> sudah disimpan.
                                    </div>";
            $this->system_m->log('CREATED', "Unit Kerja <b>$unit</b> sudah disimpan.", 'Penambahan', 2);
		} else {
			$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Ups, Unit Kerja <b>$unit</b> belum di simpan, sepertinya ada duplikasi data silahkan periksa inputan.
                                    </div>";
		}
		
		$unitpilihan 	= array('uk_departemen' => '0');
		$data['getunitkerjakriteria'] 	= $this->user_m->unit_kerja_kriteria($unitpilihan);
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();

		$this->load->view($templete, $data);
	}
	function jabatan_save()
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Unit Kerja dan Jabatan";
		$data['contents'] 	= "user/user_unit_jabatan";
		$jabatan 				= $_POST['jb_nama'];

		if ($this->user_m->jabatan_save()) {
			$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Jabatan <b>$jabatan</b> sudah disimpan.
                                    </div>";
            $this->system_m->log('CREATED', "Jabatan <b>$jabatan</b> sudah disimpan.", 'Penambahan', 2);
		} else {
			$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Ups, Jabatan <b>$jabatan</b> belum di simpan, sepertinya ada yang terlewatkan silahkan periksa inputan.
                                    </div>";
		}
		
		$unitpilihan 	= array('uk_departemen' => '0');
		$data['getunitkerjakriteria'] 	= $this->user_m->unit_kerja_kriteria($unitpilihan);
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();

		$this->load->view($templete, $data);
	}
	function unit_kerja_delete($kode)
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Unit Kerja dan Jabatan";
		$data['contents'] 	= "user/user_unit_jabatan";

		if ($this->user_m->unit_kerja_delete($kode)) {
			$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Unit Kerja <b>$kode</b> sudah dihapus.
                                    </div>";
            $this->system_m->log('DELETED', "Unit Kerja <b>$kode</b> sudah dihapus.", 'Penghapusan', 2);
		} else {
			$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Ups, Unit Kerja <b>$kode</b> belum dihapus, sepertinya ada kerusakan silahkan hubungi administrator.
                                    </div>";
		}
		
		$unitpilihan 	= array('uk_departemen' => '0');
		$data['getunitkerjakriteria'] 	= $this->user_m->unit_kerja_kriteria($unitpilihan);
		$data['getunitkerja'] 	= $this->user_m->unit_kerja();
		$data['getjabatan'] 	= $this->user_m->jabatan();

		$this->load->view($templete, $data);
	}
	function jabatan_delete($kode)
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Unit Kerja dan Jabatan";
		$data['contents'] 	= "user/user_unit_jabatan";

		if ($this->user_m->jabatan_delete($kode)) {
			$data['notify'] 	= "<div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Jabatan <b>$kode</b> sudah dihapus.
                                    </div>";
            $this->system_m->log('DELETED', "Jabatan <b>$kode</b> sudah dihapus.", 'Penghapusan', 2);
		} else {
			$data['notify'] 	= "<div class='alert alert-danger alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Ups, Jabatan <b>$kode</b> belum dihapus, sepertinya ada kerusakan silahkan hubungi administrator.
                                    </div>";
		}

		$unitpilihan 	= array('uk_departemen' => '0');
		$data['getunitkerjakriteria']	= $this->user_m->unit_kerja_kriteria($unitpilihan);
		$data['getunitkerja'] 			= $this->user_m->unit_kerja();
		$data['getjabatan'] 			= $this->user_m->jabatan();

		$this->load->view($templete, $data);
	}
	function jabatan_select($param='')
	{
		$data['param'] 					= $param;
		$data['getjabatanbyid']		= $this->user_m->jabatanbyid($param);
		$this->load->view('user/user_jabatan_select', $data);
	}
	function gol_baris_ruang($notify = '')
	{

		$templete		 	= "templete/lte/layout";
		$data['title']		= "Golongan, baris, dan ruang";
		$data['contents'] 	= "user/user_gol_baris_ruang";

		$data['getgolongan'] 	= $this->user_m->golongan();
		$data['getbaris'] 		= $this->user_m->baris();
		$data['getruang'] 		= $this->user_m->ruang();
		$this->load->view($templete, $data);
	}
	// function auto()
	// {
	// 	echo "auto insert";
	// 	$kode = array();

	// 	for ($i=1; $i <= 40; $i++) { 
	// 		$kode[$i] = 'R' . $i;
	// 	}
	// 	echo "<br/>";

	// 	for ($i=1; $i <= 40; $i++) { 
	// 		$this->user_m->auto($kode[$i]);
	// 		echo "oke" . $i . "<br/>";
	// 	}
	// }
}
 ?>