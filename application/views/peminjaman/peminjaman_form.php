<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA PEMINJAMAN</h4>
					<?php } else { ?>
						<h4>EDIT DATA PEMINJAMAN</h4>
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

				<form action="<?php echo $action; ?>" method="post">
					<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
						<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
							<tr>
								<td>No Peminjaman <?php echo form_error('no_peminjaman') ?></td>
								<td><input type="text" class="form-control" name="no_peminjaman" id="no_peminjaman" placeholder="No Peminjaman" value="<?= $kode ?>" readonly /></td>
							</tr>
						<?php } else { ?>
							<tr>
								<td>No Peminjaman <?php echo form_error('no_peminjaman') ?></td>
								<td><input type="text" class="form-control" readonly name="no_peminjaman" id="no_peminjaman" placeholder="No Peminjaman" value="<?php echo $no_peminjaman; ?>" /></td>
							</tr>
						<?php } ?>
						<tr>
							<td>kendaraan</td><?php echo form_error('kendaraan_id') ?></td>
							<td>
								<select name="kendaraan_id" class="form-control theSelect">
									<option value="">-- Pilih -- </option>
									<?php foreach ($kendaraan as $key => $data) { ?>
										<?php if ($kendaraan_id == $data->kendaraan_id) { ?>
											<option value="<?php echo $data->kendaraan_id ?>" selected><?php echo $data->nama_kendaraan ?></option>
										<?php } else { ?>
											<option value="<?php echo $data->kendaraan_id ?>"><?php echo $data->nama_kendaraan ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Estimasi Pengembalian <?php echo form_error('estimasi_pengembalian') ?></td>
							<td><input type="datetime-local" class="form-control" name="estimasi_pengembalian" id="estimasi_pengembalian" placeholder="Estimasi Pengembalian" value="<?php echo $estimasi_pengembalian; ?>" /></td>
						</tr>
						<tr>
							<td>Tujuan <?php echo form_error('tujuan') ?></td>
							<td><input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" /></td>
						</tr>

						<tr>
							<td>Keperluan <?php echo form_error('keperluan') ?></td>
							<td> <textarea class="form-control" rows="3" name="keperluan" id="keperluan" placeholder="Keperluan"><?php echo $keperluan; ?></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="hidden" name="peminjaman_id" value="<?php echo $peminjaman_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('peminjaman') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
