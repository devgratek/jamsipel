
<select class="form-control" name="usr_jabatan" REQUIRED>
	<?php if (empty($param)) { ?>
	<option value="">-pilih unit kerja-</option>
	<?php } elseif (!$getjabatanbyid) { ?>
		<option value="">-tidak tersedia jabatan-</option>
	<?php } else { ?>
	
    <?php foreach ($getjabatanbyid as $row) { ?>
    <option value="<?= $row->jb_id; ?>"><?= $row->jb_nama; ?></option>
    <?php } ?>

    <?php } ?>
</select>