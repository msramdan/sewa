<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pemeliharaan_model extends CI_Model
{

	public $table = 'pemeliharaan';
	public $id = 'pemeliharaan_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('kendaraan', 'kendaraan.kendaraan_id = pemeliharaan.kendaraan_id', 'left');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->join('kendaraan', 'kendaraan.kendaraan_id = pemeliharaan.kendaraan_id', 'left');
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('pemeliharaan_id', $q);
		$this->db->or_like('jenis_pemeliharaan', $q);
		$this->db->or_like('kendaraan_id', $q);
		$this->db->or_like('kategori_kilometer', $q);
		$this->db->or_like('km_terakhir', $q);
		$this->db->or_like('dinamo_starter', $q);
		$this->db->or_like('ket1', $q);
		$this->db->or_like('service_ecu', $q);
		$this->db->or_like('ket2', $q);
		$this->db->or_like('karburator', $q);
		$this->db->or_like('ket3', $q);
		$this->db->or_like('oli_mesin', $q);
		$this->db->or_like('ket4', $q);
		$this->db->or_like('oli_power_steering', $q);
		$this->db->or_like('ket5', $q);
		$this->db->or_like('deksripsi', $q);
		$this->db->or_like('photo', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}

/* End of file Pemeliharaan_model.php */
/* Location: ./application/models/Pemeliharaan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-26 22:43:01 */
/* http://harviacode.com */