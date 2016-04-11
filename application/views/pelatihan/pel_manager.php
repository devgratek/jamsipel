<?= (isset($notify)) ? $notify : "" ; ?>

<a href="<?= base_url('pelatihan/registration'); ?>" class="btn btn-app" title="create new Pelatihan">
    	<i class="fa fa-file-o"></i> New Pelatihan
</a>
<div class="box">
	
                                <div class="box-header">
                                    <h3 class="box-title">Data Pelatihan</h3>
                                </div><!-- /.box-header -->
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
                            </div><!-- /.box -->

<!-- data table -->
        <link href="<?php echo base_url()?>assets/lte/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 
<!-- data table -->
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
        
                $("#datatable1").dataTable();
                $("#datatable2").dataTable();
                $("#datatable3").dataTable();
</script>