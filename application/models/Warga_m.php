<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class warga_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('warga');
		if($id != null){
			$this->db->where('nik', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nik' => $post['nik'],
			'nama' => $post['nama'],
			'ttl' => $post['ttl'],
			'alamat' => $post['alamat'],
			'jenis_kelamin' => $post['jenis_kelamin'],
			'agama' => $post['agama'],
			'status' => $post['status'],
			'pekerjaan' => $post['pekerjaan'],
			'status_tinggal' => $post['status_tinggal'],
		];
		$this->db->insert('warga', $params);
	}

	public function edit($post)
	{
		$params = [
			'nik' => $post['nik'],
			'nama' => $post['nama'],
			'ttl' => $post['ttl'],
			'alamat' => $post['alamat'],
			'jenis_kelamin' => $post['jenis_kelamin'],
			'agama' => $post['agama'],
			'status' => $post['status'],
			'pekerjaan' => $post['pekerjaan'],
			'status_tinggal' => $post['status_tinggal'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('nik', $post['id']);
		$this->db->update('warga', $params);
	}

	public function del($id)
	{
		$this->db->where('nik', $id);
		$this->db->delete('warga');
	}
}