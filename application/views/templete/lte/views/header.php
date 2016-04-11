    <?php $this->load->view("templete/lte/views/head"); ?> 
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?= base_url(); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="<?= base_url('assets/images/logo-jm.png'); ?>" height='40'>JAMSIPEL<sup>Beta</sup>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php $this->load->view("templete/lte/views/message"); ?> 
                        <?php $this->load->view("templete/lte/views/mod_user"); ?> 
                    </ul>
                </div>
            </nav>
        </header>