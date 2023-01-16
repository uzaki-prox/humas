<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>NIP</th>
        <th>Nama Pegawai</th>
        <th>Level</th>
        <th>Action</th>
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $users->nip ?></td>
            <td><?php echo $users->nama_pegawai ?></td>
            <td><?php echo $users->level ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('users/update/'.$users->nip),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
            echo '&nbsp | &nbsp'; 
            echo anchor(site_url('users/delete/'.$users->nip),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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