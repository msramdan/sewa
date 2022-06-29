<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create_pengembalian" || $this->uri->segment(2) == "create_pengembalian_action") { ?>
						<h4>TAMBAH DATA PENGEMBALIAN</h4>
					<?php } else { ?>
						<h4>EDIT DATA PENGEMBALIAN</h4>
					<?php } ?>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">peminjaman</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="card">

			<div class="card-body">

				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
						<tr>
							<td>No Peminjaman</td><?php echo form_error('peminjaman_id') ?></td>
							<td>
								<select name="peminjaman_id" class="form-control theSelect" required>
									<option value="">-- Pilih -- </option>
									<?php foreach ($peminjaman as $key => $data) { ?>
										<?php if ($peminjaman_id == $data->peminjaman_id) { ?>
											<option value="<?php echo $data->peminjaman_id ?>" selected><?php echo $data->no_peminjaman ?> - <?php echo $data->nopol ?></option>
										<?php } else { ?>
											<option value="<?php echo $data->peminjaman_id ?>"><?php echo $data->no_peminjaman ?> - <?php echo $data->nopol ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
						</tr>

						<?php if ($this->uri->segment(2) == 'create_pengembalian' || $this->uri->segment(2) == 'create_pengembalian_action') { ?>
							<tr>
								<td>Bukti Pengembalian <?php echo form_error('photo') ?></td>
								<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
									<!-- <div id="preview"></div> -->
								</td>
							</tr>
						<?php } else { ?>
							<div class="form-group">
								<tr>
									<td>Bukti Pengembalian <?php echo form_error('photo') ?></td>
									<td>
										<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/dist/img/photo/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
										<input type="hidden" name="photo_lama" value="<?= $photo ?>">
										<p style="color: red">Note :Pilih bukti pengembalian Jika Ingin Merubahnya</p>
										<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
										<!-- <div id="preview"></div> -->
									</td>

								</tr>
							</div>
						<?php } ?>


						<tr>
							<td>Tanggal Pengembalian <?php echo form_error('tanggal_pengembalian') ?></td>
							<td><input required type="datetime-local" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" placeholder="Estimasi Pengembalian" value="<?php echo $tanggal_pengembalian; ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('peminjaman/kembali') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
