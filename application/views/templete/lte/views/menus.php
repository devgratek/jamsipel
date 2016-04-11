<?php 
$getuser = $this->user_m->get();

 ?>
<!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?= ($this->uri->segment(1) == "") ? "class='active'" : "" ; ?>>
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li <?= ($this->uri->segment(2) == "mymenu") ? "class='treeview active'" : "class='treeview'" ; ?>>
                            <a href="#">
                                <i class="glyphicon glyphicon-th-list"></i>
                                <span>My Menus</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php 
                                $npp = $this->encrypt->encode($getuser->usr_username);
                                $npp = str_replace(array('+', '/', '='), array('-', '_', '~'), $npp);
                                 ?>
                                <li><a href="<?= base_url('user/profile'); ?>/<?= $npp; ?>"><i class="fa fa-user"></i>Profile</a></li>
                            </ul>
                        </li>
                        <?php if($getuser->usr_level <= 3) { ?>
                        <li <?= ($this->uri->segment(1) == "user") ? "class='treeview active'" : "class='treeview'" ; ?>>
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Modul Karyawan </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('user/manager'); ?>"><i class="fa fa-table"></i>Data Karyawan</a></li>
                                <li><a href="<?= base_url('user/unit_jabatan'); ?>"><i class="fa fa-sitemap"></i>Unit Kerja & Jabatan</a></li>
                                <li><a href="<?= base_url('user/gol_baris_ruang'); ?>"><i class="fa fa-puzzle-piece"></i>Gol, Baris & Ruang</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li <?= ($this->uri->segment(1) == "pelatihan") ? "class='treeview active'" : "class='treeview'" ; ?>>
                            <a href="#">
                                <i class="fa fa-trophy"></i>
                                <span>Modul Pelatihan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('pelatihan/myhistory'); ?>/<?= $getuser->usr_username; ?>"><i class="fa fa-user"></i>Pelatihan Saya</a></li>
                                <?php if($getuser->usr_level <= 3) { ?>
                                <li><a href="<?= base_url('pelatihan/manager'); ?>"><i class="fa fa-table"></i>Data Pelatihan</a></li>
                                <li><a href="#"><i class="fa fa-book"></i>Laporan Pelatihan</a></li>
                                <?php } ?>
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i> <span>System</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="glyphicon glyphicon-book"></i> Log</a></li>
                                <li><a href="<?= base_url('sistem/info'); ?>"><i class="glyphicon glyphicon-info-sign"></i> System Info</a></li>
                            </ul>
                        </li> 

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-info-circle"></i> <span>Help</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> About</a></li>
                            </ul>
                        </li>
                       
                    </ul>