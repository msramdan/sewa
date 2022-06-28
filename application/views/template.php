<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Peminjaman</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.css" integrity="sha512-J5tsMaZISEmI+Ly68nBDiQyNW6vzBoUlNHGsH8T3DzHTn2h9swZqiMeGm/4WMDxAphi5LMZMNA30LvxaEPiPkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	<?php if ($this->session->flashdata('message')) : ?>
	<?php endif; ?>

	<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
	<?php if ($this->session->flashdata('error')) : ?>
	<?php endif; ?>


	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
						<?= ucfirst($this->fungsi->user_login()->username) ?> <i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
						<div class="dropdown-divider"></div>
						<a href="<?= base_url() ?>Auth/logout" class="dropdown-item">
							Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url() ?>" class="brand-link">
				<img src="<?= base_url() ?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">PeminjamanApk</span>
			</a>
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url() ?>" class="nav-link">
								<i class="nav-icon fa fa-home"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>peminjaman" class="nav-link">
								<i class="nav-icon fa fa-arrow-right"></i>
								<p>
									Peminjaman
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>peminjaman/kembali" class="nav-link">
								<i class="nav-icon fa fa-arrow-left"></i>
								<p>
									Pengembalian
									<span class="badge badge-info right">2</span>
								</p>
							</a>
						</li>

						<?php if ($this->session->userdata('level_id') == 1) { ?>
							<li class="nav-item">
								<a href="<?= base_url() ?>pemeliharaan" class="nav-link">
									<i class="nav-icon fa fa-wrench"></i>
									<p>
										Pemeliharaan
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-list"></i>
									<p>
										Master Data
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>kendaraan" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Kendaraan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url() ?>unit" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Unit Kerja</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="<?= base_url() ?>pegawai" class="nav-link">
									<i class="nav-icon fa fa-users"></i>
									<p>
										Data Pegawai
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url() ?>user" class="nav-link">
									<i class="nav-icon fa fa-user"></i>
									<p>
										Data User
									</p>
								</a>
							</li>

						<?php } ?>
					</ul>
				</nav>
			</div>
		</aside>
		<?php echo $contents ?>
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> <!-- untuk sweet alret -->
	<script src="<?php echo base_url(); ?>assets/dist/js/dataflash.js"></script>
	<script>
		$(function() {
			$('#data-table-default').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
</body>

</html>
