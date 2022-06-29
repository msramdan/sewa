<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA PEMELIHARAAN</h4>
					<?php } else { ?>
						<h4>EDIT DATA PEMELIHARAAN</h4>
					<?php } ?>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">pemeliharaan</li>
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
							<td>Jenis Pemeliharaan <?php echo form_error('jenis_pemeliharaan') ?></td>
							<td>
								<div class="icheck-primary d-inline">
									<input type="radio" id="radioPrimary3" name="jenis_pemeliharaan" value="Berkala" <?php echo $jenis_pemeliharaan == 'Berkala' ? 'checked' : 'null' ?> >
									<label for="radioPrimary3">
										Berkala
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="radioPrimary4" name="jenis_pemeliharaan" value="Insidental" <?php echo $jenis_pemeliharaan == 'Insidental' ? 'checked' : 'null' ?> >
									<label for="radioPrimary4">
										Insidental
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>kendaraan <?php echo form_error('kendaraan_id') ?></td>
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
							<td>Kategori Kilometer <?php echo form_error('kategori_kilometer') ?></td>
							<td><select name="kategori_kilometer" class="form-control theSelect" value="<?= $kategori_kilometer ?>">
									<option value="">-- Pilih --</option>
									<option value="5.000 - 10.000 km" <?php echo $kategori_kilometer == '5.000 - 10.000 km' ? 'selected' : 'null' ?>>5.000 - 10.000 km</option>
									<option value="10.000 - 20.000 km" <?php echo $kategori_kilometer == '10.000 - 20.000 km' ? 'selected' : 'null' ?>>10.000 - 20.000 km</option>
									<option value="20.000 - 30.000 km" <?php echo $kategori_kilometer == '20.000 - 30.000 km' ? 'selected' : 'null' ?>>20.000 - 30.000 km</option>
									<option value="30.000 - 50.000 km" <?php echo $kategori_kilometer == '30.000 - 50.000 km' ? 'selected' : 'null' ?>>30.000 - 50.000 km</option>
									<option value="Lebih dari 50.000" <?php echo $kategori_kilometer == 'Lebih dari 50.000' ? 'selected' : 'null' ?>>Lebih dari 50.000</option>
								</select>
							</td>
						</tr>

						<tr>
							<td>Km Terakhir <?php echo form_error('km_terakhir') ?></td>
							<td><input type="number" class="form-control" name="km_terakhir" id="km_terakhir" placeholder="Km Terakhir" value="<?php echo $km_terakhir; ?>" /></td>
						</tr>
						<tr>
							<td>Deksripsi <?php echo form_error('deksripsi') ?></td>
							<td> <textarea class="form-control" rows="3" name="deksripsi" id="deksripsi" placeholder="Deksripsi"><?php echo $deksripsi; ?></textarea></td>
						</tr>

						<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
							<tr>
								<td>Upload File Pendukung <?php echo form_error('photo') ?></td>
								<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
									<!-- <div id="preview"></div> -->
								</td>
							</tr>
						<?php } else { ?>
							<div class="form-group">
								<tr>
									<td>Upload File Pendukung <?php echo form_error('photo') ?></td>
									<td>
										<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/dist/img/photo/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
										<input type="hidden" name="photo_lama" value="<?= $photo ?>">
										<p style="color: red">Note :Pilih photo Jika Ingin Merubahnya</p>
										<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
										<!-- <div id="preview"></div> -->
									</td>

								</tr>
							</div>
						<?php } ?>

						<tr>
							<td>Detail Item Service</td>
							<td>
								<button class="btn btn-primary btn-sm" id="pemeliharaan-dynamic-kategori"> Add</button> <br> <br>
								<table class="table table-bordered" id="dynamic-kategori-field">
									<tr>
										<td>Kategori</td>
										<td>Keterangan</td>
										<td>Aksi</td>
									</tr>
								</table>
							</td>
						</tr>


						<tr>
							<td></td>
							<td><input type="hidden" name="pemeliharaan_id" value="<?php echo $pemeliharaan_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('pemeliharaan') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>


<script>
	function domReady(fn) {
	// If we're early to the party
	document.addEventListener("DOMContentLoaded", fn);
	// If late; I mean on time.
	if (document.readyState === "interactive" || document.readyState === "complete" ) {
		fn();
	}
	}

	domReady(() => {
		let categories = <?= json_encode($kategori)  ?>

		window.data = {
			categories : categories
		};
	});
</script>