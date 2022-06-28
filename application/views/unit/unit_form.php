<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA UNIT</h4>
					<?php } else { ?>
						<h4>EDIT DATA UNIT</h4>
					<?php } ?>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">unit</li>
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
							<td>Nama Unit <?php echo form_error('nama_unit') ?></td>
							<td><input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Nama Unit" value="<?php echo $nama_unit; ?>" /></td>
						</tr>
						<tr>
							<td>Kepala Unit <?php echo form_error('kepala_unit') ?></td>
							<td><input type="text" class="form-control" name="kepala_unit" id="kepala_unit" placeholder="Kepala Unit" value="<?php echo $kepala_unit; ?>" /></td>
						</tr>
						<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
							<tr>
								<td >TTD <?php echo form_error('ttd') ?></td>
								<td><input type="file" class="form-control" name="ttd" id="ttd" placeholder="ttd" required="" value="" onchange="return validasiEkstensi()" />
									<!-- <div id="preview"></div> -->
								</td>
							</tr>
						<?php } else { ?>
							<div class="form-group">
								<tr>
									<td >TTD <?php echo form_error('ttd') ?></td>
									<td>
										<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/dist/img/ttd/<?= $ttd ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
										<input type="hidden" name="ttd_lama" value="<?= $ttd ?>">
										<p style="color: red">Note :Pilih Ttd Jika Ingin Merubahnya</p>
										<input type="file" class="form-control" name="ttd" id="ttd" placeholder="ttd" value="" onchange="return validasiEkstensi()" />
										<!-- <div id="preview"></div> -->
									</td>

								</tr>
							</div>
						<?php } ?>
						<tr>
							<td></td>
							<td><input type="hidden" name="unit_id" value="<?php echo $unit_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('unit') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
