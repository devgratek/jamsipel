<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Unit Kerja dan Jabatan</h3>
    </div><!-- /.box-header -->
    <br/>
    <?= (isset($notify)) ? $notify : '' ; ?>
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Unit Kerja</a></li>
                <li><a href="#tab_2" data-toggle="tab">Jabatan</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                	
                 <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Data Unit Kerja
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <div class="box-body table-responsive">
					                                    <table id="datatable1" class="table table-bordered table-striped">
					                                        <thead>
					                                            <tr>
					                                                <th>No</th>
					                                                <th>Kode</th>
					                                                <th>Unit Kerja</th>
					                                                <th>Departemen</th>
					                                                <th>Order</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                        	<?php 
					                                        	$no=1;
					                                        	foreach ($getunitkerja as $row) 
					                                        	{ ?>
					                                        		
					                                            <tr>
					                                                <td align='center'><?= $no++; ?></td>
					                                                <td><?= $row->uk_kode; ?></td>
					                                                <td><?= $row->uk_nama; ?></td>
					                                                <td><?= $row->uk_departemen; ?></td>
					                                                <td><?= $row->uk_order; ?></td>
					                                                <td align='center'>
					                                                	<!-- <a href="#"><i title="edit unit <?= $row->uk_kode; ?> ?" class="fa fa-fw fa-pencil"></i></a> -->
					                                                	<a href="<?= base_url('user/unit_kerja_delete'); ?>/<?= $row->uk_kode; ?>" onclick="return confirm('apakah anda yakin akan menghapus unit <?= $row->uk_kode; ?> ?')"><i title="delete unit <?= $row->uk_kode; ?> ?" class="fa fa-fw fa-trash-o"></i></a>
					                                                </td>
					                                            </tr>
					                                            <?php } ?>
					                                        </tbody>
					                                    </table>
					                                </div><!-- /.box-body -->
                                                    
											        
									            </div>
                                            </div>
                                        </div>
                                        
                                        <form method="POST" action="<?= base_url('user/unit_kerja_save'); ?>">
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        Form Unit Kerja Baru
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="row">
									                    <div class="col-md-3">Kode</div>
									                    <div class="col-md-4">
									                    	<input type="text" class="form-control" name="uk_kode" maxlength="12" placeholder="Harus Unik" REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Nama Unit Kerja</div>
									                    <div class="col-md-6">
									                        <input type="text" class="form-control" name="uk_nama" placeholder="Nama unit kerja" REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Departemen</div>
									                    <div class="col-md-4">
									                        <select name="uk_departemen" class="form-control">
									                        	<option value='0'>-root-</option>
									                        <?php 
					                                        	$no=1;
					                                        	foreach ($getunitkerjakriteria as $row) 
					                                        	{ 
					                                        ?>
									                        	<option value="<?= $row->uk_kode; ?>"><?= $row->uk_nama; ?></option>
									                        	<?php } ?>
									                        </select>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Deskripsi</div>
									                    <div class="col-md-4">
									                        <textarea class="form-control" name="uk_desc" placeholder="Keterangan Unit Kerja"></textarea>
									                    </div>
									                </div>
									                <br>
									                <div class="row">
									                    <div class="col-md-3">Order</div>
									                    <div class="col-md-4">
									                        <input type="number" class="form-control" min='1' maxlength="3" name="uk_order" placeholder="Tingkatan Unit (angka 1-10)" REQUIRED>
									                    </div>
									                </div>
									                <br/>
											        <div class="row">
											            <div class="col-md-3"></div>
											            <div class="col-md-8">
											                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Save</button> 
											                <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-times"></i> Cancel</button>
											            </div>
											            <div class="col-md-1"></div>
											        </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                	<div class="panel box box-primary">
                		
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        Data Jabatan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse in">
                                            	<div class="box-body">
                                                    <div class="box-body table-responsive">
					                                    <table id="datatable2" class="table table-bordered table-striped">
					                                        <thead>
					                                            <tr>
					                                                <th>No</th>
					                                                <th>Kode</th>
					                                                <th>Jabatan</th>
					                                                <th>Unit Kerja</th>
					                                                <th>Order</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                        	<?php 
					                                        	$no=1;
					                                        	foreach ($getjabatan as $row) 
					                                        	{ ?>
					                                        		
					                                            <tr>
					                                                <td align='center'><?= $no++; ?></td>
					                                                <td><?= $row->jb_kode; ?></td>
					                                                <td><?= $row->jb_nama; ?></td>
					                                                <td><?= $row->uk_nama; ?></td>
					                                                <td><?= $row->jb_order; ?></td>
					                                                <td align='center'>
					                                                	<!-- <a href="#"><i title="edit user <?= $row->jb_kode; ?> ?" class="fa fa-fw fa-pencil"></i></a> -->
					                                                	<a href="<?= base_url('user/jabatan_delete'); ?>/<?= $row->jb_kode; ?>" onclick="return confirm('Apakah anda yakin akan menghapus jabatan <?= $row->jb_kode; ?> ?')"><i title="delete Jabatan <?= $row->jb_kode; ?> ?" class="fa fa-fw fa-trash-o"></i></a>
					                                                </td>
					                                            </tr>
					                                            <?php } ?>
					                                        </tbody>
					                                    </table>
					                                </div><!-- /.table responsive -->
                                                    
									        </div> <!-- box body -->
									
                                </div><!-- end of collaps -->
                            </div> <!-- end of panel -->
            <form method="POST" action="<?= base_url('user/jabatan_save'); ?>#jabatan">
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                        Form Jabatan Baru
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="row">
									                    <div class="col-md-3">Kode</div>
									                    <div class="col-md-4">
									                    	<input type="text" class="form-control" maxlength="12" name="jb_kode" placeholder="Harus Unik" REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Nama Jabatan</div>
									                    <div class="col-md-6">
									                        <input type="text" class="form-control" maxlength="60" name="jb_nama" placeholder="Nama Jabatan" REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Unit Kerja</div>
									                    <div class="col-md-6">
									                        <select name="jb_unit_kerja" class="form-control">
									                        <?php 
					                                        	$no=1;
					                                        	foreach ($getunitkerja as $row) 
					                                        	{ 
					                                        ?>
									                        	<option value="<?= $row->uk_id; ?>"><?= $row->uk_nama; ?></option>
									                        	<?php } ?>
									                        </select>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Deskripsi</div>
									                    <div class="col-md-6">
									                        <textarea class="form-control" name="jb_desc" placeholder="Keterangan Jabatan" ></textarea>
									                    </div>
									                </div>
									                <br>
									                <div class="row">
									                    <div class="col-md-3">Order</div>
									                    <div class="col-md-2">
									                        <input type="number" class="form-control" min='1' max='100' name="jb_order" placeholder="Tingkatan Jabatan (angka 1-10)" REQUIRED>
									                    </div>
									                </div>
									                <br/>
											        <div class="row">
											            <div class="col-md-3"></div>
											            <div class="col-md-8">
											                <button class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Save</button> 
											                <button class="btn btn-danger btn-flat"><i class="fa fa-fw fa-times"></i> Cancel</button>
											            </div>
											            <div class="col-md-1"></div>
											        </div>
                                                </div><!-- /.box-body -->
                                            </div> <!-- end of collaps -->
                                        </div> <!-- end of panel -->
                	
                </form>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->

        
</div><!-- /.box -->

<!-- data table -->
        <link href="<?php echo base_url()?>assets/lte/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
 
<!-- data table -->
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/lte/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
        
                $("#datatable1").dataTable();
                $("#datatable2").dataTable();
        </script>