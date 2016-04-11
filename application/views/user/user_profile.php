<center>
	<img src="<?= base_url('assets/images/profile'); ?>/<?= $getprofile->usr_photo; ?>" width="80" alt="pas photo" class="img-circle"><br/>
	<?= $getprofile->usr_username; ?><br/>
	<?= $getprofile->usr_firstname; ?> <?= $getprofile->usr_lastname; ?><br/>
	<b><?= $getprofile->jb_nama; ?></b><br/>
    <?= ($notify != "") ? 
                    $notify : ''; ?>
</center>
<div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="tampilkan/sembunyikan profile">
                                                        Profile Karyawan
                                                    </a>
                                                </h4>
                                                <div class="box-tools pull-right">
                                                    <!-- Single button -->
                                                       <div class="btn-group">
                                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                          </button>
                                                          <ul class="dropdown-menu pull-right">
                                                            <?php 
                                                            $npp = $this->encrypt->encode($getprofile->usr_username);
                                                            $npp = str_replace(array('+', '/', '='), array('-', '_', '~'), $npp);
                                                             ?>
                                                            <li><a href="<?= base_url('user/edit_password') ?>/<?= $npp; ?>">Ganti Password</a></li>
                                                            <li><a href="<?= base_url('user/edit_profile') ?>/<?= $npp; ?>">Edit Profile</a></li>
                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="<?= base_url('user/reset_password') ?>/<?= $npp; ?>" onclick="return confirm('Anda yakin akan mereset password <?= $getprofile->usr_username; ?>?')">Reset Password</a></li>
                                                            <li><a href="#">Switch Level</a></li>
                                                          </ul>
                                                        </div>
                                                    <!-- end button dropdown -->
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">

    <div class="row">
        <div class="col-md-2">Tempat lahir</div>
        <div class="col-md-4">: <?= (empty($getprofile->usr_tempat_lhr)) ? '-' : $getprofile->usr_tempat_lhr; ?></div>
        <div class="col-md-2">Baris & Ruang</div>
        <div class="col-md-4">: <?= $getprofile->br_nama; ?>, <?= $getprofile->ru_nama; ?></div>
    </div>
	<div class="row">
        <div class="col-md-2">Tanggal Lahir</div>
        <div class="col-md-4">:  <?= (empty($getprofile->usr_tanggal_lhr)) ? '-' : $getprofile->usr_tanggal_lhr ; ?></div>
        <div class="col-md-2">Email</div>
        <div class="col-md-4">: <?= (empty($getprofile->usr_email)) ? '-' : $getprofile->usr_email; ?></div>
    </div>
	<div class="row">
        <div class="col-md-2">Jenis Kelamin</div>
        <div class="col-md-4">: <?= ($getprofile->usr_jk == 'l') ? 'Laki-laki' : 'Perempuan' ;  ?></div>
        <div class="col-md-2">No. Hp</div>
        <div class="col-md-4">: <?= (empty($getprofile->usr_hp)) ? '-' : $getprofile->usr_hp; ?></div>
    </div>
    
    <div class="row">
    	<div class="col-md-2">Golongan : </div>
        <div class="col-md-4">: <?= $getprofile->gol_nama; ?></div>
        <div class="col-md-2">Agama</div>
        <div class="col-md-4">: <?= $getprofile->usr_agama; ?></div>
    </div>
    <div class="row">
        <div class="col-md-2">Unit Kerja, Jabatan</div>
        <div class="col-md-4">: <?= $getprofile->uk_nama; ?>, <?= $getprofile->jb_nama; ?></div>
        <div class="col-md-2">Status Karyawan</div>
        <div class="col-md-4">: <?= ($getprofile->usr_status == '1') ? 'TETAP' : 'PENSIUN'; ?></div>
    </div>

</div>
                                            </div>
                                        </div>
                                        </form>
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" title="tampilkan/sembunyikan riwayat">
                                                        Aktifitas & Pemberitahuan Saya
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="box-body">
 <div class="box-body table-responsive">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Aktifitas</th>
                                                <th>Kategori</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($getlog as $row) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->log_code; ?></td>
                                                <td><?= $row->log_info; ?></td>
                                                <td><?= $row->log_kategori; ?></td>
                                                <td><?= $row->log_date; ?></td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->

</div><!-- end body -->
</div>
</div>
<!-- data table -->
        <link href="<?php echo base_url()?>assets/lte/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 
<!-- data table -->
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
        
                $("#datatable1").dataTable();

        </script>