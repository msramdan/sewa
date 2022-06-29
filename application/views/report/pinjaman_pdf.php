<?php
	//begin declaration
	$stylesheet	     = file_get_contents( base_url().'assets/css/pdf.css');
	$tbody_child     = "";
	$no				 = 1;
	$label_pegawai   = ( $this->session->userdata('level_id') == 1 ) ? '<th>Karyawan</th>' : '';

	//loop data 
	foreach ($data as $peminjaman){
		$nama_pegawai = "";

		if ($this->session->userdata('level_id') == 1) { 
			$nama_pegawai =  "<td align='center'>".$peminjaman->nama_pegawai."</td>";
		}
		
		$tbody_child .= "<tr>
			<td align='right'>".$no.".</td>
			<td align='right'>".$peminjaman->no_peminjaman."</td>
			".$nama_pegawai."
			<td>".$peminjaman->nopol."-".$peminjaman->nama_kendaraan."</td>
			<td align='right'>".$peminjaman->tanggal_request."</td>
			<td align='right'>".$peminjaman->estimasi_pengembalian."</td>
			<td align='center'>".$peminjaman->tujuan."</td>
			<td align='center'>".$peminjaman->status_request."</td>
			<td align='center'>".$peminjaman->status_pengembalian."</td>

		</tr>";
	}


	//begin create content
	$content = "
	<html> 
		<body>
			<h1>Laporan Peminjaman</h1> 
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>No Peminjaman</th>
						". $label_pegawai ."
						<th>Nopol</th>
						<th>Tanggal Request</th>
						<th>Estimasi Pengembalian</th>
						<th>Tujuan</th>
						<th>Status Request</th>
						<th>Status Pengembalian</th>
					</tr>
				</thead>

				<tbody>
					". $tbody_child ."
				</tbody>
			</table>
		</body>
	</html>
	";


	//begin  push to mpdf
	require_once "./vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("L","","","","","5","5","5","5","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	$mpdf->WriteHTML($content);
	$now = date('Y-m-d H:i:s');
	// $mpdf->Output("App-". $now );
	$mpdf->Output();
?>