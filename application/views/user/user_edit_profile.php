<!-- start form -->
<?= form_open_multipart("user/save/" . $edit);?>
<center>
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        <img src="<?= base_url('assets/images/profile'); ?>/<?= $getprofile->usr_photo; ?>" alt="Pas Photo 5 x 6">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
        <div>
        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="userfile" value="<?= base_url('assets/images/profile'); ?>/<?= $getprofile->usr_photo; ?>"></span>
        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div><br/>

	<b><?= $npp; ?> <input type="hidden" name="usr_username" value="<?= $npp; ?>"/></b><br/>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <input type="text" class="form-control" name="usr_firstname" value="<?= $getprofile->usr_firstname; ?>" placeholder="Nama depan">
      </div>
      <div class="col-md-3">
        <input type="text" class="form-control" name="usr_lastname" value="<?= $getprofile->usr_lastname; ?>" placeholder="Nama depan">
      </div>
      <div class="col-md-3"></div>
    </div>
    <br/>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <select class="form-control" id="unit_kerja" name="usr_unit_kerja">
            <?php foreach ($getunitkerja as $row) { ?>
            <option value="<?= $row->uk_id; ?>" <?php echo ($getprofile->uk_id == $row->uk_id) ? 'SELECTED' : '' ; ?>><?= $row->uk_nama; ?></option>
            <?php } ?>
        </select>
      </div>
    </div><br/>

    <div class="row">
      <div class="col-md-6 col-md-offset-3" id="jabatan_select">
        <select class="form-control" name="usr_jabatan">
            <option value="<?= $getprofile->jb_id; ?>"><?= $getprofile->jb_nama; ?></option>
        </select>
      </div>
    </div><br/>
	
    
    <?= ($notify != "") ? 
            "<div class='alert alert-warning alert-dismissable'>
                <i class='fa fa-warning'></i>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                $notify
            </div>" 
    : '' ; ?>
</center>
<div class="panel box box-primary">
    <div class="box-header">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="tampilkan/sembunyikan profile">
                Edit Profile
            </a>
        </h4>
        <div class="box-tools pull-right">
            <!-- menu kanan -->
        </div>
    </div>
    <!-- end box header -->
    
    <div id="collapseOne" class="panel-collapse collapse in">
    <div class="box-body">

        <div class="row">
            <div class="col-md-2">Tempat lahir</div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="usr_tempat_lhr" value="<?= (isset($getprofile->usr_tempat_lhr)) ? $getprofile->usr_tempat_lhr : '' ; ?>" placeholder="Tempat Lahir">
            
            </div>
            <div class="col-md-2">Baris & Ruang</div>
            <div class="col-md-2">
                <select class="form-control" name="usr_baris">
                    <?php foreach ($getbaris as $row) { ?>
                    <option value="<?= $row->br_id; ?>" <?php echo ($getuser->usr_baris == $row->br_id) ? 'SELECTED' : '' ; ?>><?= $row->br_nama; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="usr_ruang">
                    <?php foreach ($getruang as $row) { ?>
                    <option value="<?= $row->ru_id; ?>" <?php echo ($getuser->usr_ruangan == $row->ru_id) ? 'SELECTED' : '' ; ?>><?= $row->ru_nama; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br>

    	<div class="row">
            <div class="col-md-2">Tanggal Lahir</div>
            <div class="col-md-4">
                <input type="text" id="datepicker" class="form-control" name="usr_tanggal_lhr" value="<?= $getprofile->usr_tanggal_lhr ; ?>" placeholder="YYYY-m-d">
            </div>
            <div class="col-md-2">Email</div>
            <div class="col-md-4">
                <input type="email" class="form-control" value="<?= (empty($getprofile->usr_email)) ? '' : $getprofile->usr_email; ?>" name="usr_email" placeholder="cth. namaemail@gmail.com">
            </div>
        </div><br>

    	<div class="row">
            <div class="col-md-2">Jenis Kelamin</div>
            <div class="col-md-4">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="usr_jk" value="l"  <?= ($getprofile->usr_jk == 'l') ? 'checked' : '' ;  ?>>Laki-laki
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="usr_jk" value="p" <?= ($getprofile->usr_jk == 'p') ? 'checked' : '' ;  ?>>Perempuan
                  </label>                
                </div>
            </div>
            <div class="col-md-2">No. Hp</div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?= (empty($getprofile->usr_hp)) ? '' : $getprofile->usr_hp; ?>" name="usr_hp" placeholder="Telp/hp/bbm/wa">
            
            </div>
        </div><br>
        
        <div class="row">
        	<div class="col-md-2">Golongan : </div>
            <div class="col-md-4">
                <select class="form-control" name="usr_golongan">
                    <?php foreach ($getgolongan as $row) { ?>
                    <option value="<?= $row->gol_id; ?>" <?php echo ($getprofile->usr_golongan == $row->gol_id) ? 'SELECTED' : '' ;  ?>><?= $row->gol_nama; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">Agama</div>
            <div class="col-md-4">
                <select class="form-control" name="usr_agama">
                <?php for ($i=0; $i < 6; $i++) { ?>
                        
                     <option value="<?= $getagama[$i]; ?>" <?php echo ($getprofile->usr_agama == $getagama[$i]) ? 'SELECTED' : '' ;  ?>><?= $getagama[$i]; ?></option>

                <?php } ?>
                </select>
            </div>
        </div>

    </div>
    <!-- end of body -->
    </div>
    <!-- end of collaps -->
</div>
<!-- end of box primary -->

<?php 
$npp = $this->encrypt->encode($getprofile->usr_username);
$npp = str_replace(array('+', '/', '='), array('-', '_', '~'), $npp);
?>
<div class="row">
  <div class="col-md-8">
    <a href="<?= base_url('user/profile') ?>/<?= $npp; ?>" title="batalkan perubahan"><button class="btn btn-danger" type="button"><i class='fa fa-rotate-left'></i> Cancel</button></a>
  </div>
  <div class="col-md-4" align="right">
    <button class="btn btn-primary" type="submit"><i class='fa fa-save'></i> Save</button>
  </div>
</div>
</form> <!-- end form -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/lte/plugin/datetimepicker'); ?>/jquery.datetimepicker.css"/ >
<script src="<?= base_url('assets/lte/plugin/datetimepicker') ?>/jquery.datetimepicker.js"></script>

<script type="text/javascript">
    jQuery('#datepicker').datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });

    $("#unit_kerja").change(function() {

        var base_url    = "<?= base_url(); ?>",
            unit_id     = $("#unit_kerja").val();

        $("#jabatan_select").html("<img src='" + base_url + "assets/images/icon/ajax-loader.gif' height='30' alt='tunggu sebentar...'/>");

        $.ajax({
            url: base_url + "user/jabatan_select/" + unit_id, 
            success: function(result){
                $("#jabatan_select").html(result);
        }});
    });
</script>