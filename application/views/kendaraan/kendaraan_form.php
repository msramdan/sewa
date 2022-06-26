<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA KENDARAAN</h4>
					<?php } else { ?>
						<h4>EDIT DATA KENDARAAN</h4>
					<?php } ?>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">kendaraan</li>
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
						<tr>
							<td>Nopol <?php echo form_error('nopol') ?></td>
							<td><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" /></td>
						</tr>
						<tr>
							<td>Nama Kendaraan <?php echo form_error('nama_kendaraan') ?></td>
							<td><input type="text" class="form-control" name="nama_kendaraan" id="nama_kendaraan" placeholder="Nama Kendaraan" value="<?php echo $nama_kendaraan; ?>" /></td>
						</tr>
						<tr>
							<td>Merk <?php echo form_error('merk') ?></td>
							<td><input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" /></td>
						</tr>
						<tr>
							<td>Warna <?php echo form_error('warna') ?></td>
							<td><input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" value="<?php echo $warna; ?>" /></td>
						</tr>
						<tr>
							<td>Tahun <?php echo form_error('tahun') ?></td>
							<td><input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
						</tr>
						<tr>
							<td>No Rangka <?php echo form_error('no_rangka') ?></td>
							<td><input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="No Rangka" value="<?php echo $no_rangka; ?>" /></td>
						</tr>
						<tr>
							<td>No Mesin <?php echo form_error('no_mesin') ?></td>
							<td><input type="text" class="form-control" name="no_mesin" id="no_mesin" placeholder="No Mesin" value="<?php echo $no_mesin; ?>" /></td>
						</tr>
						<tr>
							<td>No Bpkb <?php echo form_error('no_bpkb') ?></td>
							<td><input type="text" class="form-control" name="no_bpkb" id="no_bpkb" placeholder="No Bpkb" value="<?php echo $no_bpkb; ?>" /></td>
						</tr>
						<tr>
							<td>Tgl Berlaku Stnk <?php echo form_error('tgl_berlaku_stnk') ?></td>
							<td><input type="date" class="form-control" name="tgl_berlaku_stnk" id="tgl_berlaku_stnk" placeholder="Tgl Berlaku Stnk" value="<?php echo $tgl_berlaku_stnk; ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="hidden" name="kendaraan_id" value="<?php echo $kendaraan_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('kendaraan') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
