<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>KELOLA DATA USER</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">user</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="card">

			<div class="card-body" style="overflow-x: scroll;">
				<div style="padding-bottom: 10px;">
					<?php echo anchor(site_url('user/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
				</div>
				<table id="data-table-default" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody><?php $no = 1;
							foreach ($user_data as $user) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?php echo $user->username ?></td>
								<td>
									<?php
									echo anchor(site_url('user/update/' . encrypt_url($user->user_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
									echo '  ';
									echo anchor(site_url('user/delete/' . encrypt_url($user->user_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
