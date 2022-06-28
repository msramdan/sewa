<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>KELOLA DATA PENGEMBALIAN</h4>
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
						<?php echo anchor(site_url('peminjaman/create_pengembalian'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
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
							<th>Tanggal Pengembalian</th>
							<th>Bukti Pengembalian</th>
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
								<td><?php echo $peminjaman->tanggal_pengembalian ?></td>
								<td>
									<?php if ($peminjaman->photo == null) { ?>
										<p>No File</p>
									<?php } else { ?>
										<a href="<?= base_url() ?>peminjaman/download/<?= $peminjaman->photo ?>"><i class="ace-icon fa fa-download"></i>
										<?php } ?></a>
								</td>

								<td><?php echo $peminjaman->status_pengembalian ?></td>
								<td>
									<?php

									if ($peminjaman->status_pengembalian == 'Waiting') {
										if ($this->session->userdata('level_id') == 2) {
											echo anchor(site_url('peminjaman/read/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm read_data"');
											echo '  ';
											// echo anchor(site_url('peminjaman/update_pengembalian/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
											// echo '  ';
											echo anchor(site_url('peminjaman/delete_pengembalian/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
										} else { ?>
											<a href="<?php base_url() ?>approved_pengembalian/<?= $peminjaman->peminjaman_id ?>" id="download" class="btn btn-sm btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
											<a href="<?php base_url() ?>reject_pengembalian/<?= $peminjaman->peminjaman_id ?>" id="download" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
											<a href="<?php base_url() ?>read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
										<?php } ?>
									<?php } else { ?>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
											<!-- <button href="#" class="btn btn-primary btn-sm read_data" disabled><i class="fas fa-pencil-alt" aria-hidden="true"></i></button> -->
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
