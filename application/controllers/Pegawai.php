<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Pegawai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('Pegawai_model');
		$this->load->model('Unit_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$pegawai = $this->Pegawai_model->get_all();
		$data = array(
			'pegawai_data' => $pegawai,
		);
		$this->template->load('template', 'pegawai/pegawai_list', $data);
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'unit' => $this->Unit_model->get_all(),
			'action' => site_url('pegawai/create_action'),
			'pegawai_id' => set_value('pegawai_id'),
			'nip_lama' => set_value('nip'),
			'nip' => set_value('nip'),
			'nama_pegawai' => set_value('nama_pegawai'),
			'unit_id' => set_value('unit_id'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'no_hp' => set_value('no_hp'),
			'password' => set_value('password'),
			'alamat' => set_value('alamat'),
		);
		$this->template->load('template', 'pegawai/pegawai_form', $data);
	}

	public function create_action()
	{
		$this->_rules(null, null, null);
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data2 = array(
				'password' => sha1($this->input->post('password', TRUE)),
				'username' => $this->input->post('nip', TRUE),
				'level_id' => 2
			);
			$this->db->insert('user', $data2);

			if ($this->db->affected_rows() > 0) {
				$data = array(
					'nip' => $this->input->post('nip', TRUE),
					'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
					'unit_id' => $this->input->post('unit_id', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'no_hp' => $this->input->post('no_hp', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
				);

				$this->Pegawai_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('pegawai'));
			}
			$this->session->set_flashdata('error', 'Create Record Failed');
			redirect(site_url('pegawai'));
		}
	}

	public function update($id)
	{
		$row = $this->Pegawai_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'nip_lama' => $row->nip,
				'unit' => $this->Unit_model->get_all(),
				'action' => site_url('pegawai/update_action'),
				'pegawai_id' => set_value('pegawai', $row->pegawai_id),
				'nip' => set_value('nip', $row->nip),
				'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
				'unit_id' => set_value('unit_id', $row->unit_id),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'alamat' => set_value('alamat', $row->alamat),
			);
			$this->template->load('template', 'pegawai/pegawai_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pegawai'));
		}
	}

	public function update_action()
	{
		$this->_rules('update', $this->input->post('nip'), $this->input->post('nip'));

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('pegawai', TRUE));
		} else {
			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'username' => $this->input->post('nip', TRUE),
					'level_id' => 2
				);
				$this->db->where('username', $this->input->post('nip_lama'));
				$this->db->update('user', $data);
			} else {
				$data = array(
					'password' => sha1($this->input->post('password', TRUE)),
					'username' => $this->input->post('nip', TRUE),
					'level_id' => 2
				);
				$this->db->where('username', $this->input->post('nip_lama'));
				$this->db->update('user', $data);
			}

			$data = array(
				'nip' => $this->input->post('nip', TRUE),
				'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
				'unit_id' => $this->input->post('unit_id', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
			);

			$this->Pegawai_model->update($this->input->post('pegawai', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pegawai'));
		}
	}

	public function delete($id)
	{
		$row = $this->Pegawai_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Pegawai_model->delete(decrypt_url($id));

			if ($this->db->affected_rows() > 0) {
				$this->db->where('username', $row->nip);
				$this->db->delete('user');
			}


			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('pegawai'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pegawai'));
		}
	}

	public function _rules($type, $new, $original_value)
	{
		if ($type != null) {
			if ($new == $original_value) {
				$is_unique =  '';
			} else {
				$is_unique =  '|is_unique[pegawai.nip]|is_unique[user.username]';
			}
		} else {
			$is_unique =  '|is_unique[pegawai.nip]|is_unique[user.username]';
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}
		$this->form_validation->set_rules('nip', 'nip', 'trim|required' . $is_unique);
		$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');
		$this->form_validation->set_rules('unit_id', 'unit id', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

		$this->form_validation->set_rules('pegawai', 'pegawai', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-25 16:26:08 */
/* http://harviacode.com */
