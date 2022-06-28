<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>KELOLA DATA PEMELIHARAAN</h4>
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

			<div class="card-body" style="overflow-x: scroll;">
				<div style="padding-bottom: 10px;">
					<?php echo anchor(site_url('pemeliharaan/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
				</div>
				<table id="data-table-default" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Pemeliharaan</th>
							<th>Kendaraan</th>
							<th>Kategori Kilometer</th>
							<th>Km Terakhir</th>
							<th>Dinamo Starter</th>
							<th>Ket1</th>
							<th>Service Ecu</th>
							<th>Ket2</th>
							<th>Karburator</th>
							<th>Ket3</th>
							<th>Oli Mesin</th>
							<th>Ket4</th>
							<th>Oli Power Steering</th>
							<th>Ket5</th>
							<th>Deksripsi</th>
							<th>File Pendukung</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody><?php $no = 1;
							foreach ($pemeliharaan_data as $pemeliharaan) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?php echo $pemeliharaan->jenis_pemeliharaan ?></td>
								<td><?php echo $pemeliharaan->nama_kendaraan ?></td>
								<td><?php echo $pemeliharaan->kategori_kilometer ?></td>
								<td><?php echo $pemeliharaan->km_terakhir ?></td>
								<td><?php echo $pemeliharaan->dinamo_starter ?></td>
								<td><?php echo $pemeliharaan->ket1 ?></td>
								<td><?php echo $pemeliharaan->service_ecu ?></td>
								<td><?php echo $pemeliharaan->ket2 ?></td>
								<td><?php echo $pemeliharaan->karburator ?></td>
								<td><?php echo $pemeliharaan->ket3 ?></td>
								<td><?php echo $pemeliharaan->oli_mesin ?></td>
								<td><?php echo $pemeliharaan->ket4 ?></td>
								<td><?php echo $pemeliharaan->oli_power_steering ?></td>
								<td><?php echo $pemeliharaan->ket5 ?></td>
								<td><?php echo $pemeliharaan->deksripsi ?></td>
								<td>
									<?php if ($pemeliharaan->photo == null) { ?>
										<p>No File</p>
									<?php } else { ?>
										<a href="<?= base_url() ?>pemeliharaan/download/<?= $pemeliharaan->photo ?>"><i class="ace-icon fa fa-download"></i>
									<?php } ?></a>
								</td>
								<td>
									<?php
									echo anchor(site_url('pemeliharaan/read/' . encrypt_url($pemeliharaan->pemeliharaan_id)), '<i class="fas fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm read_data"');
									echo '  ';
									echo anchor(site_url('pemeliharaan/update/' . encrypt_url($pemeliharaan->pemeliharaan_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
									echo '  ';
									echo anchor(site_url('pemeliharaan/delete/' . encrypt_url($pemeliharaan->pemeliharaan_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
									?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
</div>
</div>
</section>
</div>
