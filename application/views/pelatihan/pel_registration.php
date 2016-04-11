<?= (isset($notify)) ? $notify : "" ; ?>
<br/>
<form action="<?= base_url('pelatihan/save') ?>/<?= $edit; ?>" method="POST">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Form Registerasi Pelatihan Baru</h3>
    </div><!-- /.box-header -->
    <br/>
	<div class="row">
        <div class="col-md-2">Kode*</div>
        <div class="col-md-4"><input type="text" class="form-control" name="kode" maxlength="25" REQUIRED></div>
        <div class="col-md-2"></div>
        <div class="col-md-4"></div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2">Nama Pelatihan*</div>
        <div class="col-md-6"><input type="text" class="form-control" name="nama" REQUIRED></div>
        <div class="col-md-4"></div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2">Jenis*</div>
        <div class="col-md-4">
        	<select name="jenis" class="form-control">
        	<?php foreach ($jenis as $row) { ?>
        		<option value="<?= $row->jns_id; ?>"><?= $row->jns_nama; ?></option>
        	<?php } ?>
        	</select>
        </div>
        <div class="col-md-2">Penyelenggara*</div>
        <div class="col-md-4">
        	<input type="text" name="penyelenggara" class="form-control" REQUIRED>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2">Tempat*</div>
        <div class="col-md-4">
        	<textarea class="form-control" name="tempat" REQUIRED></textarea>
        </div>
        <div class="col-md-2">Keterangan</div>
        <div class="col-md-4"><textarea class="form-control" name="ket"></textarea></div>
    </div>
    <br/>
    * Harus diisi.
</div><!-- /.box -->

	<div class="row">
        <div class="col-md-6"><a href="<?= base_url('pelatihan/manager'); ?>"><button class="btn btn-danger" type="button" ><i class="fa fa-times-circle"></i> Batal</button></a></div>
        <div class="col-md-6" align="right"><button class="btn btn-primary" type="submit">Simpan <i class="fa fa-arrow-circle-right"></i></button></div>
    </div>

</form>


<link rel="stylesheet" type="text/css" href="<?= base_url('assets/lte/plugin/datetimepicker'); ?>/jquery.datetimepicker.css"/ >
<script src="<?= base_url('assets/lte/plugin/datetimepicker') ?>/jquery.datetimepicker.js"></script>
<script type="text/javascript">
	jQuery('#datetimepicker').datetimepicker({
		mask: true,
		timepicker: false,
		format: 'Y/m/d'
	});
</script>