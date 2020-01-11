<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kegiatan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		if($id != null){
			$this->db->where('id_kegiatan', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nama_kegiatan' => $post['nama_kegiatan'],
			'tanggal' => $post['tanggal'],
		];
		$this->db->insert('kegiatan', $params);
	}

	public function edit($post)
	{
		$params = [
			'nama_kegiatan' => $post['nama_kegiatan'],
			'tanggal' => $post['tanggal'],
		];
		$this->db->where('id_kegiatan', $post['id']);
		$this->db->update('kegiatan', $params);
	}

	public function del($id)
	{
		$this->db->where('id_kegiatan', $id);
		$this->db->delete('kegiatan');
	}
}