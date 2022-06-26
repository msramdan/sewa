<div class="content-wrapper">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4>KELOLA DATA KENDARAAN</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
					<li class="breadcrumb-item active">kendaraan</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="card">

		<div class="card-body" style="overflow-x: scroll;">
			<div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('kendaraan/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                </div>
				<table id="data-table-default" class="table table-bordered table-hover">
         <thead>
            <tr>
                <th>No</th>
		<th>Nopol</th>
		<th>Nama Kendaraan</th>
		<th>Merk</th>
		<th>Warna</th>
		<th>Tahun</th>
		<th>No Rangka</th>
		<th>No Mesin</th>
		<th>No Bpkb</th>
		<th>Tgl Berlaku Stnk</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($kendaraan_data as $kendaraan)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $kendaraan->nopol ?></td>
			<td><?php echo $kendaraan->nama_kendaraan ?></td>
			<td><?php echo $kendaraan->merk ?></td>
			<td><?php echo $kendaraan->warna ?></td>
			<td><?php echo $kendaraan->tahun ?></td>
			<td><?php echo $kendaraan->no_rangka ?></td>
			<td><?php echo $kendaraan->no_mesin ?></td>
			<td><?php echo $kendaraan->no_bpkb ?></td>
			<td><?php echo $kendaraan->tgl_berlaku_stnk ?></td>
			<td>
				<?php 
				echo anchor(site_url('kendaraan/update/'.encrypt_url($kendaraan->kendaraan_id)),'<i class="fas fa-pencil-alt" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('kendaraan/delete/'.encrypt_url($kendaraan->kendaraan_id)),'<i class="fas fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
