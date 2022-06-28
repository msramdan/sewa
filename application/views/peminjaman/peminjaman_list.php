<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>KELOLA DATA PEMINJAMAN</h4>
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

			<div class="card-body" style="overflow-x: scroll;">
				<?php if ($this->session->userdata('level_id') == 2) { ?>
					<div style="padding-bottom: 10px;">
						<?php echo anchor(site_url('peminjaman/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
					</div>
				<?php } ?>
				<table id="data-table-default" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>No Peminjaman</th>
							<?php if ($this->session->userdata('level_id') == 1) { ?>
								<th>Karyawan</th>
							<?php } ?>

							<th>Nopol</th>
							<th>Tanggal Request</th>
							<th>Estimasi Pengembalian</th>
							<th>Tujuan</th>
							<!-- <th>Keperluan</th> -->
							<th>Status Request</th>
							<th>Status Pengembalian</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody><?php $no = 1;
							foreach ($peminjaman_data as $peminjaman) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?php echo $peminjaman->no_peminjaman ?></td>
								<?php if ($this->session->userdata('level_id') == 1) { ?>
									<td><?php echo $peminjaman->nama_pegawai ?></td>
								<?php } ?>
								<td><?php echo $peminjaman->nopol ?> - <?php echo $peminjaman->nama_kendaraan ?></td>
								<td><?php echo $peminjaman->tanggal_request ?></td>
								<td><?php echo $peminjaman->estimasi_pengembalian ?></td>
								<td><?php echo $peminjaman->tujuan ?></td>
								<!-- <td><?php echo $peminjaman->keperluan ?></td> -->
								<td><?php echo $peminjaman->status_request ?></td>
								<td><?php echo $peminjaman->status_pengembalian ?></td>
								<td>
									<?php

									if ($peminjaman->status_request == 'Waiting') {
										if ($this->session->userdata('level_id') == 2) {
											echo anchor(site_url('peminjaman/read/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm read_data"');
											echo '  ';
											echo anchor(site_url('peminjaman/update/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
											echo '  ';
											echo anchor(site_url('peminjaman/delete/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
										} else { ?>
											<a href="<?php base_url() ?>peminjaman/approved/<?= $peminjaman->peminjaman_id ?>" id="download" class="btn btn-sm btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
											<a href="<?php base_url() ?>peminjaman/reject/<?= $peminjaman->peminjaman_id ?>" id="download" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
											<a href="<?php base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
										<?php } ?>
									<?php } else { ?>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
											<button href="#" class="btn btn-primary btn-sm read_data" disabled><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
											<button href="#" class="btn btn-danger btn-sm read_data" disabled><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
										<?php } else { ?>
											<button href="#" id="download" class="btn btn-sm btn-primary" disabled><i class="fa fa-check" aria-hidden="true"></i> Approved</button>
											<button href="#" id="download" class="btn btn-sm btn-danger" disabled><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
										<?php } ?>
									<?php } ?>
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
