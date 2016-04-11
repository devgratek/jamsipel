<?= (isset($notify)) ? $notify : "" ; ?>
<a href="<?= base_url('user/registration'); ?>" class="btn btn-app" title="Tambah Kayrawan Baru">
    	<i class="fa fa-file-o"></i> Karyawan Baru
</a>
<div class="box">
	
                                <div class="box-header">
                                    <h3 class="box-title">Data Karyawan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NPP</th>
                                                <th>Nama</th>
                                                <th>Unit Kerja</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                        	$no=1;
                                        	foreach ($getusers as $row) 
                                        	{ ?>
                                        		
                                            <tr>
                                                <td align='center'><?= $no++; ?></td>
                                                <td><?= $row->usr_username; ?></td>
                                                <td><?= $row->usr_firstname; ?> <?= $row->usr_lastname; ?></td>
                                                <td><?= $row->uk_nama; ?></td>
                                                <td><?= $row->jb_nama; ?></td>
                                                <td align='center'>
                                                    <?php 
                                                    $npp = $this->encrypt->encode($row->usr_username);
                                                    $npp = str_replace(array('+', '/', '='), array('-', '_', '~'), $npp);
                                                     ?>
                                                	<a href="<?= base_url('user/profile') ?>/<?= $npp; ?>">
                                                        <button type="button" class="btn btn-primary"><i title="Detail karyawan <?= $row->usr_firstname; ?>" class="fa fa-fw fa-list-alt"></i></button>
                                                    </a>
                                                	<a href="<?= base_url('user/delete') ?>/<?= $npp; ?>" onclick="return confirm('Anda yakin akan menghapus karyawan dengan npp <?= $row->usr_username; ?>?')">
                                                        <button type="button" class="btn btn-danger"><i title="delete user <?= $row->usr_username; ?> ?" class="fa fa-fw fa-trash-o"></i></button>
                                                    </a>
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

        </script>