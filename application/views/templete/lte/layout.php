<?php 
if ($this->session->userdata('sess_login') != "172jmsiplkay104"){
        $templete           = 'user/user_login';
        $data['title']      = "Sistem informasi Pelatihan - PT JASAMARGA PERSERO";
        $data['contents'] = "common/dashboard";
        $this->load->view($templete, $data);
} 
else 
{
    $getuser = $this->user_m->get();
    $data['getuser'] = $getuser;

 ?>
<?php $this->load->view("templete/lte/views/header"); ?> 

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url('assets/images/profile'); ?>/<?= $getuser->usr_photo; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?= $getuser->usr_firstname; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <?php $this->load->view("templete/lte/views/menus"); ?> 
                </section>
                <!-- /.sidebar -->
            </aside>

            
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= ($this->uri->segment(1) == "") ? "Dashboard" : $this->uri->segment(2); ?>
                        <small><?= ($this->uri->segment(1) == "") ? "Control Panel" : $this->uri->segment(1); ?></small>
                    </h1>
                    <?php $this->load->view("common/breadcrumb"); ?> 
                </section>
                <section class="content">
                   <?php $this->load->view($contents, $data); ?>    
                </section>
            </aside><!-- /.right-side -->
            
            
            
            
            
            
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->



<?php $this->load->view("templete/lte/views/footer"); ?> 
<?php } ?>