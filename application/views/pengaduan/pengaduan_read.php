<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">pengaduan Read</h2>
        <table class="table">
	    <tr><td>No</td><td><?php echo $no_pengaduan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama_pengadu; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
        <tr><td>Telepon</td><td><?php echo $tlp; ?></td></tr>
        <tr><td>Konteks Pengaduan</td><td><?php echo $konteks_pengaduan; ?></td></tr>
        <tr><td>Ditujukan Kepada</td><td><?php echo $kepada; ?></td></tr>
        <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengaduan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>