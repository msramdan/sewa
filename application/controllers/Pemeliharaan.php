<?php
//Memanggil file autoload
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('Pemeliharaan_model');
		$this->load->library('form_validation');
		$this->load->model('Kendaraan_model');
		$this->load->model('kategori_model');
		$this->load->model('Pemeliharaan_detail_model');
	}

	public function index()
	{
		$pemeliharaan = $this->Pemeliharaan_model->get_all();
		$data = array(
			'pemeliharaan_data' => $pemeliharaan,
		);
		$this->template->load('template', 'pemeliharaan/pemeliharaan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Pemeliharaan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'kendaraan' => $this->Kendaraan_model->get_all(),
				'action' => site_url('pemeliharaan/update_action'),
				'pemeliharaan_id' => set_value('pemeliharaan_id', $row->pemeliharaan_id),
				'jenis_pemeliharaan' => set_value('jenis_pemeliharaan', $row->jenis_pemeliharaan),
				'tgl_pemeliharaan' => set_value('tgl_pemeliharaan', $row->tgl_pemeliharaan),
				'kendaraan_id' => set_value('kendaraan_id', $row->kendaraan_id),
				'kategori_kilometer' => set_value('kategori_kilometer', $row->kategori_kilometer),
				'km_terakhir' => set_value('km_terakhir', $row->km_terakhir),
				'deksripsi' => set_value('deksripsi', $row->deksripsi),
				'photo' => set_value('photo', $row->photo),
				'pemeliharaan_detail' => $this->Pemeliharaan_detail_model->get_by_id_pemeliharaan( $row->pemeliharaan_id ),
				"kategori" =>  $this->kategori_model->get_all(),
			);
			$this->template->load('template', 'pemeliharaan/pemeliharaan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pemeliharaan'));
		}
	}

	public function create()
	{

		$data = array(
			'button' => 'Create',
			'kendaraan' => $this->Kendaraan_model->get_all(),
			'action' => site_url('pemeliharaan/create_action'),
			'pemeliharaan_id' => set_value('pemeliharaan_id'),
			'jenis_pemeliharaan' => set_value('jenis_pemeliharaan'),
			'tgl_pemeliharaan' => set_value('tgl_pemeliharaan'),
			'kendaraan_id' => set_value('kendaraan_id'),
			'kategori_kilometer' => set_value('kategori_kilometer'),
			'km_terakhir' => set_value('km_terakhir'),
			'deksripsi' => set_value('deksripsi'),
			'photo' => set_value('photo'),
			"kategori" =>  $this->kategori_model->get_all(),
	);

		$this->template->load('template', 'pemeliharaan/pemeliharaan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$config['upload_path']      = './assets/dist/img/photo';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload("photo");
			$data = $this->upload->data();
			$photo = $data['file_name'];
			$categories  = $this->input->post('kategori_id');
			$keterangans = $this->input->post('keterangan');
			$remainders = $this->input->post('remainder');


			$data = array(
				'jenis_pemeliharaan' => $this->input->post('jenis_pemeliharaan', TRUE),
				'tgl_pemeliharaan' => $this->input->post('tgl_pemeliharaan', TRUE),
				'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
				'kategori_kilometer' => $this->input->post('kategori_kilometer', TRUE),
				'km_terakhir' => $this->input->post('km_terakhir', TRUE),
				'deksripsi' => $this->input->post('deksripsi', TRUE),
				'photo' => $photo,
			);

			$insert_id = $this->Pemeliharaan_model->insert($data);


			//if category available
			if( $categories ){

				foreach ($categories as $key => $value) {
					$data = [ "pemeliharaan_id" => $insert_id, "kategori_id" => $value , "keterangan" => $keterangans[ $key ], "remainder" => $remainders[ $key ]];

					$this->Pemeliharaan_detail_model->insert( $data );
				}
			}


			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('pemeliharaan'));
		}
	}

	public function update($id)
	{
		$row = $this->Pemeliharaan_model->get_by_id(decrypt_url($id));

		if ($row) {

			$data = array(
				'button' => 'Update',
				'kendaraan' => $this->Kendaraan_model->get_all(),
				'action' => site_url('pemeliharaan/update_action'),
				'pemeliharaan_id' => set_value('pemeliharaan_id', $row->pemeliharaan_id),
				'jenis_pemeliharaan' => set_value('jenis_pemeliharaan', $row->jenis_pemeliharaan),
				'tgl_pemeliharaan' => set_value('tgl_pemeliharaan', $row->tgl_pemeliharaan),
				'kendaraan_id' => set_value('kendaraan_id', $row->kendaraan_id),
				'kategori_kilometer' => set_value('kategori_kilometer', $row->kategori_kilometer),
				'km_terakhir' => set_value('km_terakhir', $row->km_terakhir),
				'deksripsi' => set_value('deksripsi', $row->deksripsi),
				'photo' => set_value('photo', $row->photo),
				"kategori" =>  $this->kategori_model->get_all(),
				'pemeliharaan_detail' => $this->Pemeliharaan_detail_model->get_by_id_pemeliharaan( $row->pemeliharaan_id ),
	
			);
			$this->template->load('template', 'pemeliharaan/pemeliharaan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pemeliharaan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('pemeliharaan_id', TRUE)));
		} else {
			$config['upload_path']      = './assets/dist/img/photo';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	        $id = (int)$this->input->post('pemeliharaan_id', TRUE );
			
			if ($this->upload->do_upload("photo")) {
				$row = $this->Pemeliharaan_model->get_by_id($id);
				$data = $this->upload->data();
				$photo = $data['file_name'];
				if ($row->photo == null || $row->photo == '') {
				} else {
					$target_file = './assets/dist/img/photo/' . $row->photo;
					unlink($target_file);
				}
			} else {
				$photo = $this->input->post('photo_lama');
			}

	 		$update_detail_id	    = $this->input->post('update_detail_id',TRUE);
	 		$update_kategori	    = $this->input->post('update_kategori_id',TRUE);
	 		$update_keterangan      = $this->input->post('update_keterangan',TRUE);
	 		$update_remainder      = $this->input->post('update_remainder',TRUE);
	 		$kategori	  		    = $this->input->post('kategori_id',TRUE);
	 		$keterangan    			= $this->input->post('keterangan',TRUE);
	 		$remainder    			= $this->input->post('remainder',TRUE);

			if( $update_kategori || $update_keterangan ){
				foreach ($update_kategori as $key => $value) {
					$data = [ "pemeliharaan_id" => $id, "kategori_id" => ( int )$value , "keterangan" => $update_keterangan[ $key ], "remainder" => $update_remainder[ $key ]];
					$detail_id = (int) $update_detail_id[ $key ];
					$this->Pemeliharaan_detail_model->updateByPemeliharaan( $detail_id, $id,  $data );
				}
			}


			if( $kategori ){
				foreach ($kategori as $key => $value) {
					$data = [ "pemeliharaan_id" => $id, "kategori_id" => ( int )$value , "keterangan" => $keterangan[ $key ], "remainder" => $remainder[ $key ]];

					$this->Pemeliharaan_detail_model->insert( $data );
				}
			}

			$data = array(
				'jenis_pemeliharaan' => $this->input->post('jenis_pemeliharaan', TRUE),
				'tgl_pemeliharaan' => $this->input->post('tgl_pemeliharaan', TRUE),
				'kendaraan_id' => $this->input->post('kendaraan_id', TRUE),
				'kategori_kilometer' => $this->input->post('kategori_kilometer', TRUE),
				'km_terakhir' => $this->input->post('km_terakhir', TRUE),
				'deksripsi' => $this->input->post('deksripsi', TRUE),
				'photo' => $photo,
			);

			$this->Pemeliharaan_model->update($id, $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pemeliharaan'));
		}
	}

	public function delete_pemeliharaan_detail($id)
	{
		$row = $this->Pemeliharaan_detail_model->get_by_id(decrypt_url($id));

		// var_dump( $row );
		if ($row) {		
			$this->Pemeliharaan_detail_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			// redirect(site_url('pemeliharaan'));
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			// header('Content-Type: application/json');
			// return json_encode( ["success" => false ]);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete($id)
	{
		$row = $this->Pemeliharaan_model->get_by_id(decrypt_url($id));

		if ($row) {
			if ($row->photo == null || $row->photo == '') {
			} else {
				$target_file = './assets/dist/img/photo/' . $row->photo;
				unlink($target_file);
			}
			
			$this->Pemeliharaan_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('pemeliharaan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pemeliharaan'));
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('jenis_pemeliharaan', 'jenis pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('kendaraan_id', 'kendaraan id', 'trim|required');
		$this->form_validation->set_rules('tgl_pemeliharaan', 'Jadwal Pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('kategori_kilometer', 'kategori kilometer', 'trim|required');
		$this->form_validation->set_rules('km_terakhir', 'km terakhir', 'trim|required');
		$this->form_validation->set_rules('deksripsi', 'deksripsi', 'trim|required');
		$this->form_validation->set_rules('photo', 'photo', 'trim');

		$this->form_validation->set_rules('pemeliharaan_id', 'pemeliharaan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function download($gambar)
	{
		force_download('assets/dist/img/photo/' . $gambar, NULL);
	}

		
	public function export( $type ){
		$data = $this->Pemeliharaan_model->get_all();
		

		if( $type === "pdf" ){ 
			return  $this->load->view( "report/pemeliharaan_pdf", [ "data" => $data  ] );
		};
		
		return $this->generateExcel( $data );
	}

	private function generateExcel( $data ){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		// create variable to handle layout row & column
		$style_row = $this->layoutexcel::get_style_row();
		$style_col = $this->layoutexcel::get_style_col();

		$from_cell = 'A';
		$to_cell   = 'G';

		$sheet->setCellValue($from_cell.'1', "DATA PEMELIHARAAN"); // Set column A1
		$sheet->mergeCells($from_cell.'1:'. $to_cell .'2'); // Set Merge Cell A1 to P2
		$sheet->getStyle($from_cell.'1:'.$to_cell.'2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle($from_cell.'1')->getFont()->setBold(true)->setSize(14); // Set bold column A1

		$label_row = 3;
		$labels    = ["No","Jenis Pemeliharaan","Jadwal Pemeliharaan","Kendaraan","Kategori Kilometer","KM Terakhir","Deskripsi"];

		$width_column = [5,20,20,20,30,20,40];

		//create header  use looping every column  Anf apply style header
		foreach(range( $from_cell,$to_cell) as $key=>$val) 
		{ 
			$sheet->setCellValue($val.$label_row, $labels[$key]);
			$sheet->getStyle($val.$label_row)->applyFromArray($style_col);
		}  

		$no = 1; //starter 1
		$numrow = 4; // Set first row to fill table adalah use four num at rows

		foreach($data as $p){ 
			$value_data = [$no, $p->jenis_pemeliharaan, $p->tgl_pemeliharaan ,$p->nama_kendaraan, $p->kategori_kilometer, $p->km_terakhir,$p->deksripsi ]; 

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
		$sheet->setTitle("Laporan Data Pemeliharaan");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Pemeliharaan.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	  
	}
}

/* End of file Pemeliharaan.php */
/* Location: ./application/controllers/Pemeliharaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-26 22:43:01 */
/* http://harviacode.com */
