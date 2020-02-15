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

                <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
                <?= $this->session->flashdata('message') ?>   

                  <div class="card text-center">                  
                  <div class="card-header">
                    <h4 style="font-size: 28px;">Audio</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#additem">
                    Add Item
                    </button>
                  </div>
                  <div class="card-body">
                  
                    <div class="table-responsive">
                      <table class="table table-bordered" id="table-1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama File</th>   
                            <th>Action</th>                         
                          </tr>
                        </thead>

                        <tbody>
                          <?php $i = 0; foreach($audio as $a): ?>
                          <?php $i++;  ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $a['file_name'] ?></td>     
                            <td>
                              <a href='<?= base_url("audio/deleteaudio/") . $a["id"] ?>' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>								
                            </td>                       
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

        <!-- Modal Add -->>
        <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="additemLabel">Unggah Audio</h5>                        
                    </div>

                    <?= form_open_multipart('audio/addaudio'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Audio</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="audio_file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        
        
