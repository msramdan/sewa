<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{

    public $table = 'kendaraan';
    public $id = 'kendaraan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_available()
    {
        $this->db->where('status', 'available');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kendaraan_id', $q);
	$this->db->or_like('nopol', $q);
	$this->db->or_like('nama_kendaraan', $q);
	$this->db->or_like('merk', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('tahun', $q);
	$this->db->or_like('no_rangka', $q);
	$this->db->or_like('no_mesin', $q);
	$this->db->or_like('no_bpkb', $q);
	$this->db->or_like('tgl_berlaku_stnk', $q);
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

/* End of file Kendaraan_model.php */
/* Location: ./application/models/Kendaraan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-25 16:26:12 */
/* http://harviacode.com */