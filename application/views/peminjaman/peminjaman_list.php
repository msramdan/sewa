<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> <span id="status"></span> Permintaan No : <span id="no_peminjaman_reject"></span> </h5>
			</div>
			<form action="<?= base_url() ?>peminjaman/updatePeminjaman" method="POST">
				<div class="modal-body">
					<textarea class="form-control" id="komentar" name="komentar" cols="30" rows="5" required></textarea>
					<input type="hidden" name="statusPeminjaman" value="" id="statusPeminjaman" >
					<input type="hidden" name="peminjaman_id_modal" value="" id="peminjaman_id_modal" >
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="buttonModal" class="btn "> <span id="buttonStatus"></span></button>
				</div>
			</form>
		</div>
	</div>
</div>



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

				<!-- begin add report button  -->
				<div class="btn-group" style="float: left;">
					<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon fas fa-file"></i> &nbsp; Laporan
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?= base_url("/peminjaman/export/pdf") ?>" target="_blank"><i class="icon fas fa-file-pdf"></i> &nbsp; Pdf</a>
						<a class="dropdown-item" href="<?= base_url("/peminjaman/export/xls") ?>" target="_blank"><i class="icon fas fa-file-excel"></i> &nbsp; Excel</a>
					</div>
				</div>&nbsp;
				<!-- end add report button -->
				<?php if ($this->session->userdata('level_id') == 2) { ?>
						<?php echo anchor(site_url('peminjaman/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
					
				<?php } ?>

				
				<br>
				<br>
				<div class="table-responsive">
				<table id="" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>No Peminjaman</th>
							<?php if ($this->session->userdata('level_id') == 1) { ?>
								<th>Karyawan</th>
							<?php } ?>

							<th>Nopol</th>
							<th>Tanggal Peminjaman</th>
							<th>Estimasi Pengembalian</th>
							<th>Tujuan</th>
							<th>Status Request</th>
							<th>Status Pengembalian</th>
							<th width="300px">Action</th>
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
											echo anchor(site_url('peminjaman/read/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm"');
											echo '  ';
											echo anchor(site_url('peminjaman/update/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm "');
											echo '  ';
											echo anchor(site_url('peminjaman/delete/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm " Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
										} else { ?>
											<a href="#" data-toggle="modal"
											data-peminjaman_id_modal="<?= $peminjaman->peminjaman_id ?>"
											data-status="Approved" data-komentar="<?= $peminjaman->komentar ?>" data-no_peminjaman="<?= $peminjaman->no_peminjaman ?>" data-komentar="<?= $peminjaman->komentar ?>" data-target="#exampleModal" class="btn btn-sm btn-primary rejectStatus"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
											<a href="#" data-toggle="modal"
											data-peminjaman_id_modal="<?= $peminjaman->peminjaman_id ?>"
											data-status="Reject" data-komentar="<?= $peminjaman->komentar ?>" data-no_peminjaman="<?= $peminjaman->no_peminjaman ?>" data-komentar="<?= $peminjaman->komentar ?>" data-target="#exampleModal" class="btn btn-sm btn-danger rejectStatus"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
											<a href="<?php base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye" aria-hidden="true"></i></a>
										<?php } ?>
									<?php } else { ?>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm "><i class="fas fa-eye" aria-hidden="true"></i></a>
											<button href="#" class="btn btn-primary btn-sm " disabled><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
											<button href="#" class="btn btn-danger btn-sm " disabled><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
										<?php } else { ?>
											<button href="#" id="download" class="btn btn-sm btn-primary" disabled><i class="fa fa-check" aria-hidden="true"></i> Approved</button>
											<button href="#" id="download" class="btn btn-sm btn-danger" disabled><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm "><i class="fas fa-eye" aria-hidden="true"></i></a>
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
</div>
</section>
</div>

<script>
	$('.rejectStatus').click(function() {
		var peminjaman_id = $(this).data('peminjaman_id_modal');
		var no_peminjaman = $(this).data('no_peminjaman');
		var status = $(this).data('status');
		var komentar = $(this).data('komentar');
		$('#exampleModal #no_peminjaman_reject').text(no_peminjaman);
		$('#exampleModal #status').text(status);
		$('#exampleModal #buttonStatus').text(status);
		$('#exampleModal #peminjaman_id_modal').val(peminjaman_id);
		if (status == "Reject") {
			$("#buttonModal").addClass("btn-danger").removeClass("btn-primary")
			$('#exampleModal #statusPeminjaman').val(status);
		} else if (status == "Approved") {
			$("#buttonModal").addClass("btn-primary").removeClass("btn-danger")
			$('#exampleModal #statusPeminjaman').val(status);
		}
		$('#exampleModal #komentar').val(komentar);
	});
</script>
</script>
