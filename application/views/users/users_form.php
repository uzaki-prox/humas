<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">NIP <?php echo form_error('nip') ?></label>
        <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama User <?php echo form_error('nama_pegawai') ?></label>
        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Password <?php echo form_error('password') ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
    </div>
    <div class="form-group">
        <label for="varchar">Level <?php echo form_error('level') ?></label>
        <!-- <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /> -->
        <select name="level" class="form-control">
            <option value="admin">admin</option>
            <option value="pegawai">pegawai</option>
        </select>
    </div>
    <!--<input type="hidden" name="nip" value="<?php echo $nip; ?>" /> -->
    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
</form>