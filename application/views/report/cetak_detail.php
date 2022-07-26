<?php
	//begin declaration
	$stylesheet	     = file_get_contents( base_url().'assets/css/pdf.css');
	
	//begin create content
	$content = "
	<html> 
		<body>
		<center><h5>Laporan Detail Peminjaman</h5></center>
		
			<table  class='table table-bordered table-hover table-sm' width='100%' cellspacing='0'>
					<tr>
						<td>No Peminjaman</td>
						<td>:</td>
						<td>".$data['no_peminjaman']."</td>
					</tr>
					<tr>
						<td>Karyawan</td>
						<td>:</td>
						<td>".$data['karyawan_id']."</td>
					</tr>
					<tr>
						<td>Unit Kerja</td>
						<td>:</td>
						<td>".$data['nama_unit']."</td>
					</tr>
					<tr>
						<td>Atasan</td>
						<td>:</td>
						<td>".$data['kepala_unit']."</td>
					</tr>
					<tr>
						<td>Kendaraan</td>
						<td>:</td>
						<td>".$data['kendaraan_id']."</td>
					</tr>
					<tr>
						<td>Tanggal Request</td>
						<td>:</td>
						<td>".$data['tanggal_request']."</td>
					</tr>
					<tr>
						<td>Estimasi Pengembalian</td>
						<td>:</td>
						<td>".$data['estimasi_pengembalian']."</td>
					</tr>
					<tr>
						<td>Tujuan</td>
						<td>:</td>
						<td>".$data['tujuan']."</td>
					</tr>
					<tr>
						<td>Keperluan</td>
						<td>:</td>
						<td>".$data['keperluan']."</td>
					</tr>
					<tr>
						<td>Status Request</td>
						<td>:</td>
						<td>".$data['status_request']."</td>
					</tr>
					<tr>
						<td>Tanggal Diperiksa</td>
						<td>:</td>
						<td>".$data['no_peminjaman']."</td>
					</tr>
					<tr>
						<td>Tanggal Pengembalian</td>
						<td>:</td>
						<td>".$data['tanggal_pengembalian']."</td>
					</tr>
					<tr>
						<td>Status Pengembalian</td>
						<td>:</td>
						<td>".$data['status_pengembalian']."</td>
					</tr>
			</table>
		</body>
	</html>
	";


	//begin  push to mpdf
	require_once "./vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	$mpdf->WriteHTML($content);
	// $now = date('Y-m-d H:i:s');
	// $mpdf->Output("App-". $now );
	$mpdf->Output();
