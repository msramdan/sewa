<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Komentar Pengembalian </h5>
			</div>
			<form action="<?= base_url() ?>peminjaman/updatePengembalian" method="POST">
				<div class="modal-body">
					<label for="">Komentar</label>
					<textarea class="form-control" id="komentar_pengembalian" name="komentar_pengembalian" cols="30" rows="5" required></textarea>
					<input type="hidden" name="statusPeminjaman" value="" id="statusPeminjaman" >
					<input type="hidden" name="peminjaman_id_modal" value="" id="peminjaman_id_modal" >

					<div class="mt-3" id="status_balik" >
						<label for="">Status Waktu Pengembalian</label>
						<select name="status_tepat_waktu" id="status_tepat_waktu" required class="form-control">
							<option value="" selected disabled>-- Pilih --</option>
							<option value="Tepat waktu">Tepat waktu</option>
							<option value="Telat">Telat</option>
							<option value="Tidak ada konfirmasi">Tidak ada konfirmasi</option>
						</select>
					</div>
					
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
											echo anchor(site_url('peminjaman/delete_pengembalian/' . encrypt_url($peminjaman->peminjaman_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
										} else { ?> 
											<a href="#" id="download" class="btn btn-sm btn-primary rejectStatus" data-peminjaman_id_modal="<?= $peminjaman->peminjaman_id ?>"
											data-status="Approved" data-no_peminjaman="<?= $peminjaman->no_peminjaman ?>" data-komentar_pengembalian="<?= $peminjaman->komentar_pengembalian ?>" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
											<a href="#" id="download" class="btn btn-sm btn-danger rejectStatus" data-peminjaman_id_modal="<?= $peminjaman->peminjaman_id ?>"
											data-status="Reject" data-no_peminjaman="<?= $peminjaman->no_peminjaman ?>" data-komentar_pengembalian="<?= $peminjaman->komentar_pengembalian ?>"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
											<a href="<?php base_url() ?>read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
										<?php } ?>
									<?php } else { ?>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<a href="<?= base_url() ?>peminjaman/read/<?= encrypt_url($peminjaman->peminjaman_id)  ?>" class="btn btn-success btn-sm read_data"><i class="fas fa-eye" aria-hidden="true"></i></a>
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

<script>
	$('.rejectStatus').click(function() {
		var peminjaman_id = $(this).data('peminjaman_id_modal');
		var status = $(this).data('status');
		var komentar_pengembalian = $(this).data('komentar_pengembalian');
		$('#exampleModal #status').text(status);
		$('#exampleModal #buttonStatus').text(status);
		$('#exampleModal #peminjaman_id_modal').val(peminjaman_id);
		$('#exampleModal #komentar_pengembalian').val(komentar_pengembalian);
		if (status == "Reject") {
			$("#buttonModal").addClass("btn-danger").removeClass("btn-primary")
			$("#status_balik").addClass("d-none")
			$("#status_tepat_waktu").removeAttr('required');
			$('#exampleModal #statusPeminjaman').val(status);
		} else if (status == "Approved") {
			$("#buttonModal").addClass("btn-primary").removeClass("btn-danger")
			$('#exampleModal #statusPeminjaman').val(status);
			$("#status_balik").removeClass("d-none");
			$("#status_tepat_waktu").addAttr('required');
		}
		
	});
</script>
