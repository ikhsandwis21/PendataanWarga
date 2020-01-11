<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kas_keluar_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('kas_keluar');
		
		if($id != null){
			$this->db->where('kd_kas_keluar', $id);
		}
		$query = $this->db->get();
		return $query;
	}


	public function add($post)
	{
		$params = [
			'kd_kas_masuk' => $post['kd_kas_masuk'],
			'pengguna' => $post['pengguna'],
			'jumlah' => $post['jumlah'],
			'keperluan' => $post['keperluan'],
			'tanggal' => $post['tanggal'],

		];
		$this->db->insert('kas_keluar', $params);
		// $kd_kas_masuk = $post['kd_kas_masuk'];
		// $jumlah = $post['jumlah'];
		
		// $sql1 = "update kas_masuk set saldo=saldo-$jumlah where kd_kas_masuk = $kd_kas_masuk ";
		// $this->db->query($sql1);
	}


	public function del($id)
	{
		$this->db->where('kd_kas_keluar', $id);
		$this->db->delete('kas_keluar');
	}

	public function total_dana()
	{
		$this->db->select_sum('jumlah');
		$query = $this->db->get('kas_keluar');
		return $query;
	}
}