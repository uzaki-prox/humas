<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            
        </div>
        <table class="table">
        <tr>
            <td style="width: 50px;">NIP</td>
            <td style="width: 10px;">:</td>
            <td><?php echo $this->session->userdata('nip'); ?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('nama_pegawai'); ?></td>
        </tr>
        <tr>
            <td>LEVEL</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('level'); ?></td>
        </tr>
        <tr>
            <td><?php echo anchor(site_url('change_pass/cpw'),'Change Password','class="btn btn-danger"'); ?></td>
        </tr>
        </table>
        