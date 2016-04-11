<?php 
$getuser = $this->user_m->get();

 ?>
<!-- data table -->
        <link href="<?php echo base_url()?>assets/lte/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 
<?= (isset($notify)) ? $notify : "" ; ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= $pel->pel_nama; ?></h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url('pelatihan/print_schedule'); ?>/<?= $pel->pel_id; ?>/<?= $getuser->usr_id; ?>" target="blank" title="print jadwal latihan"><button class="btn btn-primary btn-xs"><i class="fa fa-print"></i></button></a>
        </div> <!-- end of pull right -->
    </div><!-- /.box-header -->
    <br/>
	<div class="row">
        <div class="col-md-6" align="right">
            Kode
        </div>
        <div class="col-md-6">
            : <?= $pel->pel_kode; ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6" align="right">
            Nama Pelatihan
        </div>
        <div class="col-md-6">
            : <?= $pel->pel_nama; ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6" align="right">
            Jenis
        </div>
        <div class="col-md-6">
            : <?= $pel->jns_nama; ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6" align="right">
            Penyelenggara
        </div>
        <div class="col-md-6">
            : <?= $pel->pel_penyelenggara; ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6" align="right">
            Tempat
        </div>
        <div class="col-md-6">
            : <?= $pel->pel_tempat; ?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6" align="right">
            Keterangan
        </div>
        <div class="col-md-6">
            : <?= $pel->pel_keterangan; ?>
        </div>
    </div>
<br/>
<!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Materi <span class="badge bg-<?= ($jmlmateri == 0) ? 'red' : 'blue' ; ?>"><?= $jmlmateri; ?></span></a></li>
                <li><a href="#tab_2" data-toggle="tab">Peserta <span class="badge bg-<?= ($jmlpeserta == 0) ? 'red' : 'blue' ; ?>"><?= $jmlpeserta; ?></span></a></li>
                <li><a href="#tab_3" data-toggle="tab">Biaya</a></li>
                <li><a href="#tab_4" data-toggle="tab">Quisioner</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <?php if($getuser->usr_level <= 3) { ?>
                    <form method="POST" action="<?= base_url('pelatihan/materi_drop'); ?>">
                        <input type="hidden" name="pel_id" value="<?= $pel->pel_id; ?>">
                    <div class="row">
                        
                            <div class="col-md-6" >
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-materi-modal-lg"><i class="fa fa-fw fa-plus-square" title="tambah materi"></i></button>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                            </div>
                    </div>
                    <?php } ?>
                        <div class="box-body table-responsive">
                                <table id="datatable1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox" id="select-all"></th>
                                                                    <th>No</th>
                                                                    <th>Materi</th>
                                                                    <th>Jenis</th>
                                                                    <th>Mulai</th>
                                                                    <th>Selesai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $no=1;
                                                                foreach ($getmateri as $row) 
                                                                {
                                                                ?>
                                                                    
                                                                <tr>
                                                                    <td><input type="checkbox" name="mtr_id[]" value="<?= $row->mtr_id; ?>" class="checkbox"></td>
                                                                    <td align='center'><?= $no++; ?></td>
                                                                    <td><?= $row->mtr_nama; ?></td>
                                                                    <td><?= $row->mtr_jenis; ?></td>
                                                                    <td><?= $row->mtr_waktu; ?></td>
                                                                    <td><?= $row->mtr_selesai; ?></td>
                                                                    
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.box-body -->
                                                </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <?php if($getuser->usr_level <= 3) { ?>
                    <form method="POST" action="<?= base_url('pelatihan/peserta_drop'); ?>">
                    <input type="hidden" name="pel_id" value="<?= $pel->pel_id; ?>">

                    <div class="row">
                            <div class="col-md-6" >
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-fw fa-plus-square"></i></button>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                            </div>
                    </div>
                    <?php } ?>
                        <div class="box-body table-responsive">
                                <table id="datatable2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>No</th>
                                                                    <th>NPP</th>
                                                                    <th>Nama</th>
                                                                    <th>Unit Kerja</th>
                                                                    <th>Jabatan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $no=1;
                                                                foreach ($getpeserta as $row) 
                                                                {
                                                                ?>
                                                                    
                                                                <tr>
                                                                    <td><input type="checkbox" name="peserta[]" value="<?= $row->plt_id; ?>"></td>
                                                                    <td align='center'><?= $no++; ?></td>
                                                                    <td><?= $row->usr_username; ?></td>
                                                                    <td><?= $row->usr_firstname; ?> <?= $row->usr_lastname; ?></td>
                                                                    <td><?= $row->uk_nama; ?></td>
                                                                    <td><?= $row->jb_nama; ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.box-body -->
                                                </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
fungsi biaya belum aktif
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
fungsi quisioner belum aktif
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->

 

</div><!-- /.box -->

<div class="row">
        <div class="col-md-6" >
        
        </div>
        <div class="col-md-6" align="right">

        </div>
</div>


<!-- Large modal materi-->

<div class="modal fade bs-materi-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST" action="<?= base_url('pelatihan/materi_add'); ?>">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $pel->pel_nama; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                Materi : 
            </div>
            <div class="col-md-9" >
                <input type="text" name="mtr_nama" class="form-control" REQUIRED>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-3">
                Jenis : 
            </div>
            <div class="col-md-9" >
                <SELECT name="mtr_jenis" class="form-control">
                    <option value="soft">Softskill</option>
                    <option value="hard">Hardskill</option>
                </SELECT>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-3">
                Waktu Mulai : 
            </div>
            <div class="col-md-4" >
                <input type="text" name="mtr_waktu" id="mulai" class="form-control" REQUIRED>
            </div>
            <div class="col-md-1" align="center">
                s.d
            </div>
            <div class="col-md-3" >
                <input type="text" name="mtr_selesai" id="selesai" class="form-control">
            </div>
        </div>
        <br/>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Apply</button>
      </div>
      <input type="hidden" name="mtr_pel_id" value="<?= $pel->pel_id; ?>">
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST" action="<?= base_url('pelatihan/peserta_add'); ?>">
    <input type="hidden" name="pel_id" value="<?= $pel->pel_id; ?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $pel->pel_nama; ?></h4>
      </div>
      <div class="modal-body">
        <div class="box-body table-responsive">
                                    <table id="datatable3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>NPP</th>
                                                <th>Nama</th>
                                                <th>Unit Kerja</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($getusers as $row) 
                                            { ?>
                                                
                                            <tr>
                                                <td><input type="checkbox" name="peserta[]" value="<?= $row->usr_id; ?>"></td>
                                                <td align='center'><?= $no++; ?></td>
                                                <td><?= $row->usr_username; ?></td>
                                                <td><?= $row->usr_firstname; ?> <?= $row->usr_lastname; ?></td>
                                                <td><?= $row->uk_nama; ?></td>
                                                <td><?= $row->jb_nama; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Apply</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- data table -->
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/lte/plugin/datetimepicker'); ?>/jquery.datetimepicker.css"/ >
<script src="<?= base_url('assets/lte/plugin/datetimepicker') ?>/jquery.datetimepicker.js"></script>

<script type="text/javascript">
        
                $("#datatable1").dataTable();
                $("#datatable2").dataTable();
                $("#datatable3").dataTable();

        jQuery('#mulai').datetimepicker({
            mask: true,
            format: 'Y/m/d H:m:s'
        });

        jQuery('#selesai').datetimepicker({
            mask: true,
            datepicker: false,
            format: 'H:m:s'
        });

        
        $("#select-all").change(function(){
            $(".checkbox").prop('checked', $(this).prop("checked"));
      });

       
        

        </script>