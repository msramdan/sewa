<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
        $this->load->model('Kendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kendaraan = $this->Kendaraan_model->get_all();
        $data = array(
            'kendaraan_data' => $kendaraan,
        );
        $this->template->load('template','kendaraan/kendaraan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kendaraan_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
			'kendaraan_id' => $row->kendaraan_id,
			'nopol' => $row->nopol,
			'nama_kendaraan' => $row->nama_kendaraan,
			'merk' => $row->merk,
			'warna' => $row->warna,
			'tahun' => $row->tahun,
			'no_rangka' => $row->no_rangka,
			'no_mesin' => $row->no_mesin,
			'no_bpkb' => $row->no_bpkb,
			'tgl_berlaku_stnk' => $row->tgl_berlaku_stnk,
			);
            $this->template->load('template','kendaraan/kendaraan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kendaraan/create_action'),
			'kendaraan_id' => set_value('kendaraan_id'),
			'nopol' => set_value('nopol'),
			'nama_kendaraan' => set_value('nama_kendaraan'),
			'merk' => set_value('merk'),
			'warna' => set_value('warna'),
			'tahun' => set_value('tahun'),
			'no_rangka' => set_value('no_rangka'),
			'no_mesin' => set_value('no_mesin'),
			'no_bpkb' => set_value('no_bpkb'),
			'tgl_berlaku_stnk' => set_value('tgl_berlaku_stnk'),
		);
		$this->template->load('template','kendaraan/kendaraan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nopol' => $this->input->post('nopol',TRUE),
		'nama_kendaraan' => $this->input->post('nama_kendaraan',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'no_rangka' => $this->input->post('no_rangka',TRUE),
		'no_mesin' => $this->input->post('no_mesin',TRUE),
		'no_bpkb' => $this->input->post('no_bpkb',TRUE),
		'tgl_berlaku_stnk' => $this->input->post('tgl_berlaku_stnk',TRUE),
	    );

            $this->Kendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kendaraan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kendaraan/update_action'),
		'kendaraan_id' => set_value('kendaraan_id', $row->kendaraan_id),
		'nopol' => set_value('nopol', $row->nopol),
		'nama_kendaraan' => set_value('nama_kendaraan', $row->nama_kendaraan),
		'merk' => set_value('merk', $row->merk),
		'warna' => set_value('warna', $row->warna),
		'tahun' => set_value('tahun', $row->tahun),
		'no_rangka' => set_value('no_rangka', $row->no_rangka),
		'no_mesin' => set_value('no_mesin', $row->no_mesin),
		'no_bpkb' => set_value('no_bpkb', $row->no_bpkb),
		'tgl_berlaku_stnk' => set_value('tgl_berlaku_stnk', $row->tgl_berlaku_stnk),
	    );
            $this->template->load('template','kendaraan/kendaraan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kendaraan_id', TRUE));
        } else {
            $data = array(
		'nopol' => $this->input->post('nopol',TRUE),
		'nama_kendaraan' => $this->input->post('nama_kendaraan',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'no_rangka' => $this->input->post('no_rangka',TRUE),
		'no_mesin' => $this->input->post('no_mesin',TRUE),
		'no_bpkb' => $this->input->post('no_bpkb',TRUE),
		'tgl_berlaku_stnk' => $this->input->post('tgl_berlaku_stnk',TRUE),
	    );

            $this->Kendaraan_model->update($this->input->post('kendaraan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kendaraan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Kendaraan_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nopol', 'nopol', 'trim|required');
	$this->form_validation->set_rules('nama_kendaraan', 'nama kendaraan', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('no_rangka', 'no rangka', 'trim|required');
	$this->form_validation->set_rules('no_mesin', 'no mesin', 'trim|required');
	$this->form_validation->set_rules('no_bpkb', 'no bpkb', 'trim|required');
	$this->form_validation->set_rules('tgl_berlaku_stnk', 'tgl berlaku stnk', 'trim|required');

	$this->form_validation->set_rules('kendaraan_id', 'kendaraan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kendaraan.php */
/* Location: ./application/controllers/Kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-25 16:26:12 */
/* http://harviacode.com */
