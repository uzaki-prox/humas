<?php
$tamu = $this->db->query("SELECT no_tamu FROM buku_tamu")->num_rows();
$psb = $this->db->query("SELECT no_psb FROM psb")->num_rows();
$pengaduan = $this->db->query("SELECT no_pengaduan FROM pengaduan")->num_rows();
?>
<div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"> News</h3>
              </div>
              <div class="panel-body">
                <div class="content-row">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">JUMLAH TAMU YANG HADIR</h3>
                        </div>
                        <div class="panel-body">
                          <?php echo $tamu ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">JUMLAH KONTAK PSB</h3>
                        </div>
                        <div class="panel-body">
                        <?php echo $psb ?>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h3 class="panel-title">JUMLAH PENGADUAN</h3>
                        </div>
                        <div class="panel-body">
                          <?php echo $pengaduan ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div><!-- panel body -->
            </div>