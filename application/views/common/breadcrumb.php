<ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <?php if ($this->uri->segment(1) == "") { ?>
                            <li class="active">Dashboard</li>
                        <?php } else if($this->uri->segment(2) == "") { ?>
                           <li class="active"><?= $this->uri->segment(1); ?></li>
                        <?php } else if($this->uri->segment(3) == "") { ?>
                            <li><?= $this->uri->segment(1); ?></li>
                            <li class="active"><?= $this->uri->segment(2); ?></li>
                        <?php } else { ?>
                            <li><?= $this->uri->segment(1); ?></li>
                            <li class="active"><?= $this->uri->segment(2); ?></li>
                        <?php }
                         ?>
                    </ol>