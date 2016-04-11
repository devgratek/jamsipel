<?php 
$getuser = $this->user_m->get();

 ?>
<!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?= $getuser->usr_username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?= base_url('assets/images/profile'); ?>/<?= $getuser->usr_photo; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= $getuser->usr_firstname; ?> <?= $getuser->usr_lastname; ?> - <?= $getuser->lvl_name; ?>
                                        <small>Member since <?= $getuser->usr_created; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php 
                                        $npp = $this->encrypt->encode($getuser->usr_username);
                                        $npp = str_replace(array('+', '/', '='), array('-', '_', '~'), $npp);
                                         ?>
                                        <a href="<?= base_url('user/profile'); ?>/<?= $npp; ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url();?>user/logout/" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>