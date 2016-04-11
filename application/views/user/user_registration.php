<?= form_open_multipart("user/save/" . $edit);?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Form Registerasi Karyawan Baru</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Save</button> 
            <button class="btn btn-danger btn-flat"><i class="fa fa-fw fa-times"></i> Cancel</button>
        </div>
    </div><!-- /.box-header -->
    <br/>
    <div class="row">
        <div class="col-md-2">Nama*</div>
        <div class="col-md-5"><input type="text" class="form-control" name="usr_firstname" placeholder="nama depan" REQUIRED></div>
        <div class="col-md-4"><input type="text" class="form-control" name="usr_lastname" placeholder="nama belakang"></div>
     </div>
     <br>
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Data Pribadi</a></li>
                <li><a href="#tab_2" data-toggle="tab">Data Dinas</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                 
                <div class="row">
                    <div class="col-md-2">NPP*</div>
                    <div class="col-md-4"><input type="number" class="form-control" maxlength="5" name="usr_username" placeholder="NPP sebagai username" REQUIRED></div>
                    <div class="col-md-2" align="right">Level</div>
                    <div class="col-md-3">
                        <select class="form-control" name="usr_level">
                            <?php foreach ($getlevels as $row) { ?>
                            <option value="<?= $row->lvl_id; ?>" <?= ($row->lvl_id == 4) ? 'SELECTED' : '' ; ?>><?= $row->lvl_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"> Password*</div>
                    <div class="col-md-4"><input type="password" class="form-control" minlength='3' name="usr_password" placeholder="password untuk login di portal ini" REQUIRED></div>
                    <div class="col-md-2" align="right">Agama</div>
                    <div class="col-md-3">
                        <select class="form-control" name="usr_agama">
                        <?php for ($i=0; $i < 6; $i++) { ?>
                        
                            <option value="<?= $getagama[$i]; ?>"><?= $getagama[$i]; ?></option>

                        <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"> Jenis Kelamin</div>
                    <div class="col-md-4"> 
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary active">
                            <input type="radio" name="usr_jk" value="l" checked>Laki-laki
                          </label>
                          <label class="btn btn-primary">
                            <input type="radio" name="usr_jk" value="p" >Perempuan
                          </label>                
                        </div>
                    </div>
                    <div class="col-md-2" align="right"> Email</div>
                    <div class="col-md-3">
                        <input type="email" class="form-control" name="usr_email" placeholder="cth. namaemail@gmail.com"></div>
                    </div>
                <br>
                
                <div class="row">
                    <div class="col-md-2"> Tempat, Tanggal Lahir</div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="usr_tempat_lhr" placeholder="Tempat Lahir">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="usr_tanggal_lhr" id="datepicker" placeholder="Tanggal Lahir">
                    </div>
                </div>
                
                <br>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                
                <div class="row">
                    <div class="col-md-2">Pas Photo</div>
                    <div class="col-md-4">

                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?= base_url('assets/images/profile'); ?>/default.png" alt="Pas Photo 5 x 6">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                      <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="userfile"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                    </div>

                    </div>
                    <div class="col-md-5">
                        <table width="100%">
                            <tr>
                                <td>Golongan</td>
                                <td>
                                    <select class="form-control" name="usr_golongan">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($getgolongan as $row) { ?>
                                        <option value="<?= $row->gol_id; ?>" ><?= $row->gol_nama; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Karyawan</td>
                                <td>
                                    <select name="usr_status" class="form-control">
                                        <option value="1" SELECTED>TETAP</option>
                                        <option value="0">PENSIUN</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>No Kontak</td>
                                <td>
                                    <input type="text" class="form-control" name="usr_hp" placeholder="Telp/hp/bbm">
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-2">Unit Kerja</div>
                    <div class="col-md-4">
                        <select class="form-control" id="unit_kerja" name="usr_unit_kerja">
                            <option value="">-Pilih-</option>
                            <?php foreach ($getunitkerja as $row) { ?>
                            <option value="<?= $row->uk_id; ?>" ><?= $row->uk_nama; ?></option>
                            <?php } ?>
                        </select></div>
                    <div class="col-md-3" align="right">Baris</div>
                    <div class="col-md-2">
                        <select class="form-control" name="usr_baris">
                            <option value="">-Pilih-</option>
                            <?php foreach ($getbaris as $row) { ?>
                            <option value="<?= $row->br_id; ?>"><?= $row->br_nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">Jabatan</div>
                    <div class="col-md-4" id="jabatan_select">
                        <select class="form-control" name="usr_jabatan">
                            <option value="">-Pilih Unit Kerja-</option>
                        </select>
                    </div>
                    <div class="col-md-3" align="right">Ruang</div>
                    <div class="col-md-2">
                        <select class="form-control" name="usr_ruang">
                            <option value="">-Pilih-</option>
                            <?php foreach ($getruang as $row) { ?>
                            <option value="<?= $row->ru_id; ?>"><?= $row->ru_nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->

        
        * Harus diisi.
</div><!-- /.box -->
</form>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/lte/plugin/datetimepicker'); ?>/jquery.datetimepicker.css"/ >
<script src="<?= base_url('assets/lte/plugin/datetimepicker') ?>/jquery.datetimepicker.js"></script>

<script type="text/javascript">
    jQuery('#datepicker').datetimepicker({
        mask: true,
        timepicker: false,
        format: 'Y/m/d'
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