<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA USER</h4>
					<?php } else { ?>
						<h4>EDIT DATA USER</h4>
					<?php } ?>

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

			<div class="card-body">

				<form action="<?php echo $action; ?>" method="post">
					<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
						<tr>
							<td>Username <?php echo form_error('username') ?></td>
							<td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
						</tr>
						<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
							<tr>
								<td width='200'>Password <?php echo form_error('password') ?></td>
								<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
							</tr>
						<?php } else { ?>
							<tr>
								<td width='200'>Password <?php echo form_error('password') ?></td>
								<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
									<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<td></td>
							<td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
