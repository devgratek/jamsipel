<div class="panel panel-primary">
    <div class="panel-heading">Kilas Informasi</div>
    <div class="panel-body">
        <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
            - Selamat datang di portal sistem informasi pelatihan kerja.
            - Aplikasi masih dalam tahap pembangunan mohon bantu kami dengan memberikan kritik dan saran ke Kiki.kiswanto22@gmail.com
            - Laporkan jika masih terdapat bugs/error kepada admin atau email pengembang.
        </marquee>
  </div>
</div>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        44
                                    </h3>
                                    <p>
                                        Pelatihan berjalan
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tasks"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        53<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Statistik Pelatihan
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?= $this->user_m->count(); ?>
                                    </h3>
                                    <p>
                                        Karyawan Aktif
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-group"></i>
                                </div>
                                <?php if($getuser->usr_level <= 3) { ?>
                                <a href="<?= base_url('user/manager'); ?>" title="lihat data karyawan" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                <?php } else { ?>
                                    <a href="#" title="Anda tidak memiliki hak akses pada modul ini" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                <?php } ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                                <div class="small-box bg-red"><!-- box red -->
                                    <div class="inner">
                                        <h3>
                                            <?= $getvisitor; ?>
                                        </h3>
                                        <p>
                                            Unique Visitors
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                                <!-- unique visitor -->
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">                            

                            <!-- monitor karyawan -->
                            <div class="box">
    
                                <div class="box-header">
                                    <h3 class="box-title">Pencapaian Pelatihan Kerja Kayawan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NPP</th>
                                                <th>Nama</th>
                                                <th>Softskill</th>
                                                <th>Hardskill</th>
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
                                                <td>
                                                    <?= $row->usr_firstname; ?> <?= $row->usr_lastname; ?><br/>
                                                    Unit : <?= $row->uk_nama; ?><br/>
                                                    Jabatan : <?= $row->jb_nama; ?>
                                                </td>
                                                <td align="right">0</td>
                                                <td align="right">0</td>
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
        <!-- end monitor karyawan -->

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable"> 

                                                     

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->