<?php
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Peminjaman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Peminjaman_model');
		$this->load->model('Kendaraan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$peminjaman = $this->Peminjaman_model->get_all();
		$data = array(
			'peminjaman_data' => $peminjaman,
		);
		$this->template->load('template', 'peminjaman/peminjaman_list', $data);
	}


	public function kembali()
	{
		$peminjaman = $this->Peminjaman_model->get_all_pengembalian();
		$data = array(
			'peminjaman_data' => $peminjaman,
		);
		$this->template->load('template', 'peminjaman/pengembalian_list', $data);
	}


	public function read($id)
	{
		$row = $this->Peminjaman_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'peminjaman_id' => $row->peminjaman_id,
				'komentar_pengembalian' => $row->komentar_pengembalian,
				'status_tepat_waktu' => $row->status_tepat_waktu,
				'komentar' => $row->komentar,
				'no_peminjaman' => $row->no_peminjaman,
				'karyawan_id' => $row->nama_pegawai,
				'nama_unit' => $row->nama_unit,
				'kepala_unit' => $row->kepala_unit,
				'ttd' => $row->ttd,
				'kendaraan_id' => $row->nopol,
				'nama_kendaraan' => $row->nama_kendaraan,
				'tanggal_request' => $row->tanggal_request,
				'estimasi_pengembalian' => $row->estimasi_pengembalian,
				'tujuan' => $row->tujuan,
				'keperluan' => $row->keperluan,
				'tanggal_approved' => $row->tanggal_approved,
				'status_request' => $row->status_request,
				'tanggal_pengembalian' => $row->tanggal_pengembalian,
				'photo' => $row->photo,
				'status_pengembalian' => $row->status_pengembalian,
			);
			$this->template->load('template', 'peminjaman/peminjaman_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peminjaman'));
		}
	}

	public function create()
	{
		$kode = $this->Peminjaman_model->generatekodeReq();

		$data = array(
			'button' => 'Create',
			'kendaraan' => $this->Kendaraan_model->get_all_available(),
			'action' => site_url('peminjaman/create_action'),
			'peminjaman_id' => set_value('peminjaman_id'),
			'no_peminjaman' => set_value('no_peminjaman'),
			'karyawan_id' => set_value('karyawan_id'),
			'kendaraan_id' => set_value('kendaraan_id'),
			'tanggal_request' => set_value('tanggal_request'),
			'estimasi_pengembalian' => set_value('estimasi_pengembalian'),
			'tujuan' => set_value('tujuan'),
			'keperluan' => set_value('keperluan'),
			'tanggal_approved' => set_value('tanggal_approved'),
			'status_request' => set_value('status_request'),
			'tanggal_pengembalian' => set_value('tanggal_pengembalian'),
			'photo' => set_value('photo'),
			'status_pengembalian' => set_value('status_pengembalian'),
			'kode' => $kode,
		);
		$this->template->load('template', 'peminjaman/peminjaman_form', $data);
	}

	public function create_pengembalian()
	{
		$data = array(
			'button' => 'Create',
			'peminjaman' => $this->Peminjaman_model->get_all_pengembalian_form(),
			'action' => site_url('peminjaman/update_action_pengembalian'),
			'peminjaman_id' => set_value('peminjaman_id'),
			'no_peminjaman' => set_value('no_peminjaman'),
			'karyawan_id' => set_value('karyawan_id'),
			'kendaraan_id' => set_value('kendaraan_id'),
			'tanggal_request' => set_value('tanggal_request'),
			'estimasi_pengembalian' => set_value('estimasi_pengembalian'),
			'tujuan' => set_value('tujuan'),
			'keperluan' => set_value('keperluan'),
			'tanggal_approved' => set_value('tanggal_approved'),
			'status_request' => set_value('status_request'),
			'tanggal_pengembalian' => set_value('tanggal_pengembalian'),
			'photo' => set_value('photo'),
			'status_pengembalian' => set_value('status_pengembalian'),
		);
		$this->template->load('template', 'peminjaman/pengembalian_form', $data);
	}

	public function update_action_pengembalian()
	{
		$config['upload_path']      = './assets/dist/img/photo';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload("photo");
		$data = $this->upload->data();
		$photo = $data['file_name'];
		$data = array(
			'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian', TRUE),
			'photo' => $photo,
			'status_pengembalian' => 'Waiting'
		);
		$this->Peminjaman_model->update($this->input->post('peminjaman_id'), $data);

		$this->session->set_flashdata('message', 'Create Pengembalian berhasil');
		redirect(site_url('peminjaman/kembali'));
	}


	public function create_action()
	{
		$pegawai_id = pegawai_id($this->session->userdata('userid'));

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'no_peminjaman' => $this->input->post('no_peminjaman', TRUE),
				'karyawan_id' => $pegawai_id,
				'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
				'tanggal_request' =>  $this->input->post('tanggal_request', TRUE),
				'estimasi_pengembalian' => $this->input->post('estimasi_pengembalian', TRUE),
				'tujuan' => $this->input->post('tujuan', TRUE),
				'keperluan' => $this->input->post('keperluan', TRUE),
				'status_request' => 'Waiting'
			);
			$this->Peminjaman_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('peminjaman'));
		}
	}

	public function update($id)
	{
		$row = $this->Peminjaman_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'kendaraan' => $this->Kendaraan_model->get_all_available(),
				'action' => site_url('peminjaman/update_action'),
				'peminjaman_id' => set_value('peminjaman_id', $row->peminjaman_id),
				'no_peminjaman' => set_value('no_peminjaman', $row->no_peminjaman),
				'karyawan_id' => set_value('karyawan_id', $row->karyawan_id),
				'kendaraan_id' => set_value('kendaraan_id', $row->kendaraan_id),
				'tanggal_request' => set_value('tanggal_request', $row->tanggal_request),
				'estimasi_pengembalian' => set_value('estimasi_pengembalian', $row->estimasi_pengembalian),
				'tujuan' => set_value('tujuan', $row->tujuan),
				'keperluan' => set_value('keperluan', $row->keperluan),
				'tanggal_approved' => set_value('tanggal_approved', $row->tanggal_approved),
				'status_request' => set_value('status_request', $row->status_request),
				'tanggal_pengembalian' => set_value('tanggal_pengembalian', $row->tanggal_pengembalian),
				'photo' => set_value('photo', $row->photo),
				'status_pengembalian' => set_value('status_pengembalian', $row->status_pengembalian),
			);
			$this->template->load('template', 'peminjaman/peminjaman_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peminjaman'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('peminjaman_id', TRUE));
		} else {
			$pegawai_id = pegawai_id($this->session->userdata('userid'));
			$data = array(
				'no_peminjaman' => $this->input->post('no_peminjaman', TRUE),
				'karyawan_id' => $pegawai_id,
				'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
				'tanggal_request' => $this->input->post('tanggal_request', TRUE),
				'estimasi_pengembalian' => $this->input->post('estimasi_pengembalian', TRUE),
				'tujuan' => $this->input->post('tujuan', TRUE),
				'keperluan' => $this->input->post('keperluan', TRUE),
				'status_request' => 'Waiting'
			);

			$this->Peminjaman_model->update($this->input->post('peminjaman_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('peminjaman'));
		}
	}

	public function delete($id)
	{
		$row = $this->Peminjaman_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Peminjaman_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('peminjaman'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peminjaman'));
		}
	}

	public function delete_pengembalian($id)
	{

		$row = $this->Peminjaman_model->get_by_id(decrypt_url($id));

		if ($row) {
			if ($row->photo == null || $row->photo == '') {
			} else {
				$target_file = './assets/dist/img/photo/' . $row->photo;
				unlink($target_file);
			}

			$data = array(
				'tanggal_pengembalian' => null,
				'photo' => null,
				'status_pengembalian' => null
			);
			$this->Peminjaman_model->update(decrypt_url($id), $data);
			$this->session->set_flashdata('message', 'Delete Pengembalian berhasil');
			redirect(site_url('peminjaman/kembali'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peminjaman'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_peminjaman', 'no peminjaman', 'trim|required');
		// $this->form_validation->set_rules('karyawan_id', 'karyawan id', 'trim|required');
		$this->form_validation->set_rules('kendaraan_id', 'kendaraan id', 'trim|required');
		$this->form_validation->set_rules('tanggal_request', 'tanggal request', 'trim|required');
		$this->form_validation->set_rules('estimasi_pengembalian', 'estimasi pengembalian', 'trim|required');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
		// $this->form_validation->set_rules('tanggal_approved', 'tanggal approved', 'trim|required');
		// $this->form_validation->set_rules('status_request', 'status request', 'trim|required');
		// $this->form_validation->set_rules('tanggal_pengembalian', 'tanggal pengembalian', 'trim|required');
		// $this->form_validation->set_rules('photo', 'photo', 'trim|required');
		// $this->form_validation->set_rules('status_pengembalian', 'status pengembalian', 'trim|required');
		$this->form_validation->set_rules('peminjaman_id', 'peminjaman_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}


	public function updatePeminjaman()
	{
		$id = $this->input->post('peminjaman_id_modal');
		$status = $this->input->post('statusPeminjaman');
		$komentar = $this->input->post('komentar');

		$query = $this->db->query("SELECT * from peminjaman where peminjaman_id='$id'")->row();
		// update status peminjaman
		$dateNow = date('Y-m-d H:i:s');
		$data = "UPDATE peminjaman
        SET status_request='$status',
		komentar='$komentar',
		tanggal_approved='$dateNow'
        WHERE peminjaman_id='$id'";

		$statusPeminjaman = $this->db->query($data);

		if ($status == "Approved") {
			if ($statusPeminjaman) {
				$this->db->query("UPDATE kendaraan
				SET status='Not available'
				WHERE kendaraan_id ='$query->kendaraan_id'");
			}
		}

		$this->session->set_flashdata('message', 'Peminjaman Berhasil di ' . $status);
		redirect(site_url('peminjaman'));
	}


	public function updatePengembalian(){
		
		$id = $this->input->post('peminjaman_id_modal');
		$status_tepat_waktu = $this->input->post('status_tepat_waktu');
		$status = $this->input->post('statusPeminjaman');
		$komentar = $this->input->post('komentar_pengembalian');
		$data = $this->db->query("SELECT * from peminjaman where peminjaman_id='$id'")->row();

		if($data){
			$dateNow = date('Y-m-d H:i:s');
			$statusPeminjaman = $this->db->query("UPDATE peminjaman
			SET status_pengembalian='$status',
			komentar_pengembalian='$komentar',
			status_tepat_waktu='$status_tepat_waktu',
			tanggal_approved='$dateNow'
			WHERE peminjaman_id='$id'");



				if ($status == "Approved") {
					if ($statusPeminjaman) {
						$this->db->query("UPDATE kendaraan
						SET status='available'
						WHERE kendaraan_id ='$data->kendaraan_id'");
					}
				}
			$this->session->set_flashdata('message', 'Pengembalian Berhasil di Approved');
			redirect(site_url('peminjaman/kembali'));
		}else{
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(site_url('peminjaman/kembali'));
		}
		
	}


	// public function approved_pengembalian($id)
	// {
	// 	$data = $this->db->query("SELECT * from peminjaman where peminjaman_id='$id'")->row();

	// 	$statusPeminjaman = $this->db->query("UPDATE peminjaman
    //     SET status_pengembalian='Approved'
    //     WHERE peminjaman_id='$id'");

	// 	// update status kendaraan not availabe
		

	// 	$this->session->set_flashdata('message', 'Pengembalian Berhasil di Approved');
	// 	redirect(site_url('peminjaman/kembali'));
	// }

	// public function reject_pengembalian($id)
	// {
	// 	$this->db->query("UPDATE peminjaman
    //     SET status_pengembalian='Reject'
    //     WHERE peminjaman_id='$id'");
	// 	$this->session->set_flashdata('message', 'Pengembalian di Reject');
	// 	redirect(site_url('peminjaman/kembali'));
	// }

	public function download($gambar)
	{
		force_download('assets/dist/img/photo/' . $gambar, NULL);
	}

	
	public function export( $type ){
		$data = $this->Peminjaman_model->get_all();
		if ( $type === "pdf" ) return $this->load->view("report/pinjaman_pdf", [ "data" => $data ]);
		
		// var_dump( $data );
		return  $this->generateExcel( $data );
	}

	public function cetakPdf($id){
			$row = $this->Peminjaman_model->get_by_id($id);
			$data = array(
				'peminjaman_id' => $row->peminjaman_id,
				'no_peminjaman' => $row->no_peminjaman,
				'karyawan_id' => $row->nama_pegawai,
				'nama_unit' => $row->nama_unit,
				'kepala_unit' => $row->kepala_unit,
				'ttd' => $row->ttd,
				'kendaraan_id' => $row->nopol,
				'nama_kendaraan' => $row->nama_kendaraan,
				'tanggal_request' => $row->tanggal_request,
				'estimasi_pengembalian' => $row->estimasi_pengembalian,
				'tujuan' => $row->tujuan,
				'keperluan' => $row->keperluan,
				'tanggal_approved' => $row->tanggal_approved,
				'status_request' => $row->status_request,
				'tanggal_pengembalian' => $row->tanggal_pengembalian,
				'photo' => $row->photo,
				'status_pengembalian' => $row->status_pengembalian,
			);
		return $this->load->view("report/cetak_detail", [ "data" => $data ]);
	}

	

	private function generateExcel( $data ){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// create variable to handle layout row & column
		$style_row = $this->layoutexcel::get_style_row();
		$style_col = $this->layoutexcel::get_style_col();

		$from_cell = 'A';
		$to_cell   = ( $this->session->userdata('level_id') == 1 ) ? 'H' : 'G';
		$label_row = 3;

		$sheet->setCellValue('A1', "DATA PEMINJAMAN"); // Set column A1
		$sheet->mergeCells($from_cell.'1:'. $to_cell.'2'); // Set Merge Cell A1 to P2
		$sheet->getStyle($from_cell.'1:'. $to_cell.'2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle($from_cell.'1')->getFont()->setBold(true)->setSize(14); // Set bold column A1

		$labels    = ["No","No Peminjaman","Karyawan","Nopol","Tanggal Request", "Estimasi Pengembalian","Tujuan", "Status Request","Status Pengembalian"];

		$width_column = [5,20,20,30,30,20,30,30,30];

		if( $this->session->userdata('level_id') != 1 ){
			array_splice($labels, 2, 1);  
			array_splice($width_column, 2, 1);  
		}

		//create header  use looping every column  Anf apply style header
		foreach(range( $from_cell,$to_cell) as $key=>$val) 
		{ 
			$sheet->setCellValue($val.$label_row, $labels[$key]);
			$sheet->getStyle($val.$label_row)->applyFromArray($style_col);
		}  

		$no = 1; //starter 1
		$numrow = 4; // Set first row to fill table adalah use four num at rows

		foreach($data as $p){ 
			$value_data = [$no, $p->no_peminjaman, $p->nama_pegawai, $p->nopol."-".$p->nama_kendaraan, $p->tanggal_request, $p->estimasi_pengembalian, $p->tujuan,$p->status_request, $p->status_pengembalian ]; 

			if( $this->session->userdata('level_id') != 1 ){
				array_splice($value_data, 2, 1);  
			}
			//Push and manage Coloumn
			foreach(range( $from_cell,$to_cell) as $key=>$val) 
			{ 
			
				$sheet->setCellValue( $val.$numrow, $value_data[ $key ] );
				$sheet->getStyle( $val.$numrow )->applyFromArray($style_row);
			}  
		  
		  $no++; // increase every looping
		  $numrow++; // increase every looping
		}

		foreach(range( $from_cell,$to_cell) as $key=>$val) 
			{ 
				$sheet->getColumnDimension( $val )->setWidth( $width_column[ $key ] );
			}  
		
		$sheet->getDefaultRowDimension()->setRowHeight(-1);

		$sheet->getPageSetup()->setOrientation
		(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$sheet->setTitle("Laporan Data Peminjaman");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Peminjaman.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	  
	}

}
