nama<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_keluarga_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('kartu_keluarga');
		$this->db->join('warga','kartu_keluarga.nik = warga.nik');
		if($id != null){
			$this->db->where('kk_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'no_kk' => $post['no_kk'],
			'nik' => $post['nik'],
			'nama' => $post['nama'],
			'nik' => $post['nik'],
			'nama_kepala' => $post['nama_kepala'],
			'status_hubungan' => $post['status_hubungan'],
			'kwarganegaraan' => $post['kwarganegaraan'],
			'nama_ayah' => $post['nama_ayah'],
			'nama_ibu' => $post['nama_ibu'],
		];
		$this->db->insert('kartu_keluarga', $params);
	}

	public function edit($post)
	{
		$params = [
			'no_kk' => $post['no_kk'],
			'nik' => $post['nik'],
			'nama' => $post['nama'],
			'nik' => $post['nik'],
			'nama_kepala' => $post['nama_kepala'],
			'status_hubungan' => $post['status_hubungan'],
			'kwarganegaraan' => $post['kwarganegaraan'],
			'nama_ayah' => $post['nama_ayah'],
			'nama_ibu' => $post['nama_ibu'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('kk_id', $post['id']);
		$this->db->update('kartu_keluarga', $params);
	}

	public function del($id)
	{
		$this->db->where('kk_id', $id);
		$this->db->delete('kartu_keluarga');
	}
}