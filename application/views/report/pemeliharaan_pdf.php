<?php
	//begin declaration
	$stylesheet	     = file_get_contents( base_url().'assets/css/pdf.css');
	$tbody_child     = "";
	$no				 = 1;
	//loop data 
	foreach ($data as $pemeliharaan){

		
		$tbody_child .= "<tr>
		<td align='right'>". $no++ ."</td>
		<td align='center'>". $pemeliharaan->jenis_pemeliharaan ."</td>
		<td align='center'>". $pemeliharaan->nama_kendaraan ."</td>
		<td align='right'>". $pemeliharaan->kategori_kilometer ."</td>
		<td align='right'>". $pemeliharaan->km_terakhir ."</td>
		<td align='right'>". $pemeliharaan->dinamo_starter ."</td>
		<td align='center'>". $pemeliharaan->ket1 ."</td>
		<td align='center'>". $pemeliharaan->service_ecu ."</td>
		<td align='center'>". $pemeliharaan->ket2 ."</td>
		<td align='center'>". $pemeliharaan->karburator ."</td>
		<td align='center'>". $pemeliharaan->ket3 ."</td>
		<td align='center'>". $pemeliharaan->oli_mesin ."</td>
		<td align='center'>". $pemeliharaan->ket4 ."</td>
		<td align='right'>". $pemeliharaan->oli_power_steering ."</td>
		<td align='center'>". $pemeliharaan->ket5 ."</td>
		<td align='center'>". $pemeliharaan->deksripsi ."</td>

		</tr>";
	}


	//begin create content
	$content = "
	<html> 
		<body>
			<h1>Laporan Pemeliharaan</h1> 
			<table>
				<thead>
					<tr>
					<th>No</th>
					<th>Jenis Pemeliharaan</th>
					<th>Kendaraan</th>
					<th>Kategori Kilometer</th>
					<th>Km Terakhir</th>
					<th>Dinamo Starter</th>
					<th>Ket1</th>
					<th>Service Ecu</th>
					<th>Ket2</th>
					<th>Karbu</th>
					<th>Ket3</th>
					<th>Oli Mesin</th>
					<th>Ket4</th>
					<th>Oli Power Steering</th>
					<th>Ket5</th>
					<th>Deksripsi</th>
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
	// $now = date('Y-m-d H:i:s');
	// $mpdf->Output("App-". $now );
	$mpdf->Output();
?>