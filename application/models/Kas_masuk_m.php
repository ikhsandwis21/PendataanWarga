<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_masuk_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('kas_masuk');
		
		if($id != null){
			$this->db->where('kd_kas_masuk', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	

	public function add($post)
	{
		$params = [
			'jumlah' => $post['jumlah'],
			'asal_dana' => $post['asal_dana'],
			'tanggal' => $post['tanggal'],
			'saldo' => $post['jumlah'],
		];
		$this->db->insert('kas_masuk', $params);
	}

	public function edit($post)
	{
		$params = [
			'jumlah' => $post['jumlah'],
			'asal_dana' => $post['asal_dana'],
			'tanggal' => $post['tanggal'],
			'saldo' => $post['jumlah'],
		];
		$this->db->where('kd_kas_masuk', $post['id']);
		$this->db->update('kas_masuk', $params);
	}

	public function del($id)
	{
		$this->db->where('kd_kas_masuk', $id);
		$this->db->delete('kas_masuk');
	}

	public function total_dana()
	{
		$this->db->select_sum('jumlah');
		$query = $this->db->get('kas_masuk');
		return $query;
	}
}