<?php $this->load->view("templete/lte/views/head"); ?> 
    <body class="bg-white">
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-7"><br><br>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:80%;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?= base_url('assets/images/slideshow/StrukturApr15.jpg'); ?>" width="100%" height="300" alt="Struktur Organisasi Cabang" align="center">
              <div class="carousel-caption">
                Struktur Organisasi Jasamarga Cabang Purbaleunyi Per April 2015
              </div>
            </div>
            <div class="item">
              <img src="<?= base_url('assets/images/slideshow/struktur_organisasi_pusat.png'); ?>" width="100%" height="300" alt="Struktur Organisasi Pusat">
              <div class="carousel-caption">
                Struktur Organisasi Jasamarga Pusat
              </div>
            </div>
            
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> <!-- end carousel -->
      </div>
      <div class="col-md-4">

    <center><H2>Sistem Informasi Pelatihan<br>PT JASAMARGA (PERSERO)</H2></center>
        <div class="form-box" id="login-box">

            <div class="header bg-blue">Login Karyawan</div>
            
            <form action="<?= base_url() . 'user/auth/'; ?>" method="POST">
                
                <div class="body bg-gray">
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="form-control" value="<?= (isset($u)) ? $u : '' ; ?>" placeholder="Username" REQUIRED/>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" REQUIRED/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer bg-blue">                                                               
                    <button type="submit" class="btn bg-gray btn-block"><span class='glyphicon glyphicon-log-in'></span> Login</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                    
                    <center><?= (isset($notify)) ? 
                    "<div class='alert alert-warning alert-dismissable'>
                                        <i class='fa fa-warning'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        $notify
                                        </div>" 
                        : '' ; ?></center>
                </div>
            </form>
            
            <div class="margin text-center">
                <span>Copyright &copy; <a href="http://cyberkay.hol.es/" target="blank" title="visit developer">Cyberkay Dev</a></span>

            </div>
        </div>
        </div>
    </div> <!-- end row -->
<?php $this->load->view("templete/lte/views/footer"); ?> 