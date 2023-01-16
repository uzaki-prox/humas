<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pengaduan/create'),'&nbsp Add', 'class="btn btn-primary glyphicon-plus"'); ?>
                <?php echo anchor(site_url('pengaduan/pengaduan_excel'),'&nbsp Export to Excel', 'class="btn btn-danger"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pengaduan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pengaduan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pengadu</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Konteks Pengaduan</th>
            <th>Ditujukan Kepada</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($pengaduan_data as $pengaduan)
            {
                ?>
                <tr>
            <td><?php echo $pengaduan->no_pengaduan ?></td>
            <td><?php echo $pengaduan->tgl ?></td>
            <td><?php echo $pengaduan->nama_pengadu ?></td>
            <td><?php echo $pengaduan->alamat ?></td>
            <td><?php echo $pengaduan->tlp ?></td>
            <td><?php echo $pengaduan->konteks_pengaduan ?></td>
            <td><?php echo $pengaduan->kepada ?></td>
            <td><?php echo $pengaduan->keterangan ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('pengaduan/update/'.$pengaduan->no_pengaduan),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
                echo '&nbsp | &nbsp'; 
                echo anchor(site_url('pengaduan/delete/'.$pengaduan->no_pengaduan),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>