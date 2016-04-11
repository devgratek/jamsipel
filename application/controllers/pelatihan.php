<?php 
/**
* author by cyberkay dev
*/
class Pelatihan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('pelatihan_m','pelatihan');
		
	}

	function manager()
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Pelatihan Manager";
		$data['contents'] 	= "pelatihan/pel_manager";
		$data['pelatihan']	= $this->pelatihan->get();
		
		$this->load->view($templete, $data);
	}
	function myhistory($npp = '')
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Profile Karyawan";
		$data['contents'] 	= "pelatihan/pel_saya";

		$data['npp']		= $npp;
		$data['getprofile'] = $this->user_m->userbynpp($npp);

		$data['pelatihan']	= $this->pelatihan->getbynpp($npp);

		$this->load->view($templete, $data);
	}
	function detail($id, $notify="")
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Pelatihan Detail";
		$data['contents'] 	= "pelatihan/pel_detail";
		$data['id']			= $id;
		$data['pel']		= $this->pelatihan->getbyid($id);
		$data['getusers'] 		= $this->user_m->records();
		$data['getpeserta'] 	= $this->pelatihan->peserta($id);
		$data['getmateri'] 		= $this->pelatihan->materi($id);
		$data['jmlpeserta'] 	= $this->pelatihan->peserta_jml($id);
		$data['jmlmateri'] 	= $this->pelatihan->materi_jml($id);

		$data['notify']		= $notify;
		
		$this->load->view($templete, $data);
	}
	function print_schedule($id, $user)
	{
		$data['id'] 		= $id;
		$data['user'] 		= $user;
		$getuser 			= $this->user_m->get();
		$data['getprofile']	= $this->user_m->userbynpp($getuser->usr_username);
		$data['pel']		= $this->pelatihan->getbyid($id);
		$data['getmateri'] 	= $this->pelatihan->materi($id);
		$pel 				= $data['pel'];
		$pel_nama			= $pel->pel_nama;

		$data['title']		= "Jadwal Pelatihan " . $pel_nama . " - " . $getuser->usr_username;
		
		
		// load dompdf
	    $this->load->helper('dompdf');
	    //load content html
	    $html = $this->load->view('pelatihan/pel_print_schedule', $data, true);
	    //create pdf using dompdf
	    $filename = 'jadual pelatihan ' . $pel_nama . ' - ' . $getuser->usr_username;
	    $paper = 'A4';
	    $orientation = 'potrait';
	    pdf_create($html, $filename, $paper, $orientation);
	}
	function registration()
	{
		$templete		 	= "templete/lte/layout";
		$data['title']		= "Pelatihan Baru";
		$data['contents'] 	= "pelatihan/pel_registration";
		$data['edit'] 		= "0";


		$data['jenis'] = $this->pelatihan->getjenis();
		$this->load->view($templete, $data);
	}
	function save($edit)
	{
		$templete		 	= "templete/lte/layout";
		
		$nama 	= $this->input->post('nama');



		if ($edit == 0) {
			if ($this->pelatihan->save()) {
				$get 	= $this->pelatihan->getlast();

				$this->detail($get->pel_id);
			} else {
				$data['title']		= "Pelatihan Baru";
				$data['contents'] 	= "pelatihan/pel_registration";
				$data['notify']		= "<div class='alert alert-dager alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        Pelatihan <b>$nama</b> belum disimpan, mungkin ada yang terlewatkan.
                                    </div>";
				$data['edit'] 		= "0";

				$data['penyelenggara'] = $this->pelatihan->getpenyelenggara();
				$this->load->view($templete, $data);
			}
			
		} else {
			echo "diupdate";
		}
		
		
	}
	function materi_add()
	{
		$pel_id =  $this->input->post('mtr_pel_id');
		$this->pelatihan->materi_add($_POST);

		$this->detail($pel_id);
	}
	function materi_drop()
	{
		$pel_id =  $_POST['pel_id'];
		$no=1;

		
		if(isset($_POST['mtr_id'])) {
			foreach ($_POST['mtr_id'] as $key => $value) {
				if (!$this->pelatihan->materi_drop($pel_id, $value)) {
					$notify = '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Deleting...</b>, ' . $no++ . ' materi dihapus.
                                    </div>';
					
				}
				
			}
		} else {
			$notify = "<div class='alert alert-info alert-dismissable'>
                                        <i class='fa fa-info'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <b>Information, </b> tidak ada materi yang dipilih untuk dihapus.
                                    </div>";
		}
		

		$this->detail($pel_id, $notify);
	}
	function peserta_add()
	{
		$pel_id =  $_POST['pel_id'];
		$no=1;
		$notify = "";
		if(isset($_POST['peserta'])) {
			foreach ($_POST['peserta'] as $key => $value) {
				if (!$this->pelatihan->peserta_add($pel_id, $value)) {
					$notify = '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Added...</b>, ' . $no++ . ' peserta ditambahkan.
                                    </div>';
				}
			}
		}
		
		$this->detail($pel_id, $notify);
	}
	function peserta_drop()
	{
		$pel_id =  $_POST['pel_id'];
		$no=1;
		$notify = "";
		if(isset($_POST['peserta'])) {

			foreach ($_POST['peserta'] as $key => $value) {
				if (!$this->pelatihan->peserta_drop($pel_id, $value)) {
					$notify = '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Deleting...</b>, ' . $no++ . ' peserta dihapus.
                                    </div>';
				}
			}
		}
		$this->detail($pel_id, $notify);
	}

}
 ?>