<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">No <?php echo form_error('no_tamu') ?></label>
        <input type="text" class="form-control" name="no_tamu" id="no_tamu" placeholder="No" value="<?php echo $no_tamu; ?>" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo $tgl; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Tamu <?php echo form_error('nama_tamu') ?></label>
        <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" placeholder="Nama Tamu" value="<?php echo $nama_tamu; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">No Telepon <?php echo form_error('tlp') ?></label>
        <input type="text" class="form-control" name="tlp" id="tlp" placeholder="Telepon" value="<?php echo $tlp; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Keperluan <?php echo form_error('keperluan') ?></label>
        <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Keperluan" value="<?php echo $keperluan; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
    </div>
    <input type="hidden" name="no_tamu" value="<?php echo $no_tamu; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('buku_tamu') ?>" class="btn btn-default">Cancel</a>
</form>