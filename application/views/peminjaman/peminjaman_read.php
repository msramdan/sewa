<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>PEMINJAMAN READ</h4>
					
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">peminjaman</li>
					</ol>
				</div>
			</div>
			<a href="<?= base_url() ?>peminjaman/cetakPdf/<?=$peminjaman_id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-print" aria-hidden="true"></i> Cetak Detail</a>
		</div>
	</section>

	<section class="content">
	
		<div class="card">
			
			<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
				<tr>
					<td style="width: 40%;">No Peminjaman</td>
					<td><?php echo $no_peminjaman; ?></td>
				</tr>
				<tr>
					<td>Karyawan</td>
					<td><?php echo $karyawan_id; ?></td>
				</tr>
				<tr>
					<td>Unit Kerja</td>
					<td><?php echo $nama_unit; ?></td>
				</tr>
				<tr>
					<td>Atasan</td>
					<td><?php echo $kepala_unit; ?></td>
				</tr>
				<tr>
					<td>TTD Atasan</td>
					<td><img src="<?php echo base_url(); ?>assets/dist/img/ttd/<?= $ttd ?>" width="100px"></td>
				</tr>
				<tr>
					<td>Kendaraan</td>
					<td><?php echo $kendaraan_id; ?> - <?php echo $nama_kendaraan; ?></td>
				</tr>
				<tr>
					<td>Tanggal Peminjaman</td>
					<td><?php echo $tanggal_request; ?></td>
				</tr>
				<tr>
					<td>Estimasi Pengembalian</td>
					<td><?php echo $estimasi_pengembalian; ?></td>
				</tr>
				<tr>
					<td>Tujuan</td>
					<td><?php echo $tujuan; ?></td>
				</tr>
				<tr>
					<td>Keperluan</td>
					<td><?php echo $keperluan; ?></td>
				</tr>
				<tr>
					<td>Status Request</td>
					<td><?php echo $status_request; ?></td>
				</tr>
				<tr>
					<td>Komentar Peminjaman</td>
					<td><?php echo $komentar; ?></td>
				</tr>
				<tr>
					<td>Tanggal Diperiksa
						<p style="color:red">Status Aproved : Kunci di serahkan pada tanggal ini</p>

					</td>
					<td><?php echo $tanggal_approved; ?></td>
				</tr>

				<tr>
					<td>Tanggal Pengembalian</td>
					<td><?php echo $tanggal_pengembalian; ?></td>
				</tr>
				<tr>
					<td>Bukti Pengembalian</td>
					<td>

						<?php if ($photo == null) { ?>
							<p>No File</p>
						<?php } else { ?>
							<a href="<?= base_url() ?>peminjaman/download/<?= $photo ?>"><i class="ace-icon fa fa-download"></i>
							<?php } ?></a>
					</td>
				</tr>
				<tr>
					<td>Status Pengembalian</td>
					<td><?php echo $status_pengembalian; ?></td>
				</tr>
				<tr>
					<td>Komentar Pengembalian</td>
					<td><?php echo $komentar_pengembalian; ?></td>
				</tr>
				<tr>
					<td>Status Waktu Pengembalian</td>
					<td><?php echo $status_tepat_waktu; ?></td>
				</tr>
			</table>

		</div>
</div>
</div>
</section>
</div>
