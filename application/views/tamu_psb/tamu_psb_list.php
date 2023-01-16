<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('tamu_psb/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tamu_psb/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tamu_psb'); ?>" class="btn btn-default">Reset</a>
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
                <th>Nama Tamu</th>
                <th>Alamat</th>
                <th>Info Dari</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr><?php
            foreach ($psb_data as $psb)
            {
            ?>
            <tr>
                <td><?php echo $psb->no_psb ?></td>
                <td><?php echo $psb->tgl ?></td>
                <td><?php echo $psb->nama_psb ?></td>
                <td><?php echo $psb->alamat ?></td>
                <td><?php echo $psb->info_dari ?></td>
                <td><?php echo $psb->keterangan ?></td>
                <td style="text-align:center" width="200px">
                <?php 
                
                echo anchor(site_url('tamu_psb/update/'.$psb->no_psb),'Update'); 
                echo ' | '; 
                echo anchor(site_url('tamu_psb/delete/'.$psb->no_psb),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <div class="btn btn-primary">
                    Total Record : <?php echo $total_rows ?>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>