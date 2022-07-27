<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denyut_nadi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('denyut_nadi.*,
							users.nama_user,
							users.username,
							users.akses_level,
							pasien.nama_pasien,
							pasien.kode_pasien,
							pasien.jenis_kelamin
							');
		$this->db->from('denyut_nadi');
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function pasien($id_pasien)
	{
		$this->db->select('denyut_nadi.*,
							users.nama_user,
							users.username,
							users.akses_level,
							pasien.nama_pasien,
							pasien.kode_pasien,
							pasien.jenis_kelamin
							');
		$this->db->from('denyut_nadi');
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		$this->db->where('pasien.id_pasien', $id_pasien);
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_denyut_nadi)
	{
		$this->db->select('denyut_nadi.*,
							users.nama_user,
							users.username,
							users.akses_level,
							pasien.nama_pasien,
							pasien.kode_pasien,
							pasien.jenis_kelamin
							');
		$this->db->from('denyut_nadi');
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		$this->db->where('id_denyut_nadi', $id_denyut_nadi);
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('denyut_nadi');
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_denyut_nadi', $data['id_denyut_nadi']);
		$this->db->update('denyut_nadi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_denyut_nadi', $data['id_denyut_nadi']);
		$this->db->delete('denyut_nadi', $data);
	}

	public function tambah($data)
	{
		$this->db->insert('denyut_nadi', $data);
	}

}

/* End of file Denyut_nadi_model.php */
/* Location: ./application/models/Denyut_nadi_model.php */