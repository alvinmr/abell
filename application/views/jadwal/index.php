<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">                          
                <h1 id="jam"></h1>
                <h1 id="hasil"></h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card text-center">
                  <div class="card-header">
                    <h4 style="font-size: 28px;">Jadwal Bell Hari <?= nama_hari(date('Y-m-d')); ?></h4>                    
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                      <table class="table table-bordered" id="table-1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Suara Bel</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $i = 0; foreach($jadwal_hari as $j): ?>
                          <?php $i++;  ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $j['hari'] ?></td>
                            <td style="font-weight: bold;"><?= date('H:i',strtotime($j['jam'])) ?></td>
                            <td><?= $j['audio'] ?></td>
                            <td><?= $j['keterangan'] ?></td>                       
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </section>
      </div>
