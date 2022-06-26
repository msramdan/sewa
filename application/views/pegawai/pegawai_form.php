<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA PEGAWAI</h4>
					<?php } else { ?>
						<h4>EDIT DATA PEGAWAI</h4>
					<?php } ?>

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

			<div class="card-body">

				<form action="<?php echo $action; ?>" method="post">
					<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
						<tr>
						<input type="hidden" class="form-control" name="nip_lama" id="nip_lama" placeholder="Nip" value="<?php echo $nip_lama; ?>" />
							<td>Nip <?php echo form_error('nip') ?></td>
							<td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" /></td>
						</tr>
						<tr>
							<td>Nama Pegawai <?php echo form_error('nama_pegawai') ?></td>
							<td><input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" /></td>
						</tr>
						<tr>
							<td>Unit Kerja</td><?php echo form_error('unit_id') ?></td>
							<td>
								<select name="unit_id" class="form-control theSelect">
									<option value="" style="color: black;">-- Pilih -- </option>
									<?php foreach ($unit as $key => $data) { ?>
										<?php if ($unit_id == $data->unit_id) { ?>
											<option value="<?php echo $data->unit_id ?>" selected><?php echo $data->nama_unit ?></option>
										<?php } else { ?>
											<option value="<?php echo $data->unit_id ?>"><?php echo $data->nama_unit ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
							<td><select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
									<option value="">-- Pilih --</option>
									<option value="Laki Laki" <?php echo $jenis_kelamin == 'Laki Laki' ? 'selected' : 'null' ?>>Laki Laki</option>
									<option value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>No Hp <?php echo form_error('no_hp') ?></td>
							<td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" /></td>
						</tr>
						<tr>
							<td>Alamat <?php echo form_error('alamat') ?></td>
							<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
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
							<td><input type="hidden" name="pegawai" value="<?php echo $pegawai_id; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('pegawai') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</section>
</div>
