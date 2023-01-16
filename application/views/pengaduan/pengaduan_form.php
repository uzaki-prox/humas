<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">No Pengaduan <?php echo form_error('no_pengaduan') ?></label>
            <input type="text" class="form-control" name="no_pengaduan" id="no_pengaduan" value="<?php echo $no_pengaduan; ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo $tgl; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nama Pengadu <?php echo form_error('nama_pengadu') ?></label>
            <input type="text" class="form-control" name="nama_pengadu" id="nama_pengadu" placeholder="Nama Pengadu" value="<?php echo $nama_pengadu; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Alamat </label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Telepon <?php echo form_error('tlp') ?></label>
            <input type="text" class="form-control" name="tlp" id="tlp" placeholder="Telepon" value="<?php echo $tlp; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Konteks Pengaduan <?php echo form_error('konteks_pengaduan') ?></label>
            <textarea class="form-control" name="konteks_pengaduan" id="konteks_pengaduan" placeholder="Konteks Pengaduan"><?php echo $konteks_pengaduan; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int">Ditujukan Kepada <?php echo form_error('kepada') ?></label>
            <input type="text" class="form-control" name="kepada" id="kepada" placeholder="Ditujukan Kepada" value="<?php echo $kepada; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
        <input type="hidden" name="no_pengaduan" value="<?php echo $no_pengaduan; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('pengaduan') ?>" class="btn btn-default">Cancel</a>
    </form>