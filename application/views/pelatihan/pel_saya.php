<center>
	<img src="<?= base_url('assets/images/profile'); ?>/<?= $getprofile->usr_photo; ?>" width="80" alt="pas photo" class="img-circle"><br/>
	<?= $npp; ?><br/>
	<?= $getprofile->usr_firstname; ?> <?= $getprofile->usr_lastname; ?><br/>
	<b><?= $getprofile->jb_nama; ?></b><br/>
</center>
<div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="tampilkan/sembunyikan profile">
                                                        Profile Karyawan
                                                    </a>
                                                </h4>
                                                <div class="box-tools pull-right">
                                                    <!-- icon right -->
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
                                                        Riwayat Pelatihan
                                                    </a>
                                                </h4>
                                                <div class="box-tools pull-right">
                                                    <a href="<?= base_url('user/export/'); ?>" title="cetak laporan" target="blank">
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                                    </a>
                                                </div>
                                                <!-- end pull right -->
                                                
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="box-body">
 <div class="box-body table-responsive">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Info</th>
                                                <th>Kode</th>
                                                <th>Nama Pelatihan</th>
                                                <th>Mulai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($pelatihan as $row) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><span class="label label-primary" title="Pelaksanaan"><?= $row->pel_info; ?></span></td>
                                                <td><?= $row->pel_kode; ?></td>
                                                <td>
                                                <?= $row->pel_nama; ?><br/>
                                                Jenis : <span class="label label-<?= $row->jns_simbol; ?>"><?= $row->jns_nama; ?></span>
                                                </td>
                                                <td>17 Agustus 2015 <br/> 07.00</td>
                                                <td align="center">
                                                    <a href="<?= base_url('pelatihan/detail') ?>/<?= $row->pel_id; ?>"><i title="Lihat Detail Pelatihan <?= $row->pel_kode; ?>" class="fa fa-fw fa-list-alt"></i></a>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->

</div><!-- end body -->
</div>
</div>

<div class="row">
    	<div class="col-md-6"></div>
        <div class="col-md-6" align="right">
	        
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