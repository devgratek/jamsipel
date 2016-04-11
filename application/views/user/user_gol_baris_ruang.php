
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Golongan, Baris dan Ruang</h3>
    </div><!-- /.box-header -->
    <br/>
    <?= (isset($notify)) ? $notify : '' ; ?>
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Golongan</a></li>
                <li><a href="#tab_2" data-toggle="tab">Baris</a></li>
                <li><a href="#tab_3" data-toggle="tab">Ruang</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <form method="POST" action="#">
                 <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Form Golongan Baru
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    
                                                    <div class="row">
									                    <div class="col-md-3">Golongan</div>
									                    <div class="col-md-4">
									                    	<input type="text" class="form-control" name="gol_nama" maxlength="12" placeholder="Nama Golongan" REQUIRED>
									                    </div>
									                </div>
									                <br>
									                <div class="row">
									                    <div class="col-md-3">Deskripsi</div>
									                    <div class="col-md-4">
									                        <textarea class="form-control" name="gol_desc" placeholder="Keterangan Golongan"></textarea>
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
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        Data Golongan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="box-body table-responsive">
					                                    <table id="datatable1" class="table table-bordered table-striped">
					                                        <thead>
					                                            <tr>
					                                                <th>No</th>
					                                                <th>Golongan</th>
					                                                <th>Deskripsi</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                        	<?php 
					                                        	$no=1;
					                                        	foreach ($getgolongan as $row) 
					                                        	{ ?>
					                                        		
					                                            <tr>
					                                                <td align='center'><?= $no++; ?></td>
					                                                <td><?= $row->gol_nama; ?></td>
					                                                <td><?= $row->gol_desc; ?></td>
					                                                <td align='center'>
					                                                	<!-- <a href="#"><i title="edit unit <?= $row->uk_kode; ?> ?" class="fa fa-fw fa-pencil"></i></a> -->
					                                                	<a href="#"><i title="delete golongan <?= $row->gol_nama; ?> ?" class="fa fa-fw fa-trash-o"></i></a>
					                                                </td>
					                                            </tr>
					                                            <?php } ?>
					                                        </tbody>
					                                    </table>
					                                </div><!-- /.box-body -->
                                                </div>
                                            </div>
                                        </div>

                
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                <div class="panel box box-primary">
                <form method="POST" action="#">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        Form Baris Baru
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse in">
                                                <div class="box-body">
									                <div class="row">
									                    <div class="col-md-3">Baris</div>
									                    <div class="col-md-4">
									                        <input type="text" class="form-control" maxlength="60" name="br_nama" placeholder="Masukkan baris..." REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Deskripsi</div>
									                    <div class="col-md-4">
									                        <textarea class="form-control" name="br_desc" placeholder="Keterangan Baris" ></textarea>
									                    </div>
									                </div>
									                <br>
											        <div class="row">
											            <div class="col-md-3"></div>
											            <div class="col-md-8">
											                <button class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Save</button> 
											                <button class="btn btn-danger btn-flat"><i class="fa fa-fw fa-times"></i> Cancel</button>
											            </div>
											            <div class="col-md-1"></div>
											        </div>
									            </div>
                                            </div>
                                        </div>
            </form>
                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                        Data Baris
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="box-body table-responsive">
					                                    <table id="datatable2" class="table table-bordered table-striped">
					                                        <thead>
					                                            <tr>
					                                                <th>No</th>
					                                                <th>Baris</th>
					                                                <th>Deskripsi</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                        	<?php 
					                                        	$no=1;
					                                        	foreach ($getbaris as $row) 
					                                        	{ ?>
					                                        		
					                                            <tr>
					                                                <td align='center'><?= $no++; ?></td>
					                                                <td><?= $row->br_nama; ?></td>
					                                                <td><?= $row->br_desc; ?></td>
					                                                <td align='center'>
					                                                	<!-- <a href="#"><i title="edit user <?= $row->jb_kode; ?> ?" class="fa fa-fw fa-pencil"></i></a> -->
					                                                	<a href="#" ><i title="delete baris <?= $row->br_nama; ?> ?" class="fa fa-fw fa-trash-o"></i></a>
					                                                </td>
					                                            </tr>
					                                            <?php } ?>
					                                        </tbody>
					                                    </table>
					                                </div><!-- /.box-body -->
                                                </div>
                                            </div>
                                        </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                <div class="panel box box-primary">
                <form method="POST" action="#">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                                        Form Ruang Baru
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    
                                                    <div class="row">
									                    <div class="col-md-3">Ruang</div>
									                    <div class="col-md-4">
									                    	<input type="text" class="form-control" maxlength="12" name="ru_nama" placeholder="Harus Unik" REQUIRED>
									                    </div>
									                </div>
									                <br/>
									                <div class="row">
									                    <div class="col-md-3">Deskripsi</div>
									                    <div class="col-md-4">
									                        <textarea class="form-control" name="ru_desc" placeholder="Keterangan Ruang" ></textarea>
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
									            </div>
                                            </div>
                                        </div>
            </form>
                                         <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                                        Data Ruang
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="box-body table-responsive">
					                                    <table id="datatable3" class="table table-bordered table-striped">
					                                        <thead>
					                                            <tr>
					                                                <th>No</th>
					                                                <th>Ruang</th>
					                                                <th>Deskripsi</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                        	<?php 
					                                        	$no=1;
					                                        	foreach ($getruang as $row) 
					                                        	{ ?>
					                                        		
					                                            <tr>
					                                                <td align='center'><?= $no++; ?></td>
					                                                <td><?= $row->ru_nama; ?></td>
					                                                <td><?= $row->ru_desc; ?></td>
					                                                <td align='center'>
					                                                	<!-- <a href="#"><i title="edit user <?= $row->jb_kode; ?> ?" class="fa fa-fw fa-pencil"></i></a> -->
					                                                	<a href="#"><i title="delete ruang <?= $row->ru_nama; ?> ?" class="fa fa-fw fa-trash-o"></i></a>
					                                                </td>
					                                            </tr>
					                                            <?php } ?>
					                                        </tbody>
					                                    </table>
					                                </div><!-- /.box-body -->
                                                </div>
                                            </div>
                                        </div>
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
                $("#datatable3").dataTable();
        </script>