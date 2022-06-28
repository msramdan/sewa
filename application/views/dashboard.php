<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">

						<?php
							$peminjaman = $this->db->get('peminjaman')->num_rows();
							?>
							<h3><?= $peminjaman ?></h3>

							<p>Transaksi Peminjaman</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="<?= base_url() ?>peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<?php
							$pemeliharaan = $this->db->get('pemeliharaan')->num_rows();
							?>
							<h3><?= $pemeliharaan ?></h3>

							<p>Perbaikan Kendaraan</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url() ?>pemeliharaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
						<?php
							$kendaraan = $this->db->get('kendaraan')->num_rows();
							?>
							<h3><?= $kendaraan ?></h3>

							<p>Data Kendaraan</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?= base_url() ?>kendaraan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
						<?php
							$pegawai = $this->db->get('kendaraan')->num_rows();
							?>
							<h3><?= $pegawai ?></h3>

							<p>Data Pegawai</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?= base_url() ?>pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				
				
			</div>
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Bordered Table</h3>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Task</th>
										<th>Progress</th>
										<th style="width: 40px">Label</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>Update software</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
											</div>
										</td>
										<td><span class="badge bg-danger">55%</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Simple Full Width Table</h3>
						</div>
						<div class="card-body p-0">
							<table class="table">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Task</th>
										<th>Progress</th>
										<th style="width: 40px">Label</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>Update software</td>
										<td>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
											</div>
										</td>
										<td><span class="badge bg-danger">55%</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> -->
			<center><img src="<?= base_url() ?>assets/dist/img/home.png" alt="" style="width:60%"></center>
		</div>
	</section>


</div>
