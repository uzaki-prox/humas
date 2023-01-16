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
        <h2 style="margin-top:0px">Buku PSB Read</h2>
        <table class="table">
	    <tr><td>No</td><td><?php echo $no_psb; ?></td></tr>
        <tr><td>Tanggal</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Nama Tamu</td><td><?php echo $nama_psb; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Info Dari</td><td><?php echo $info_dari; ?></td></tr>
        <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('buku_tamu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>