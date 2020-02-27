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
							<h4 style="font-size: 28px;">Pengaturan Jadwal Bell</h4>
							<button
								type="button"
								class="btn btn-primary"
								data-toggle="modal"
								data-target="#additem"
							>
								Add Item
							</button>
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
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody >
										<?php $i = 0; foreach($jadwal as $j): ?>
										<?php $i++;  ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $j['hari'] ?></td>
											<td style="font-weight: bold;">
												<?= date('H:i',strtotime($j['jam'])) ?>
											</td>
											<td><?= $j['audio'] ?></td>
											<td><?= $j['keterangan'] ?></td>
											<td>												
												<a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?= $j['id'] ?>"> <i class="fas fa-edit"></i> </a>
												<a href='<?= base_url("pengaturan_jadwal/deletejadwal/") . $j["id"] ?>' onclick="return confirm('yakin ingin menghapus ?');" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
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
<div
	class="modal fade"
	id="additem"
	tabindex="-1"
	role="dialog"
	aria-labelledby="additemLabel"
	aria-hidden="true"
>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="additemLabel">Tambah Data Bell</h5>
			</div>

			<?= form_open_multipart('pengaturan_jadwal/addjadwal'); ?>
			<div class="modal-body">
				<div class="form-group">					
                    <div class=" ">Hari</div>
                    <select class="form-control select2" name="hari">
                        <?php foreach($hari as $h): ?>
                        <option value="<?= $h['id'] ?>"><?= $h['hari'] ?></option>
                        <?php endforeach; ?>
                    </select>										                                        
                </div>
                <div class="form-group">
                <div class=" ">Jam</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-clock"></i>
							</div>
						</div>
						<input
							type="text"
							class="form-control js-time-picker"
                            value="00:00"
                            name="jam"
						/>
                    </div>
                </div>
                <div class="form-group">					
                    <div class=" ">Audio Bell</div>
                    <select class="form-control select2" name="audio">
                        <?php foreach($audio as $a) : ?>
                        <option value="<?= $a['id'] ?>"> <?= $a['file_name'] ?> </option>    
                        <?php endforeach; ?>                  
                    </select>										                                        
                </div>

                <div class="form-group">
                    <div class=" ">Keterangan</div>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan jam untuk apa" cols="30" rows="10"></textarea>
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

<!-- Modal Edit -->
<?php foreach($jadwal as $j) : ?>
<div
	class="modal fade"
	id="modaledit<?= $j['id'] ?>"
	tabindex="-1"
	role="dialog"
	aria-labelledby="edititemLabel"
	aria-hidden="true"
>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="additemLabel">Edit Data Bell</h5>
			</div>

			<?= form_open_multipart('pengaturan_jadwal/editjadwal'); ?>
			<div class="modal-body">
				<div class="form-group">	
					<input type="hidden" name="id" value="<?= $j['id'] ?>">				
                    <div class=" ">Hari</div>
                    <select class="form-control select2" name="hari">
                        <?php foreach($hari as $h): ?>
                        <option value="<?= $h['id'] ?>" <?= $j['hari'] == $h['hari'] ? 'selected' : '' ?> ><?= $h['hari'] ?></option>
                        <?php endforeach; ?>
                    </select>										                                        
                </div>
                <div class="form-group">
                <div class=" ">Jam</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-clock"></i>
							</div>
						</div>
						<input
							type="text"
							class="form-control pickertime"
                            value="<?= date('H:i',strtotime($j['jam'])) ?>"
                            name="jam"
						/>
                    </div>
                </div>
                <div class="form-group">					
                    <div class=" ">Audio Bell</div>
                    <select class="form-control select2" name="audio">
                        <?php foreach($audio as $a) : ?>
                        <option value="<?= $a['id'] ?>" <?= $j['audio'] == $a['file_name'] ? 'selected' : '' ?> > <?= $a['file_name'] ?> </option>    
                        <?php endforeach; ?>                  
                    </select>										                                        
                </div>

                <div class="form-group">
                    <div class=" ">Keterangan</div>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan jam untuk apa" cols="30" rows="10"><?= $j['keterangan'] ?></textarea>
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
<?php endforeach; ?>