<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">No <?php echo form_error('no_psb') ?></label>
        <input type="text" class="form-control" name="no_psb" id="no_psb" placeholder="No" value="<?php echo $no_psb; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo $tgl; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Tamu <?php echo form_error('nama_psb') ?></label>
        <input type="text" class="form-control" name="nama_psb" id="nama_psb" placeholder="Nama Tamu" value="<?php echo $nama_psb; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Info Dari <?php echo form_error('info_dari') ?></label>
        <input type="text" class="form-control" name="info_dari" id="info_dari" placeholder="Info Dari" value="<?php echo $info_dari; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
    </div>
    <input type="hidden" name="no_psb" value="<?php echo $no_psb; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('tamu_psb') ?>" class="btn btn-default">Cancel</a>
</form>