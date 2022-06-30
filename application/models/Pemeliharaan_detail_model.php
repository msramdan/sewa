<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pemeliharaan_detail_model extends CI_Model
{

	public $table = 'pemeliharaan_detail';
	public $id    = 'pemeliharaan_detail_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->join('pemeliharaan', 'pemeliharaan.pemeliharaan_id = pemeliharaan_detail.pemeliharaan_id', 'left');
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id pemeliharaan
	function get_by_id($id)
	{
		// $this->db->join('pemeliharaan', 'pemeliharaan.pemeliharaan_id = pemeliharaan_detail.pemeliharaan_id', 'left');
		$this->db->where($this->id, (int)$id);
		$result = $this->db->get($this->table)->result();

		return $result;

	}


	function get_by_id_pemeliharaan($id)
	{
		// $this->db->join('pemeliharaan', 'pemeliharaan.pemeliharaan_id = pemeliharaan_detail.pemeliharaan_id', 'left');
		$this->db->where('pemeliharaan_id', (int)$id);
		$result = $this->db->get($this->table)->result();

		return $result;

	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// // update data
	// function update($id, $data)
	// {
	// 	$this->db->where('pemeliharaan_id', $id);
	// 	$this->db->update($this->table, $data);
	// }
	// update data
	function updateByPemeliharaan($id, $pemeliharaan_id, $data)
	{
		$this->db->where('pemeliharaan_id', $pemeliharaan_id);
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
