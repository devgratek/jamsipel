
<style type="text/css">
   table {
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        padding: 10px;
    }
    hr{
        border-color: #000000;
    }
</style>
<table width="100%" >
    <tr>
        <td align="center">
            <img src="<?= base_url('assets/images/logo-jm.png'); ?>" width="80">
        </td>
        <td>
            <b>SISTEM INFORMASI PELATIHAN KERJA</b><br>
            <b>PT JASA MARGA (PERSERO), Tbk</b><br>
            <b>Cabang Purbaleunyi</b>
        </td>
        <td valign="top">
                Nomor : <?= $pel->pel_kode; ?>
                <hr>
                Jenis : <?= $pel->jns_nama; ?>
                <hr>
                Penyelenggara : <?= $pel->pel_penyelenggara; ?>
                <hr>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
            <b>Jadual Pelatihan <?= $pel->pel_nama; ?></b>
        </td>
    </tr>
</table>
<table width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Materi</th>
            <th>Jenis</th>
            <th>Mulai</th>
            <th>Selesai</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1;
        foreach ($getmateri as $row){
        ?>                                                          
        <tr>
            <td align='center'><?= $no++; ?></td>
            <td><?= $row->mtr_nama; ?></td>
            <td><?= $row->mtr_jenis; ?></td>
            <td><?= $row->mtr_waktu; ?></td>
            <td><?= $row->mtr_selesai; ?></td>
                                                                    
        </tr>
        <?php } ?>
    </tbody>
</table>
<div style="width:100%;">
    <div style="float:left; width:60%;">
        <table>
            <tr>
                <td>Tempat : <?= $pel->pel_tempat; ?></td>
            </tr>
            <tr>
                <td>Keterangan<br><?= (empty($pel->pel_keterangan)) ? 'Tidak ada keterangan' : $pel->pel_keterangan; ?></td>
            </tr>
        </table>
    </div>
    <div style="float:right; text-align:right; width:30%; ">
        <img src="<?= base_url('assets/images/profile'); ?>/<?= $getprofile->usr_photo; ?>" width="80" alt="pas photo"><br/>
        <?= $getprofile->usr_username; ?><br>
        <?= $getprofile->usr_firstname; ?> <?= $getprofile->usr_lastname; ?><br/>
        <?= $getprofile->uk_nama; ?><br>
        <?= $getprofile->jb_nama; ?><br>
    </div>
</div>
