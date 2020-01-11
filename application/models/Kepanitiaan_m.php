<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepanitiaan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('panitia1');
		$this->db->join('kegiatan','panitia1.id_kegiatan=kegiatan.id_kegiatan');
		if($id != null){
			$this->db->where('kd_panitia', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'id_kegiatan' => $post['id_kegiatan'],
			'nama_ketua' => $post['ketua'],
			'nama_pj' => $post['penanggung_jawab'],
			'nama_bd' => $post['bendahara'],
			'nama_sk' => $post['sekertaris'],
		];
		$this->db->insert('panitia1', $params);
	}

	public function edit($post)
	{
		$params = [
			'id_kegiatan' => $post['id_kegiatan'],
			'nama_ketua' => $post['ketua'],
			'nama_pj' => $post['penanggung_jawab'],
			'nama_bd' => $post['bendahara'],
			'nama_sk' => $post['sekertaris'],
		];
		$this->db->where('kd_panitia', $post['id']);
		$this->db->update('panitia1', $params);
	}

	public function del($id)
	{
		$this->db->where('kd_panitia', $id);
		$this->db->delete('panitia1');
	}
}