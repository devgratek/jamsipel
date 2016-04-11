<form method="POST" action="<?= base_url('user/save_password') ?>">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Password</h3>
  </div>

  <div class="panel-body">
    <div class="row">
	  <div class="col-md-4">Username</div>
	  <div class="col-md-8">: <?= $npp; ?><input type="hidden" name="usr_username" value="<?= $npp; ?>"></div>
	</div>
  </div>

  <div class="panel-body">
    <div class="row">
	  <div class="col-md-4">Password Sekarang</div>
	  <div class="col-md-4"><input type="password" name="usr_password_now" class="form-control" placeholder="password sekarang" REQUIRED></div>
	</div>
  </div>

  <div class="panel-body">
    <div class="row">
	  <div class="col-md-4">Password Baru</div>
	  <div class="col-md-4"><input id="password_baru" name="usr_password_new" type="password" class="form-control" placeholder="password baru" minlength="4" REQUIRED></div>
	  <div class="col-md-2"><p id="password_complexity" class="inline-hints sidetip"></p></div>
	</div>
  </div>

  <div class="panel-body">
    <div class="row">
	  <div class="col-md-4">Konfirmasi Password Baru</div>
	  <div class="col-md-4"><input id="ulangi_password_baru" name="usr_password_new2" type="password" class="form-control" placeholder="ulangi password baru" REQUIRED></div>
	  <div class="col-md-2"><p id="password_match" class="inline-hints sidetip"></p></div>
	</div>
  </div>

  <div class="panel-body">
    <div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-8"><button type="submit" class="btn btn-primary">Save</button></div>
	</div>
  </div>
</div>
</form>
<center>
	<?= (isset($notify)) ? 
                    "<div class='alert alert-warning alert-dismissable'>
                                        <i class='fa fa-warning'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        $notify
                                        </div>" 
                        : '' ; ?>
</center>

		<!-- password -->
        <script src="<?= base_url(); ?>assets/lte/js/jquery.YAPSM.js"></script>
        <script>
        	$(document).ready(function() {
			  $("#ulangi_password_baru").keyup(validate);
			});


			function validate() {
			  var password1 = $("#password_baru").val();
			  var password2 = $("#ulangi_password_baru").val();

			    
			 
			    if(password1 == password2) {
			       $("#password_match").text("");        
			    }
			    else {
			        $("#password_match").text("Password tidak sama");  
			    }
			    
			}
        	

            $("#password_baru").yapsm({
                dictionary: function() {
                    return ["admin", "test123"];
                }
            })
            .keyup(function() {
                $("#password_complexity").html(this.complexity);
            });

            
        </script>