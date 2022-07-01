<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
						<h4>TAMBAH DATA PEMELIHARAAN</h4>
					<?php } else { ?>
						<h4>EDIT DATA PEMELIHARAAN</h4>
					<?php } ?>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">pemeliharaan</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
						<tr>
							<td>Jenis Pemeliharaan <?php echo form_error('jenis_pemeliharaan') ?></td>
							<td>
								<div class="icheck-primary d-inline">
									<input type="radio" id="radioPrimary3" name="jenis_pemeliharaan" value="Berkala" <?php echo $jenis_pemeliharaan == 'Berkala' ? 'checked' : 'null' ?> >
									<label for="radioPrimary3">
										Berkala
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="radioPrimary4" name="jenis_pemeliharaan" value="Insidental" <?php echo $jenis_pemeliharaan == 'Insidental' ? 'checked' : 'null' ?> >
									<label for="radioPrimary4">
										Insidental
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tgl Pemeliharaan <?php echo form_error('tgl_pemeliharaan') ?></td>
							<td><input type="date" class="form-control" name="tgl_pemeliharaan" id="tgl_pemeliharaan" placeholder="Tgl Pemeliharaan" value="<?php echo $tgl_pemeliharaan; ?>" disabled/></td>
						</tr>
						<tr>
							<td>kendaraan <?php echo form_error('kendaraan_id') ?></td>
							<td>
								<select name="kendaraan_id" class="form-control theSelect">
									<option value="">-- Pilih -- </option>
									<?php foreach ($kendaraan as $key => $data) { ?>
										<?php if ($kendaraan_id == $data->kendaraan_id) { ?>
											<option value="<?php echo $data->kendaraan_id ?>" selected><?php echo $data->nama_kendaraan ?></option>
										<?php } else { ?>
											<option value="<?php echo $data->kendaraan_id ?>"><?php echo $data->nama_kendaraan ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Kategori Kilometer <?php echo form_error('kategori_kilometer') ?></td>
							<td><select name="kategori_kilometer" class="form-control theSelect" value="<?= $kategori_kilometer ?>">
									<option value="">-- Pilih --</option>
									<option value="5.000 - 10.000 km" <?php echo $kategori_kilometer == '5.000 - 10.000 km' ? 'selected' : 'null' ?> > 5.000 - 10.000 km</option>
									<option value="10.000 - 20.000 km" <?php echo $kategori_kilometer == '10.000 - 20.000 km' ? 'selected' : 'null' ?> > 10.000 - 20.000 km</option>
									<option value="20.000 - 30.000 km" <?php echo $kategori_kilometer == '20.000 - 30.000 km' ? 'selected' : 'null' ?> > 20.000 - 30.000 km</option>
									<option value="30.000 - 50.000 km" <?php echo $kategori_kilometer == '30.000 - 50.000 km' ? 'selected' : 'null' ?> > 30.000 - 50.000 km</option>
									<option value=" 50.000 > keatas km" <?php echo $kategori_kilometer == 'Lebih dari 50.000' ? 'selected' : 'null';   ?>  > 50.000 > keatas km</option>
								</select>
							</td>
						</tr>

						<tr>
							<td>Km Terakhir <?php echo form_error('km_terakhir') ?></td>
							<td><input type="text" class="form-control" name="km_terakhir" id="km_terakhir" placeholder="Km Terakhir" value="<?php echo $km_terakhir; ?>" /></td>
						</tr>
						<!-- <tr>
							<td colspan="2"> <b>Service Mesin</b> </td>
						</tr>

						<tr>
							<td>
								<div class="icheck-primary">
									<input type="checkbox" name="dinamo_starter" id="dinamo_starter" value="Y" <?php echo $dinamo_starter == 'Y' ? 'checked' : 'null' ?> />
									<label for="dinamo_starter">Dinamo Starter <?php echo form_error('dinamo_starter') ?></label>
								</div>
							</td>
							<td><input type="text" class="form-control" name="ket1" id="ket1" placeholder="Keterangan" value="<?php echo $ket1; ?>" /></td>
						</tr>
						<tr>
							<td>
								<div class="icheck-primary">
									<input type="checkbox" name="service_ecu" id="service_ecu" value="Y"  <?php echo $service_ecu == 'Y' ? 'checked' : 'null' ?> />
									<label for="service_ecu">Service Ecu <?php echo form_error('service_ecu') ?></label>
								</div>
							</td>
							<td><input type="text" class="form-control" name="ket2" id="ket2" placeholder="Keterangan" value="<?php echo $ket2; ?>" /></td>
						</tr>
						<tr>
							<td>
								<div class="icheck-primary">
									<input type="checkbox" name="karburator" id="karburator" value="Y"  <?php echo $karburator == 'Y' ? 'checked' : 'null' ?> />
									<label for="karburator">Karburator <?php echo form_error('karburator') ?></label>
								</div>
							</td>
							<td><input type="text" class="form-control" name="ket3" id="ket3" placeholder="Keterangan" value="<?php echo $ket3; ?>" /></td>
						</tr>

						<tr>
							<td colspan="2"> <b>Service Oli-Oli</b> </td>
						</tr>

						<tr>
							<td>
								<div class="icheck-primary">
									<input type="checkbox" name="oli_mesin" id="oli_mesin" value="Y"  <?php echo $oli_mesin == 'Y' ? 'checked' : 'null' ?> />
									<label for="oli_mesin">Oli Mesin <?php echo form_error('oli_mesin') ?></label>
								</div>
							</td>
							<td><input type="text" class="form-control" name="ket4" id="ket4" placeholder="Keterangan" value="<?php echo $ket4; ?>" /></td>
						</tr>

						<tr>
							<td>
								<div class="icheck-primary">
									<input type="checkbox" name="oli_power_steering" value="Y"  id="oli_power_steering" <?php echo $oli_power_steering == 'Y' ? 'checked' : 'null' ?> />
									<label for="oli_power_steering">Oli Power Steering <?php echo form_error('oli_power_steering') ?></label>
								</div>
							</td>
							<td><input type="text" class="form-control" name="ket5" id="ket5" placeholder="Keterangan" value="<?php echo $ket5; ?>" /></td>
						</tr>
						<tr>
							<td>Deksripsi <?php echo form_error('deksripsi') ?></td>
							<td> <textarea class="form-control" rows="3" name="deksripsi" id="deksripsi" placeholder="Deksripsi"><?php echo $deksripsi; ?></textarea></td>
						</tr> -->
						<tr>
							<td>Detail Item Service</td>
							<td>
								<!-- <button type="button" class="btn btn-primary btn-sm pemeliharaan-dynamic-kategori" ><i class="icon fas fa-plus "></i></button> <br> <br> -->
								<table class="table table-bordered">
									<tr>
										<td>Kategori</td>
										<td>Keterangan</td>
										<td>Remainder</td>
									</tr>
									
									<?php foreach ($pemeliharaan_detail as $key => $value) { ?>
										<tr>
											<td>
												<select  class='form-control' aria-label='form-select'
													style='width:100% !important' value="<?= $value->kategori_id?>" disabled>
											
												<?php foreach( $kategori as $k=> $v ): 
													if( $v->kategori_id !== $value->kategori_id ) continue;	
												?>
													
													<option value="<?= $v->kategori_id ?>"> <?= $v->nama_kategori ?> </option>
												<?php endforeach ?>


												</select>
											</td>
											<td>
												<textarea class='form-control height-auto' name='keterangan[]'  placeholder='Keterangan' disabled><?= $value->keterangan ?></textarea>
											</td>
											<td>
												<select class='form-control height-auto'  disabled>
													<option val=""> <?= $value->remainder ?></option>
												</select>
											</td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>

						<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
							<tr>
								<td>Upload File Pendukung <?php echo form_error('photo') ?></td>
								<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
									<!-- <div id="preview"></div> -->
								</td>
							</tr>
						<?php } else { ?>
							<div class="form-group">
								<tr>
									<td>Upload File Pendukung <?php echo form_error('photo') ?></td>
									<td>
										<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/dist/img/photo/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
										<input type="hidden" name="photo_lama" value="<?= $photo ?>">
										<p style="color: red">Note :Pilih photo Jika Ingin Merubahnya</p>
										<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
										<!-- <div id="preview"></div> -->
									</td>

								</tr>
							</div>
						<?php } ?>

					</table>
				</form>
			</div>
		</div>
	</section>
</div>
