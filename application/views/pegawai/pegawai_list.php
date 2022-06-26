<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>KELOLA DATA PEGAWAI</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">pegawai</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="card">

			<div class="card-body" style="overflow-x: scroll;">
				<div style="padding-bottom: 10px;">
					<?php echo anchor(site_url('pegawai/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
				</div>
				<table id="data-table-default" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nip</th>
							<th>Nama Pegawai</th>
							<th>Unit Kerja</th>
							<th>Jenis Kelamin</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody><?php $no = 1;
							foreach ($pegawai_data as $pegawai) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?php echo $pegawai->nip ?></td>
								<td><?php echo $pegawai->nama_pegawai ?></td>
								<td><?php echo $pegawai->nama_unit ?></td>
								<td><?php echo $pegawai->jenis_kelamin ?></td>
								<td><?php echo $pegawai->no_hp ?></td>
								<td><?php echo $pegawai->alamat ?></td>
								<td>
									<?php
									echo anchor(site_url('pegawai/update/' . encrypt_url($pegawai->pegawai_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
									echo '  ';
									echo anchor(site_url('pegawai/delete/' . encrypt_url($pegawai->pegawai_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
